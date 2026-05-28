<?php

class ArtworkModel extends CI_Model
{
	public function getArtwork($id)
	{
		$this->db->where('id', $id);
		$this->db->where('status', 1);
		$query = $this->db->get('master_works');

		return $query->row();
	}

	public function getArtworkDetail($id)
	{
		$this->db->where('artwork_id', $id);
		$this->db->where('status', 1);
		$query = $this->db->get('master_works_detail');

		return $query->result();
	}
}

/* End of file ArtworkModel.php */
/* Location: ./system/application/models/Master/ArtworkModel.php */
