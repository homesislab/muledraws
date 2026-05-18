<?php

class ProfileBusiness extends CI_Controller
{
	public $pagePath;
	public $breadcrumbs;

	public function __construct()
	{
		parent::__construct();

		// Authentication
		permissionLogin($this->session);

		// Inital Variable
		$this->pagePath = 'Setting/ProfileBusiness';
		$this->routePath = 'setting/profile-business';
		$this->breadcrumbs = [
			['Pengaturan', '#'],
			['Profile Business', $this->pagePath],
		];

		// Library
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<text>', '</text>');

		// CallModel
		$this->load->model('Setting/ProfileBusinessModel', 'model');
	}

	public function index()
	{
		$row = $this->model->getProfileBusiness();

		if (isset($row->id)) {
			$data = [
				'id' => $row->id,
				'name' => $row->name,
				'email' => $row->email,
				'phone' => $row->phone,
				'address' => $row->address,
				'logo' => ($row->logo ? $row->logo : 'default.png'),
				'bio' => $row->bio,
			];

			$data['error'] = '';
			$data['title'] = 'Profile Business';
			$data['breadcrumbs'] = getBreadcrumb([
				['Ubah', ''],
			]);

			$data['listSocmed'] = $this->model->getListSocmed();

			viewRender('manage', $data);
		} else {
			redirectError('Data not found.');
		}
	}

	public function save()
	{
		$this->form_validation->set_rules('name', 'Business Name', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|min_length[1]');

		$id = $this->input->post('id');
		if (formValidationRun()) {
			$this->update();
		} else {
			$this->failedSave($id);
		}
	}

	public function failedSave($id)
	{
		$data = $this->input->post();
		$data['error'] = validation_errors();
		$data['title'] = 'Profile Business';
		$data['breadcrumbs'] = getBreadcrumb([
			['Ubah', ''],
		]);

		viewRender('manage', $data);
	}

	private function update()
	{
		if ($this->model->update()) {
			redirectSuccess('Business Profile information has been successfully changed.');
		}
	}
}

/* End of file ProfileBisnis.php */
/* Location: ./system/application/controllers/Setting/ProfileBisnis.php */
