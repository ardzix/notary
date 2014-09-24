<?php

/*
 * Project Name: notary
 * File Name: word
 * Created on: 13 Jan 14 - 13:37:24
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once APPPATH."/third_party/PHPWord.php"; 
 
class Word extends PHPWord { 
    public function __construct() { 
        parent::__construct(); 
    } 
}