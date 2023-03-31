<?php
require_once (__DIR__.'/CRest.php');
echo 'Current script owner: ' . get_current_user();
CRest::checkServer();