<?php

require_once __DIR__ . '/env_helper.php';
require_once __DIR__ . '/date_helper.php';
require_once __DIR__ . '/notify_helper.php';
require_once __DIR__ . '/utils_helper.php';
require_once __DIR__ . '/datatable_helper.php';

function Component($path, $params = []): void
{
	$CI = &get_instance();
	$CI->load->view('components/' . $path . '/index', $params);
}

function Partial($path, $params = []): void
{
	$CI = &get_instance();
	$CI->load->view('partials/' . $path . '/index', $params);
}

function Widget($path, $params = []): void
{
	$CI = &get_instance();
	$CI->load->view('widgets/' . $path . '/index', $params);
}

function getPath($prefix = ''): string
{
	$CI = &get_instance();
	return "pages/{$CI->pagePath}/{$prefix}";
}

function getTabPath($prefix = ''): string
{
	$CI = &get_instance();
	return "pages/{$CI->pagePath}/Tabs/{$prefix}";
;
}

function getURLPath($prefix = ''): string
{
	$CI = &get_instance();
	return base_url() . "{$CI->pagePath}/{$prefix}";
}

function getRoutePath($prefix = ''): string
{
	$CI = &get_instance();
	if (isset($CI->routePath) && trim($CI->routePath) !== '') {
		$path = base_url() . rtrim($CI->routePath, '/') . '/';
		if ($prefix !== '') {
			$path .= $prefix;
		}
		return $path;
	}

	return getURLPath($prefix);
}

function getLoader($prefix): array
{
	return [
		'path' => getRoutePath(),
		'stylesheet' => getPath("Loader/css/$prefix"),
		'javascript' => getPath("Loader/javascript/$prefix"),
	];
}

function getBreadcrumb($path): array
{
	$CI = &get_instance();
	return array_merge($CI->breadcrumbs, $path);
}

function viewRender($view, $data): void
{
	$CI = &get_instance();
	$data['template'] = getPath($view);
	$data['loader'] = getLoader($view);
	$template = array_merge($data, envHelper());
	$CI->parser->parse('pages/template', $template);
}

function redirectError($message): void
{
	$CI = &get_instance();
	$CI->session->set_flashdata('error', true);
	$CI->session->set_flashdata('message_flash', $message);
	$redirectPath = isset($CI->routePath) && trim($CI->routePath) !== '' ? $CI->routePath : $CI->pagePath;
	redirect($redirectPath, 'location');
}

function redirectSuccess($message): void
{
	$CI = &get_instance();
	$CI->session->set_flashdata('confirm', true);
	$CI->session->set_flashdata('message_flash', $message);
	$redirectPath = isset($CI->routePath) && trim($CI->routePath) !== '' ? $CI->routePath : $CI->pagePath;
	redirect($redirectPath, 'location');
}
function formValidationRun(): bool
{
	$CI = &get_instance();
	if ($CI->form_validation->run() == true) {
		return true;
	} else {
		return false;
	}
}

function isMenuActive($menu): string
{
	$CI = &get_instance();
	$menu = explode('/', $menu);

	if (isset($menu[1])) {
		return ($menu[0] == $CI->uri->segment(1) && $menu[1] == $CI->uri->segment(2) ? ' kt-menu__item--active' : '');
	} else {
		return ($menu[0] == $CI->uri->segment(1) ? ' kt-menu__item--active' : '');
	}
}

function isSubMenuActive($menu): string
{
	$CI = &get_instance();
	return (in_array($CI->uri->segment(2), $menu) ? ' kt-menu__item--open kt-menu__item--here' : '');
}

function isExistLoader($path, $loader): bool
{
	return file_exists($path . str_replace("pages", "", $loader) . '.php');
}

function permissionLogin($session): void
{
	if (!$session->userdata('loggedIn')) {
		$session->set_flashdata('error', true);
		$session->set_flashdata('message_flash', 'Access Denied');
		redirect('login');
	}
}

function permissionLoggedIn($session): void
{
	if ($session->userdata('loggedIn')) {
		$session->set_flashdata('error', true);
		$session->set_flashdata('message_flash', 'Access Denied');
		redirect('master/works');
	}
}

function userAccesForm($userAccessForm, $method)
{
    $response = false;
    foreach ($method as $row) {
        if (in_array($row, $userAccessForm, false)) {
            $response = true;
        }
    }

    return $response;
}