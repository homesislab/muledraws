<?php

function getMetaDataTable($countModel = ''): array
{
	$CI = &get_instance();
	$params = $CI->input->get();
	$query = $params['query'] ?? [];

	if ($countModel != '') {
		$totalItem = $countModel;
	} else {
		$totalItem = $CI->model->getCountAllEntries($query);
	}

	['page' => $page, 'perpage' => $perpage] = $params['pagination'] ?? ['page' => '1', 'perpage' => '10'];
	['sort' => $sort, 'field' => $field] = $params['sort'] ?? ['sort' => 'ASC', 'field' => 'name'];

	return [
		'page' => $page,
		'pages' => getPages($totalItem, $perpage),
		'perpage' => $perpage,
		'total' => $totalItem,
		'sort' => $sort,
		'field' => $field,
		'offset' => getOffset($page, $perpage),
		'query' => $query,
	];
}

function getOffset($page, $perpage) : int
{
	return ($page > 1 ? ($page * $perpage) - $perpage : 0);
}

function getPages($total, $perpage): int
{
	return ceil($total / $perpage);
}

function renderDataTable($meta, $data): void
{
	$CI = &get_instance();

	$response = [
		'meta' => $meta,
		'data' => $data
	];

	$CI->output
		->set_status_header(200)
		->set_content_type('application/json')
		->set_output(json_encode($response));
}
