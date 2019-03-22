<?php
/**
 * Created by PhpStorm.
 * User: dengero
 * Date: 22/03/2019
 * Time: 9:12 PM
 */

unset($_SESSION[APP_USER_CREDENTIAL_AUTH]);
session_start();
session_destroy();
header("Location: ../../index.php", true);
