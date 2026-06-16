<?php

class CarouselModel extends CI_Model
{
	public function getCarousel()
	{
		$this->db->where('status', 1);
		$query = $this->db->get('master_carousels');

		return $query->result();
	}

	public function getCountAllEntries($query = [])
	{
		$search = $query['generalSearch'] ?? '';
		$status = $query['status'] ?? '';

		$this->db->select("master_carousels.*, '' AS name");

		if ($search != '') $this->db->like('master_carousels.description', $search);
		if ($status != '') $this->db->where('master_carousels.status', $status);
		
		$this->db->group_by('master_carousels.id');
		
		return $this->db->count_all_results('master_carousels');
	}

	public function getAllEntries($params)
	{
		$search = $params['query']['generalSearch'] ?? '';
		$status = $params['query']['status'] ?? '';

		$this->db->select("master_carousels.*, '' AS name");

		if ($search != '') $this->db->like('master_carousels.description', $search);
		if ($status != '') $this->db->where('master_carousels.status', $status);

		$this->db->group_by('master_carousels.id');
		$this->db->order_by($params['field'], $params['sort']);
		$this->db->limit($params['perpage'], $params['offset']);
		$query = $this->db->get('master_carousels');

		return $query->result();
	}

	public function getSpecifiedEntries($id)
	{
		$this->db->where('id', $id);
		$this->db->where('status', 1);
		$query = $this->db->get('master_carousels');

		return $query->row();
	}

	public function insert()
	{
		$data = [];
		$data['description'] = $_POST['description'];

		if ($this->upload(false)) {
			$data = array_merge(['image' => $this->image], $data);
			if ($this->db->insert('master_carousels', $data)) {
					return true;
			} else {
					$this->error_message = 'Proses Penyimpanan Data Gagal';
					return false;
			}
		} else {
				$this->error_message = 'Proses Upload Gagal';
				return false;
		}
	}

	public function update()
	{
		$carousel_id = $_POST['id'];

		$data = [];
		$data['description'] = $_POST['description'];

		if ($this->upload(true)) {
			$data = array_merge(['image' => $this->image], $data);
			if ($this->db->update('master_carousels', $data, ['id' => $carousel_id])) {
					return true;
			} else {
					$this->error_message = 'Proses Perubahan Data Gagal';
					return false;
			}
		} else {
				$this->error_message = 'Proses Upload Gagal';
				return false;
		}
	}

	public function delete($id)
	{
		$this->status = 0;

		if ($this->db->update('master_carousels', $this, ['id' => $id])) {
			return true;
		} else {
			$this->error_message = 'Proses Penghapusan Data Gagal';
			return false;
		}
	}

	public function upload($update)
	{
		if (isset($_FILES['image'])) {
			if ($_FILES['image']['name'] != '') {
				$config['upload_path'] = './assets/media/uploads/carousel';
				$config['allowed_types'] = 'png|jpg|jpeg|webp';
				$config['encrypt_name'] = true;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$image_upload = $this->upload->data();

					$this->load->helper('image');
					$compressed = compressToWebp(
						'./assets/media/uploads/carousel/' . $image_upload['file_name']
					);
					$this->image = $compressed ?: $image_upload['file_name'];

					if ($update == true) {
						$this->removeImage($_POST['id']);
					}
					
					return true;
				} else {
					$this->error_message = $this->upload->display_errors();
					return false;
				}
			} else {
				return true;
			}
		} else {
			return true;
		}
	}

	public function removeImage($id)
	{
		$row = $this->getSpecifiedEntries($id);
		if (file_exists('./assets/media/uploads/carousel/' . $row->image) && $row->image != '') {
			unlink('./assets/media/uploads/carousel/' . $row->image);
		}
	}
}

/* End of file CarouselModel.php */
/* Location: ./system/application/models/Master/CarouselModel.php */
