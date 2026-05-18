<?php

function lastLoginDate($date): string
{
	if ($date != '' && $date != '0000-00-00 00:00:00') {
		$date = date('j F Y h:i:s', strtotime($date));
	} else {
		$date = 'First Login';
	}
	return $date;
}

function yearMonthDayFormat($date): string
{
	$result = str_replace('/', '-', $date);
	return date('Y-m-d', strtotime($result));
}

function dayMonthYearFormat($date): string
{
	if ($date) {
		$date = date('d/m/Y', strtotime($date));
	} else {
		$date = '-';
	}
	return $date;
}

function dayMonthYearWithTimeFormat($date): string
{
	if ($date) {
		$date = date('d/m/Y H:i:s', strtotime($date));
	} else {
		$date = '-';
	}

	return $date;
}

function dateRange($startdate, $enddate): string
{
	return dayMonthYearFormat($startdate) . ' - ' . dayMonthYearFormat($enddate);
}

function monthName($date): string
{
	switch ($date) {
	case 1: $date = 'Januari';
		break;
	case 2: $date = 'Februari';
		break;
	case 3: $date = 'Maret';
		break;
	case 4: $date = 'April';
		break;
	case 5: $date = 'Mei';
		break;
	case 6: $date = 'Juni';
		break;
	case 7: $date = 'Juli';
		break;
	case 8: $date = 'Agustus';
		break;
	case 9: $date = 'September';
		break;
	case 10: $date = 'Oktober';
		break;
	case 11: $date = 'November';
		break;
	case 12: $date = 'Desember';
		break;
	}

	return $date;
}

function expiredDate($date): string
{
	if ($date) {
		return $date;
	} else {
		return date('Y-m-d', strtotime('+1 years'));
	}
}
