<?php

require_once('template.class.php');

$uri = $_SERVER['REQUEST_URI'];

// Dividir el string de la uri
$uriParts = explode('/', $uri);
array_shift($uriParts);

$template = new Template('views/app.html');
$child = $template->getContent();

$title = 'Este es tu ecommerce';
include('views/header.html');
