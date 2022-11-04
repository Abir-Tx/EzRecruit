<?php
session_start();
session_unset();
session_destroy();
header('Location: /EzRecruit/view/pages/login.php');
