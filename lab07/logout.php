<?php

require_once './include/common.inc.php';
session_destroy();
header("location: login.php");
