<?php

class About extends CI_Controller
{
	public $pagePath;
	public $breadcrumbs;

	public function __construct()
	{
		parent::__construct();

		// Inital Variable
		$this->pagePath = 'About';

		// CallModel
		$this->load->model('Master/WorkModel', 'workModel');
		$this->load->model('Master/ClientModel', 'clientModel');
		$this->load->model('Master/AwwardModel', 'awwardModel');
		$this->load->model('Master/FeatureModel', 'featureModel');
		$this->load->model('Setting/ProfileBusinessModel', 'profileBusinessModel');
	}

	public function index()
	{
		$data = [];
		$data['title'] = 'About';

		$data['listWork'] = $this->workModel->getWork();
		$data['listClient'] = $this->clientModel->getClient();
		$data['listAwward'] = $this->awwardModel->getAwward();
		$data['listFeature'] = $this->featureModel->getFeature();
		$data['profileBusiness'] = $this->profileBusinessModel->getProfileBusiness();

		$this->load->view('pages/Frontend/About', $data);
	}
}

/* End of file About.php */
/* Location: ./system/application/controllers/About.php */
