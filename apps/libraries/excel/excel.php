<?php

/*
 * Project Name: notary
 * File Name: excel
 * Created on: 15 Jan 14 - 11:48:05
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */

require_once APPPATH.'/third_party/PHPExcel.php';

class Excel extends PHPExcel{
    public function __construct() {
        parent::__construct();
    }
}