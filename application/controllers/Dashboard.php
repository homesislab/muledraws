<?php

class Dashboard extends CI_Controller
{
	public $pagePath;
	public $breadcrumbs;

	public function __construct()
	{
		parent::__construct();

		// Authentication
		permissionLogin($this->session);

		// Inital Variable
		$this->pagePath = 'Dashboard';
		$this->breadcrumbs = [
			['Dashboard', '#'],
		];

		// CallModel
		$this->load->model('DashboardModel', 'model');
	}

	public function index()
	{
		$data = [];
		$data['title'] = 'Dashboard';
		$data['breadcrumbs'] = $this->breadcrumbs;

		viewRender('index', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./system/application/controllers/Dashboard.php */
