<?php

class ClientModel extends CI_Model
{
	public function getClient()
	{
		$this->db->where('status', 1);
		$query = $this->db->get('master_clients');

		return $query->result();
	}

	public function getCountAllEntries($query = [])
	{
		$search = $query['generalSearch'] ?? '';
		$status = $query['status'] ?? '';

		$this->db->select("master_clients.*");

		if ($search != '') $this->db->like('master_clients.name', $search);
		if ($status != '') $this->db->where('master_clients.status', $status);
		
		$this->db->group_by('master_clients.id');
		
		return $this->db->count_all_results('master_clients');
	}

	public function getAllEntries($params)
	{
		$search = $params['query']['generalSearch'] ?? '';
		$status = $params['query']['status'] ?? '';

		$this->db->select("master_clients.*");

		if ($search != '') $this->db->like('master_clients.name', $search);
		if ($status != '') $this->db->where('master_clients.status', $status);

		$this->db->group_by('master_clients.id');
		$this->db->order_by($params['field'], $params['sort']);
		$this->db->limit($params['perpage'], $params['offset']);
		$query = $this->db->get('master_clients');

		return $query->result();
	}

	public function getSpecifiedEntries($id)
	{
		$this->db->where('id', $id);
		$this->db->where('status', 1);
		$query = $this->db->get('master_clients');

		return $query->row();
	}

	public function insert()
	{
		$data = [];
		$data['name'] = $_POST['name'];

		if ($this->db->insert('master_clients', $data)) {
				return true;
		} else {
				$this->error_message = 'Proses Penyimpanan Data Gagal';
				return false;
		}
	}

	public function update()
	{
		$carousel_id = $_POST['id'];

		$data = [];
		$data['name'] = $_POST['name'];

		if ($this->db->update('master_clients', $data, ['id' => $carousel_id])) {
				return true;
		} else {
				$this->error_message = 'Proses Perubahan Data Gagal';
				return false;
		}
	}

	public function delete($id)
	{
		$this->status = 0;

		if ($this->db->update('master_clients', $this, ['id' => $id])) {
			return true;
		} else {
			$this->error_message = 'Proses Penghapusan Data Gagal';
			return false;
		}
	}
}

/* End of file ClientModel.php */
/* Location: ./system/application/models/Master/ClientModel.php */
