<?php


$_SESSION['referer'] = $_SERVER['HTTP_REFERER'];  
header('Location: '.$_SESSION['referer']);




?>