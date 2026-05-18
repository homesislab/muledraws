<?php

class ProfilPengguna extends CI_Controller
{
	public $pagePath;
	public $breadcrumbs;

	public function __construct()
	{
		parent::__construct();

		// Authentication
		permissionLogin($this->session);

		// Inital Variable
		$this->pagePath = 'Setting/ProfilPengguna';
		$this->routePath = 'profile';
		$this->breadcrumbs = [
			['Master Data', '#'],
			['Profil Pengguna', $this->pagePath],
		];

		// Library
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<text>', '</text>');

		// CallModel
		$this->load->model('Setting/UserAccessModel', 'model');
	}

	public function index()
	{
		$userId = $this->session->userdata('userId');
		if ($userId != '') {
			$row = $this->model->getSpecifiedEntries($userId);
			if (isset($row->id)) {
				$data = [
					'id' => $row->id,
					'name' => $row->name,
					'username' => $row->username,
					'password' => '',
				];

				$data['error'] = '';
				$data['title'] = 'Ubah Data';
				$data['breadcrumbs'] = getBreadcrumb([
					['Ubah', ''],
				]);


				viewRender('manage', $data);
			} else {
				redirectError('Data not found.');
			}
		} else {
			redirectError('Data not found.');
		}
	}

	public function update()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]');

		if (formValidationRun()) {
			if ($this->model->update()) {
				$this->session->set_flashdata('confirm', true);
				$this->session->set_flashdata('message_flash', 'Data changed successfully.');
				redirect($this->routePath, 'location');
			}
		} else {
			$this->session->set_flashdata('error', true);
			$this->session->set_flashdata('message_flash', 'Data gagal diubah.');
			redirect($this->routePath, 'location');
		}
	}
}

/* End of file ProfilPengguna.php */
/* Location: ./system/application/controllers/Report/ProfilPengguna.php */;
