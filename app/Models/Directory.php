<?php

namespace App\Models;

use Helper;

class Directory 
{
    private $directory_id = "";
    private $base_path = "";
    private $full_path = "";

    public function __construct($directory_id = NULL, $base_path = NULL, $full_path = NULL) {
    	if(isset($directory_id) && !is_null($directory_id) && $directory_id !== '') {
    		$this->directory_id = $directory_id;
    	}
    	if(isset($base_path) && !is_null($base_path) && $base_path !== '') {
    		$this->base_path = $base_path;
    	}
    	if(isset($full_path) && !is_null($full_path) && $full_path !== '') {
    		$this->full_path = $full_path;
    	}
    }

    public function getDirectoryId() {
    	return $this->directory_id;
    }
    public function getBasePath() {
    	return $this->base_path;
    }
    public function getFullPath() {
    	return $this->full_path;
    }
}
