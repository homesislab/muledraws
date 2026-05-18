<?php

class Artwork extends CI_Controller
{
	public $pagePath;
	public $breadcrumbs;

	public function __construct()
	{
		parent::__construct();

		// Inital Variable
		$this->pagePath = 'Artwork';

		// CallModel
		$this->load->model('Master/ArtworkModel', 'artworkModel');
	}

	public function view($id)
	{
		$data = [];
		$data['title'] = 'Artwork';

		$data['descriptionArtwork'] = $this->artworkModel->getArtwork($id);
		$data['galleryArtwork'] = $this->artworkModel->getArtworkDetail($id);

		$this->load->view('pages/Frontend/Artwork', $data);
	}
}

/* End of file Artwork.php */
/* Location: ./system/application/controllers/Artwork.php */
