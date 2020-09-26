<?php
require_once(__DIR__.'/include.php');
\Hackaton\Develop\LoginValid::clear_user();
header('Location: index.php');
