<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 12/5/2018
 * Time: 12:22 PM
 */


require_once('includes/utilities.php');
require_once('includes/page_constants.php');


session_start();
session_unset();
session_destroy();

// Redirect to the login page:
header('Location:' . LOGIN_PAGE);
exit();
