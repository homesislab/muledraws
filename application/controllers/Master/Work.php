<?php

class Work extends CI_Controller
{
	public $pagePath;
	public $breadcrumbs;

	public function __construct()
	{
		parent::__construct();

		// Authentication
		permissionLogin($this->session);

		// Inital Variable
		$this->pagePath = 'Master/Work';
		$this->routePath = 'master/works';
		$this->breadcrumbs = [
			['Master Data', '#'],
			['Work', $this->pagePath],
		];

		// Library
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<text>', '</text>');

		// CallModel
		$this->load->model('Master/WorkModel', 'model');
	}

	public function index()
	{
		$data = [];
		$data['title'] = 'Work';
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
			'image' => '',
			'name' => '',
			'description' => '',
		];

		$data['error'] = '';
		$data['title'] = 'Add Work';
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
					'image' => $row->image,
					'name' => $row->name,
					'description' => $row->description,
				];

				$data['error'] = '';
				$data['title'] = 'Edit Work';
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
					'image' => $row->image,
					'name' => $row->name,
					'description' => $row->description,
				];

				$data['error'] = '';
				$data['title'] = 'View Work';
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

	public function upload($artwork_id)
	{
		if ($artwork_id != '') {
			$data = [
				'id' => '',
				'image' => '',
				'name' => '',
			];
			
			$data['error'] = '';
			$data['title'] = 'Upload Artwork';
			$data['breadcrumbs'] = getBreadcrumb([
				['Upload', ''],
			]);
			
			$data['artwork_id'] = $artwork_id;
			$data['work_detail'] = $this->model->getWorkDetail($artwork_id);

			viewRender('upload', $data);
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
			$data['title'] = 'Add Work';
			$data['breadcrumbs'] = getBreadcrumb([
				['Add', ''],
			]);
		} else {
			$data['title'] = 'Edit Work';
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

	public function uploadArtwork()
	{
		if ($this->model->uploadArtwork()) {
			redirectSuccess('Data saved successfully.');
		}
	}
	
	public function deleteArtwork($id)
	{
		if ($this->model->deleteArtwork($id)) {
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

/* End of file Work.php */
/* Location: ./system/application/controllers/Master/Work.php */
