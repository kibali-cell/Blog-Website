<?php
require 'config/constants.php';

//destroy session and direct user to login
session_destroy();
header('location: ' . ROOT_URL);
die();