<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoggingHook
{
	public function logActivity(): void
	{
		/** @var object $CI */
		$CI = get_instance();

		// Fetch class and method
		$class = $CI->router->fetch_class();
		$method = $CI->router->fetch_method();

		// Fetch IP and request details
		$ip = $CI->input->ip_address();
		$uri = $_SERVER['REQUEST_URI'] ?? '';
		$http_method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

		// Fetch User Info if logged in
		$userId = 'Guest';
		$userName = 'Guest';
		if (isset($CI->session) && $CI->session->userdata('loggedIn')) {
			$userId = $CI->session->userdata('userId');
			$userName = $CI->session->userdata('userName');
		}

		// Parse POST parameters if it's a POST request (redacting sensitive keys)
		$postData = '';
		if ($http_method === 'POST' && !empty($_POST)) {
			$post = $_POST;
			$redactedKeys = ['password', 'pwd', 'pass', 'secret', 'token', 'key'];
			foreach ($post as $key => $value) {
				foreach ($redactedKeys as $redact) {
					if (stripos($key, $redact) !== false) {
						$post[$key] = '********';
					}
				}
			}
			$postData = ' | POST: ' . json_encode($post);
		}

		// Construct log message
		$logMessage = sprintf(
			"[%s] [%s] [User: %s (ID: %s)] [%s] %s (%s::%s)%s\n",
			date('Y-m-d H:i:s'),
			$ip,
			$userName,
			$userId,
			$http_method,
			$uri,
			$class,
			$method,
			$postData
		);

		// Determine file path: application/logs/controller_activity.log
		$logPath = APPPATH . 'logs/controller_activity.log';

		// Write to log file
		@file_put_contents($logPath, $logMessage, FILE_APPEND);
	}
}
