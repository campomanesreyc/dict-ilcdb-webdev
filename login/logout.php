<?php

include 'check_login.php';

session_destroy();
header('Location: http://covid19dwa.atwebpages.com/');
