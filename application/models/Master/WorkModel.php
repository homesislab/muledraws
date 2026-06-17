<?php

class WorkModel extends CI_Model
{
	public $error_message = '';
	public $image = '';
	public $status = 1;

	public function getWork($limit = '')
	{
		$this->db->where('status', 1);
		$query = $this->db->get('master_works');
		if ($limit) $this->db->limit($limit);

		return $query->result();
	}

	public function getWorkDetail($artwork_id)
	{
		$this->db->where('artwork_id', $artwork_id);
		$this->db->where('status', 1);
		$query = $this->db->get('master_works_detail');

		return $query->result();
	}

	public function getCountAllEntries($query = [])
	{
		$search = $query['generalSearch'] ?? '';
		$status = $query['status'] ?? '';

		$this->db->select("master_works.*");

		if ($search != '') $this->db->like('master_works.description', $search);
		if ($status != '') $this->db->where('master_works.status', $status);
		
		$this->db->group_by('master_works.id');
		
		return $this->db->count_all_results('master_works');
	}

	public function getAllEntries($params)
	{
		$search = $params['query']['generalSearch'] ?? '';
		$status = $params['query']['status'] ?? '';

		$this->db->select("master_works.*");

		if ($search != '') $this->db->like('master_works.description', $search);
		if ($status != '') $this->db->where('master_works.status', $status);

		$this->db->group_by('master_works.id');
		$this->db->order_by($params['field'], $params['sort']);
		$this->db->limit($params['perpage'], $params['offset']);
		$query = $this->db->get('master_works');

		return $query->result();
	}

	public function getSpecifiedEntries($id)
	{
		$this->db->where('id', $id);
		$this->db->where('status', 1);
		$query = $this->db->get('master_works');

		return $query->row();
	}

	public function insert()
	{
		$data = [];
		$data['name'] = $_POST['name'];
		$data['description'] = $_POST['description'];

		if ($this->upload(false)) {
			if (isset($this->image)) {
				$data['image'] = $this->image;
			}
			if ($this->db->insert('master_works', $data)) {
					return true;
			} else {
					$this->error_message = 'Proses Penyimpanan Data Gagal';
					return false;
			}
		} else {
				return false;
		}
	}

	public function update()
	{
		$work_id = $_POST['id'];

		$data = [];
		$data['name'] = $_POST['name'];
		$data['description'] = $_POST['description'];

		if ($this->upload(true)) {
			if (isset($this->image)) {
				$data['image'] = $this->image;
			}
			if ($this->db->update('master_works', $data, ['id' => $work_id])) {
					return true;
			} else {
					$this->error_message = 'Proses Perubahan Data Gagal';
					return false;
			}
		} else {
				return false;
		}
	}

	public function delete($id)
	{
		$this->status = 0;

		if ($this->db->update('master_works', ['status' => 0], ['id' => $id])) {
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
				$config['upload_path'] = './assets/media/uploads/work';
				$config['allowed_types'] = 'png|jpg|jpeg|webp';
				$config['encrypt_name'] = true;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$image_upload = $this->upload->data();

					$this->load->helper('image');
					$compressed = compressToWebp(
						'./assets/media/uploads/work/' . $image_upload['file_name']
					);
					$this->image = $compressed ?: $image_upload['file_name'];

					if ($update == true) {
						$this->removeImage($_POST['id']);
					}
					
					return true;
				} else {
					$this->error_message = $this->upload->display_errors('', '');
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
		if (file_exists('./assets/media/uploads/work/' . $row->image) && $row->image != '') {
			unlink('./assets/media/uploads/work/' . $row->image);
		}
	}

	public function uploadArtwork()
	{
		$data = [];
		$data['artwork_id'] = $_POST['artwork_id'];
		$data['name'] = $_POST['name'];

		if ($this->doUploadArtwork()) {
			if (isset($this->image)) {
				$data['image'] = $this->image;
			} else {
				$this->error_message = 'Silahkan pilih gambar.';
				return false;
			}

			if ($this->db->insert('master_works_detail', $data)) {
					return true;
			} else {
					$this->error_message = 'Proses Penyimpanan Data Gagal';
					return false;
			}
		} else {
				return false;
		}
	}

	public function doUploadArtwork()
	{
		if (isset($_FILES['image'])) {
			if ($_FILES['image']['name'] != '') {
				$config['upload_path'] = './assets/media/uploads/work';
				$config['allowed_types'] = 'png|jpg|jpeg|webp';
				$config['encrypt_name'] = true;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$image_upload = $this->upload->data();

					$this->load->helper('image');
					$compressed = compressToWebp(
						'./assets/media/uploads/work/' . $image_upload['file_name']
					);
					$this->image = $compressed ?: $image_upload['file_name'];
					
					return true;
				} else {
					$this->error_message = $this->upload->display_errors('', '');
					return false;
				}
			} else {
				$this->error_message = 'Silahkan pilih gambar.';
				return false;
			}
		} else {
			$this->error_message = 'Silahkan pilih gambar.';
			return false;
		}
	}

	public function deleteArtwork($id)
	{
		$this->status = 0;

		if ($this->db->update('master_works_detail', ['status' => 0], ['id' => $id])) {
			return true;
		} else {
			$this->error_message = 'Proses Penghapusan Data Gagal';
			return false;
		}
	}
}

/* End of file WorkModel.php */
/* Location: ./system/application/models/Master/WorkModel.php */
