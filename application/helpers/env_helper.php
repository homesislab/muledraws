<?php

function envHelper(): array
{
	$CI = &get_instance();

	// CallModel
	$businessProfile = $CI->ProfileBusinessModel->getProfileBusiness();

	$data = [
		'base_url' => base_url(),
		'assetsPath' => base_url() . 'assets/',
		'uploadsPath' => base_url() . 'assets/media/uploads/',
		'controllerName' => $CI->uri->segment(2),
		'methodName' => $CI->uri->segment(3),
		'appName' => $businessProfile->name ?? 'Muledraws',
		'profileAddress' => $businessProfile->address,
		'userName' => $CI->session->userdata('userName'),
		'userInitial' => substr($CI->session->userdata('userName') ?? '', 0, 1),
	];

	return $data;
}
