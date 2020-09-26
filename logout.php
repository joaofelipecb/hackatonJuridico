<?php
require_once(__DIR__.'/27-develop/Login.php');
\Hackaton\Develop\LoginValid::clear_user();
header('Location: index.php');
