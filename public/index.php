<?php

use App\Kernel;

 require_once dirname(__DIR__).'/vendor/autoload_runtime.php';
 return function (array $context) {
     return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
 };
//require "CRest.php";
//
//$result = CRest::call('profile');
//
//echo '<pre>';
//	print_r($result);
//echo '</pre>';
