<?php

class Client extends CI_Controller
{
	public $pagePath;
	public $breadcrumbs;

	public function __construct()
	{
		parent::__construct();

		// Authentication
		permissionLogin($this->session);

		// Inital Variable
		$this->pagePath = 'Master/Client';
		$this->routePath = 'master/clients';
		$this->breadcrumbs = [
			['Master Data', '#'],
			['Client', $this->pagePath],
		];

		// Library
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<text>', '</text>');

		// CallModel
		$this->load->model('Master/ClientModel', 'model');
	}

	public function index()
	{
		$data = [];
		$data['title'] = 'Client';
		$data['datatable'] = getURLPath('getListIndex');
		$data['breadcrumbs'] = getBreadcrumb([
			['Index', ''],
		]);

		viewRender('index', $data);
	}

	public function create()
	{
		$data = [
			'id' => '',
			'name' => '',
		];

		$data['error'] = '';
		$data['title'] = 'Add Client';
		$data['breadcrumbs'] = getBreadcrumb([
			['Add', ''],
		]);

		viewRender('manage', $data);
	}

	public function edit($id)
	{
		if ($id != '') {
			$row = $this->model->getSpecifiedEntries($id);
			if (isset($row->id)) {
				$data = [
					'id' => $row->id,
					'name' => $row->name,
				];

				$data['error'] = '';
				$data['title'] = 'Edit Client';
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

	public function view($id)
	{
		if ($id != '') {
			$row = $this->model->getSpecifiedEntries($id);
			if (isset($row->id)) {
				$data = [
					'id' => $row->id,
					'name' => $row->name,
				];

				$data['error'] = '';
				$data['title'] = 'View Client';
				$data['breadcrumbs'] = getBreadcrumb([
					['View', ''],
				]);

				viewRender('view', $data);
			} else {
				redirectError('Data not found.');
			}
		} else {
			redirectError('Data not found.');
		}
	}

	public function save()
	{
		$id = $this->input->post('id');
		
		if ($id == '') {
			$this->insert();
		} else {
			$this->update();
		}
	}

	public function failedSave($id)
	{
		$data = $this->input->post();
		$data['error'] = validation_errors();

		if ($id == '') {
			$data['title'] = 'Add Client';
			$data['breadcrumbs'] = getBreadcrumb([
				['Add', ''],
			]);
		} else {
			$data['title'] = 'Edit Client';
			$data['breadcrumbs'] = getBreadcrumb([
				['Edit', ''],
			]);
		}

		viewRender('manage', $data);
	}

	private function insert()
	{
		if ($this->model->insert()) {
			redirectSuccess('Data saved successfully.');
		}
	}

	private function update()
	{
		if ($this->model->update()) {
			redirectSuccess('Data changed successfully.');
		}
	}

	public function delete($id)
	{
		if ($this->model->delete($id)) {
			redirectSuccess('Data has been deleted.');
		}
	}

	public function getListIndex()
	{
		$meta = getMetaDataTable();
		$data = $this->model->getAllEntries($meta);

		renderDataTable($meta, $data);
	}
}

/* End of file Client.php */
/* Location: ./system/application/controllers/Master/Client.php */
