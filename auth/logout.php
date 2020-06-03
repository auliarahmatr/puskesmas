<?php
require_once "../_config/config.php";

session_start();
session_destroy();
header("Location:" . base_url('auth/login.php') . "");
