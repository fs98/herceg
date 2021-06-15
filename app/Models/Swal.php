<?php

namespace App\Models;

use Helper;

class Swal 
{
    private $message = "Failure";
    private $status_code = 400;
    private $redirect_url = "";
    private $swal_icon = "error";
    private $swal_title = "Error!";
    private $swal_message = "Failed to execute action due to an unknown error. For assistance, please contact support.";

    public function __construct($message = NULL, $status_code = NULL, $redirect_url = NULL, $swal_icon = NULL, $swal_title = NULL, $swal_message = NULL) {
    	if(Helper::isSet($message)) {
    		$this->message = $message;
    	}
    	if(Helper::isSet($status_code)) {
    		$this->status_code = $status_code;
    	}
    	if(Helper::isSet($redirect_url)) {
    		$this->redirect_url = $redirect_url;
    	}
    	if(Helper::isSet($swal_icon)) {
    		$this->swal_icon = $swal_icon;
    	}
    	if(Helper::isSet($swal_title)) {
    		$this->swal_title = $swal_title;
    	}
    	if(Helper::isSet($swal_message)) {
    		$this->swal_message = $swal_message;
    	}
    }

    public function getMessage() {
    	return $this->message;
    }
    public function getStatusCode() {
    	return $this->status_code;
    }
    public function getRedirectUrl() {
    	return $this->redirect_url;
    }
    public function getSwalIcon() {
    	return $this->swal_icon;
    }
    public function getSwalTitle() {
    	return $this->swal_title;
    }
    public function getSwalMessage() {
    	return $this->swal_message;
    }
    public function setMessage($string = NULL) {
    	$this->message = $string;
    }
    public function setStatusCode($string = NULL) {
    	$this->status_code = $string;
    }
    public function setRedirectUrl($string = NULL) {
    	$this->redirect_url = $string;
    }
    public function setSwalIcon($string = NULL) {
    	$this->swal_icon = $string;
    }
    public function setSwalTitle($string = NULL) {
    	$this->swal_title = $string;
    }
    public function setSwalMessage($string = NULL) {
    	$this->swal_message = $string;
    }

    public function get() {
    	return [
    		'message' => $this->message,
            'status_code' => $this->status_code,
            'redirect_url' => $this->redirect_url,
            'swal_icon' => $this->swal_icon,
            'swal_title' => $this->swal_title,
            'swal_message' => $this->swal_message
    	];
    }
}
