<?php
session_start();
session_destroy();
header("Location: /EzRecruit/view/index.php");
