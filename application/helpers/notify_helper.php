<?php

function notify($session): string
{
	if ($session->flashdata('error')) {
		return notifyError($session->flashdata('message_flash'));
	} elseif ($session->flashdata('confirm')) {
		return notifySuccess($session->flashdata('message_flash'));
	} else {
		return '';
	}
}

function notifyError($message): string
{
	return '<div class="alert alert-danger fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-questions-circular-button"></i></div>
        <div class="alert-text">' . $message . '</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>';
}

function notifySuccess($message): string
{
	return '<div class="alert alert-success fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">' . $message . '</div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>';
}
