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

		// CallModels
		$this->load->model('Master/WorkModel', 'workModel');
		$this->load->model('Master/CarouselModel', 'carouselModel');
		$this->load->model('Master/ClientModel', 'clientModel');
		$this->load->model('Master/AwwardModel', 'awwardModel');
	}

	public function index()
	{
		$data = [];
		$data['title'] = 'Dashboard';
		$data['breadcrumbs'] = $this->breadcrumbs;

		// Fetch stats
		$data['totalWorks'] = count($this->workModel->getWork());
		$data['totalCarousels'] = count($this->carouselModel->getCarousel());
		$data['totalClients'] = count($this->clientModel->getClient());
		$data['totalAwards'] = count($this->awwardModel->getAwward());

		// Fetch latest works (last 4)
		$this->db->order_by('id', 'DESC');
		$this->db->limit(4);
		$data['latestWorks'] = $this->workModel->getWork();

		viewRender('index', $data);
	}
}

/* End of file Dashboard.php */
/* Location: ./system/application/controllers/Dashboard.php */
