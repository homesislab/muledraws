<?php

class UserAccess extends CI_Controller
{
	public $pagePath;
	public $breadcrumbs;

	public function __construct()
	{
		parent::__construct();

		// Inital Variable
		$this->pagePath = 'Setting/UserAccess';
		$this->routePath = 'setting/user-access';
		$this->breadcrumbs = [
			['Master Data', '#'],
			['User Access', $this->pagePath],
		];

		// Library
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<text>', '</text>');

		// CallModel
		$this->load->model('Setting/UserAccessModel', 'model');
	}

	public function index()
	{
		permissionLogin($this->session);

		$data = [];
		$data['title'] = 'User Access';
		$data['datatable'] = getURLPath('getListIndex');
		$data['breadcrumbs'] = getBreadcrumb([
			['Index', ''],
		]);

		viewRender('index', $data);
	}

	public function create()
	{
		permissionLogin($this->session);

		$data = [
			'id' => '',
			'name' => '',
			'username' => '',
			'password' => '',
		];

		$data['error'] = '';
		$data['title'] = 'Add Data';
		$data['breadcrumbs'] = getBreadcrumb([
			['Add', ''],
		]);

		viewRender('manage', $data);
	}

	public function edit($id)
	{
		permissionLogin($this->session);

		if ($id != '') {
			$row = $this->model->getSpecifiedEntries($id);
			if (isset($row->id)) {
				$data = [
					'id' => $row->id,
					'name' => $row->name,
					'username' => $row->username,
					'password' => '',
				];

				$data['error'] = '';
				$data['title'] = 'Edit Data';
				$data['breadcrumbs'] = getBreadcrumb([
					['Edit', ''],
				]);

				viewRender('manage', $data);
			} else {
				redirectError('Data not found.');
			}
		} else {
			redirectError('Data not found.');
		}
	}

	public function save()
	{
		permissionLogin($this->session);

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('confirm_password', 'Confirmation Password', 'trim|required|matches[password]');

		$id = $this->input->post('id');
		if (formValidationRun()) {
			if ($id == '') {
				$this->insert();
			} else {
				$this->update();
			}
		} else {
			$this->failedSave($id);
		}
	}

	public function failedSave($id)
	{
		permissionLogin($this->session);

		$data = $this->input->post();
		$data['error'] = validation_errors();

		if ($id == '') {
			$data['title'] = 'Add Data';
			$data['breadcrumbs'] = getBreadcrumb([
				['Add', ''],
			]);
		} else {
			$data['title'] = 'Edit Data';
			$data['breadcrumbs'] = getBreadcrumb([
				['Edit', ''],
			]);
		}

		viewRender('manage', $data);
	}

	private function insert()
	{
		permissionLogin($this->session);

		if ($this->model->insert()) {
			redirectSuccess('Data saved successfully.');
		}
	}

	private function update()
	{
		permissionLogin($this->session);

		if ($this->model->update()) {
			redirectSuccess('Data changed successfully.');
		}
	}

	public function delete($id)
	{
		permissionLogin($this->session);

		if ($this->model->delete($id)) {
			redirectSuccess('Data has been deleted.');
		}
	}

	public function login()
	{
		permissionLoggedIn($this->session);

		$data = [
			'username' => '',
			'remember' => false,
			'error' => ''
		];

		$data = array_merge($data, envHelper());
		$this->load->view("pages/{$this->pagePath}/login", $data);
	}

	public function doLogin()
	{
		permissionLoggedIn($this->session);

		if ($this->model->login()) {
			redirect('master/works', 'location');
		} else {
			$data = [
				'username' => $this->input->post('username'),
				'error' => 'Incorrect Username or Password!'
			];

			$data = array_merge($data, envHelper());
			$this->load->view("pages/{$this->pagePath}/login", $data);
		}
	}

	public function logout()
	{
		if ($this->model->logout()) {
			redirect('login', 'location');
		}
	}

	public function getListIndex()
	{
		$meta = getMetaDataTable();
		$data = $this->model->getAllEntries($meta);

		renderDataTable($meta, $data);
	}
}

/* End of file UserAccess.php */
/* Location: ./system/application/controllers/Setting/UserAccess.php */;
