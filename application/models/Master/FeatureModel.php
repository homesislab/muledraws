<?php

class FeatureModel extends CI_Model
{
	public function getFeature()
	{
		$this->db->where('status', 1);
		$query = $this->db->get('master_features');

		return $query->result();
	}

	public function getCountAllEntries($query = [])
	{
		$search = $query['generalSearch'] ?? '';
		$status = $query['status'] ?? '';

		$this->db->select("master_features.*");

		if ($search != '') $this->db->like('master_features.name', $search);
		if ($status != '') $this->db->where('master_features.status', $status);
		
		$this->db->group_by('master_features.id');
		
		return $this->db->count_all_results('master_features');
	}

	public function getAllEntries($params)
	{
		$search = $params['query']['generalSearch'] ?? '';
		$status = $params['query']['status'] ?? '';

		$this->db->select("master_features.*");

		if ($search != '') $this->db->like('master_features.name', $search);
		if ($status != '') $this->db->where('master_features.status', $status);

		$this->db->group_by('master_features.id');
		$this->db->order_by($params['field'], $params['sort']);
		$this->db->limit($params['perpage'], $params['offset']);
		$query = $this->db->get('master_features');

		return $query->result();
	}

	public function getSpecifiedEntries($id)
	{
		$this->db->where('id', $id);
		$this->db->where('status', 1);
		$query = $this->db->get('master_features');

		return $query->row();
	}

	public function insert()
	{
		$data = [];
		$data['name'] = $_POST['name'];

		if ($this->db->insert('master_features', $data)) {
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

		if ($this->db->update('master_features', $data, ['id' => $carousel_id])) {
				return true;
		} else {
				$this->error_message = 'Proses Perubahan Data Gagal';
				return false;
		}
	}

	public function delete($id)
	{
		$this->status = 0;

		if ($this->db->update('master_features', $this, ['id' => $id])) {
			return true;
		} else {
			$this->error_message = 'Proses Penghapusan Data Gagal';
			return false;
		}
	}
}

/* End of file FeatureModel.php */
/* Location: ./system/application/models/Master/FeatureModel.php */
