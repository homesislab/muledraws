<?php

class Contact extends CI_Controller
{
	public $pagePath;
	public $breadcrumbs;

	public function __construct()
	{
		parent::__construct();

		// Inital Variable
		$this->pagePath = 'Contact';

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
		$data['title'] = 'Contact';

		$data['listWork'] = $this->workModel->getWork(8);
		$data['listClient'] = $this->clientModel->getClient();
		$data['listAwward'] = $this->awwardModel->getAwward();
		$data['listFeature'] = $this->featureModel->getFeature();
		$data['profileBusiness'] = $this->profileBusinessModel->getProfileBusiness();

		$this->load->view('pages/Frontend/Contact', $data);
	}
}

/* End of file Contact.php */
/* Location: ./system/application/controllers/Contact.php */
