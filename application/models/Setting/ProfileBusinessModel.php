<?php

class ProfileBusinessModel extends CI_Model
{
	public function getProfileBusiness()
	{
		$query = $this->db->get('setting_profile_business');

		return $query->row();
	}

	public function getListSocmed()
	{
		$query = $this->db->get('setting_profile_business_socmed');

		return $query->result();
	}

	public function update()
	{
		$this->name = $_POST['name'];
		$this->email = $_POST['email'];
		$this->phone = $_POST['phone'];
		$this->whatsapp = $_POST['whatsapp'];
		$this->address = $_POST['address'];
		$this->bio = $_POST['bio'];

		if ($this->upload()) {
			if ($this->db->update('setting_profile_business', $this, ['id' => $_POST['id']])) {
				// Delete
				$this->deleteSocialMedia($_POST['id']);
				$this->insertSocialMedia($_POST['id']);
				return true;
			}
		} else {
			$this->error_message = 'Penyimpanan Gagal';

			return false;
		}
	}

	public function insertSocialMedia($profile_id)
	{
		$socialMedia = json_decode($_POST['social_media']);
		foreach ($socialMedia as $row) {
			$data = [];
			$data['profile_id'] = $profile_id;
			$data['name'] = $row[0];
			$data['url'] = $row[1];

			$this->db->insert('setting_profile_business_socmed', $data);
		}
	}

	public function insertAccountNumber($profile_id)
	{
		$accountNumber = json_decode($_POST['account_number']);
		foreach ($accountNumber as $row) {
			$data = [];
			$data['profile_id'] = $profile_id;
			$data['bank_name'] = $row[0];
			$data['account_number'] = $row[1];
			$data['owner_name'] = $row[2];

			$this->db->insert('setting_profile_business_account', $data);
		}
	}

	public function deleteSocialMedia($profile_id)
	{
		// Use empty_table() to clear all rows — bypasses CI's WHERE clause requirement
		$this->db->empty_table('setting_profile_business_socmed');
	}
	
	public function upload()
	{
		if (isset($_FILES['logo'])) {
			if ($_FILES['logo']['name'] != '') {
				$config['upload_path'] = './assets/media/uploads/logos';
				$config['allowed_types'] = 'png|jpg|jpeg';
				$config['encrypt_name'] = true;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('logo')) {
					$image_upload = $this->upload->data();
					$this->logo = $image_upload['file_name'];
					$this->removeImage($_POST['id']);
					return true;
				} else {
					$this->error_message = $this->upload->display_errors();
					return false;
				}
			} else {
				return true;
			}
		} else {
			return true;
		}
	}

	public function removeImage($id)
	{
		$row = $this->getProfileBusiness();
		if (file_exists('./assets/media/uploads/logos/' . $row->logo) && $row->logo != '') {
			unlink('./assets/media/uploads/logos/' . $row->logo);
		}
	}
}

/* End of file ProfileBisnisModel.php */
/* Location: ./system/application/controllers/Setting/ProfileBisnisModel.php */
