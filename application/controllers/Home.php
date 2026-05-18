<?php

class Home extends CI_Controller
{
	public $pagePath;
	public $breadcrumbs;

	public function __construct()
	{
		parent::__construct();

		// Inital Variable
		$this->pagePath = 'Home';

		// CallModel
		$this->load->model('Master/CarouselModel', 'carouselModel');
		$this->load->model('Master/WorkModel', 'workModel');
		$this->load->model('Setting/ProfileBusinessModel', 'profileBusinessModel');
	}

	public function index()
	{
		$data = [];
		$data['title'] = 'Home';

		$data['listCarousel'] = $this->carouselModel->getCarousel();
		$data['listWork'] = $this->workModel->getWork();
		$data['listSocmed'] = $this->profileBusinessModel->getListSocmed();

		$this->load->view('pages/Frontend/Home', $data);
	}
}

/* End of file Home.php */
/* Location: ./system/application/controllers/Home.php */
