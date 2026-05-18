<?php

class UserAccessModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getUser()
	{
		$this->db->where('status', 1);
		$query = $this->db->get('setting_users');

		return $query->result();
	}

	public function getCountAllEntries($query = [])
	{
		$search = $query['generalSearch'] ?? '';
		$status = $query['status'] ?? '';

		$this->db->select('setting_users.*');

		if ($search != '') $this->db->like('setting_users.name', $search);
		if ($status != '') $this->db->where('setting_users.status', $status);

		return $this->db->count_all_results('setting_users');
	}

	public function getAllEntries($params)
	{
		$search = $params['query']['generalSearch'] ?? '';
		$status = $params['query']['status'] ?? '';

		$this->db->select('setting_users.*');

		if ($search != '') $this->db->like('setting_users.name', $search);
		if ($status != '') $this->db->where('setting_users.status', $status);

		$this->db->order_by($params['field'], $params['sort']);
		$this->db->limit($params['perpage'], $params['offset']);
		$query = $this->db->get('setting_users');

		return $query->result();
	}

	public function getSpecifiedEntries($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('setting_users');

		return $query->row();
	}

	public function insert()
	{
		$this->name = $_POST['name'];
		$this->username = $_POST['username'];

		($_POST['password'] != '') ? $this->password = md5($_POST['password']) : $this->password = md5('123456');

		if ($this->db->insert('setting_users', $this)) {
			return true;
		} else {
			$this->error_message = 'Proses Penyimpanan Data Gagal';

			return false;
		}
	}

	public function update()
	{
		$this->name = $_POST['name'];
		$this->username = $_POST['username'];

		if ($_POST['password'] != '') {
			$this->password = md5($_POST['password']);
		}

		if ($this->db->update('setting_users', $this, ['id' => $_POST['id']])) {
			return true;
		} else {
			$this->error_message = 'Proses Perubahan Data Gagal';

			return false;
		}
	}

	public function remove($id)
	{
		$this->status = 0;

		if ($this->db->update('setting_users', $this, ['id' => $id])) {
			return true;
		} else {
			$this->error_message = 'Proses Penghapusan Data Gagal';

			return false;
		}
	}

	public function login()
	{
		$this->db->select('setting_users.*');
		$this->db->where('setting_users.username', $_POST['username']);
		$this->db->where('setting_users.password', md5($_POST['password']));
		$query = $this->db->get('setting_users');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$dataLoggedIn = [
				'userId' => $row->id,
				'userName' => $row->name,
				'userLastLogin' => $row->last_logged_in,
				'userTransactionId' => hash('ripemd160', $row->id . '' . date("Y-m-d")),
				'loggedIn' => true,
			];

			$this->session->set_userdata($dataLoggedIn);
			$this->setLastLogin($row->id);
			return true;
		} else {
			return false;
		}
	}

	public function logout()
	{
		$dataLoggedIn = [
			'userId' => $this->session->userdata('userId'),
			'userName' => $this->session->userdata('userName'),
			'userLastLogin' => $this->session->userdata('userLastLogin'),
			'loggedIn' => $this->session->userdata('loggedIn'),
		];

		$this->session->unset_userdata($dataLoggedIn);
		$this->session->sess_destroy();
		return true;
	}

	public function setLastLogin($id)
	{
		$this->db->set('last_logged_in', date('Y-m-d H:i:s'));
		$this->db->where('id', $id);
		$this->db->update('setting_users');
	}
}
