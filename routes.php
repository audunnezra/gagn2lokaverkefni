<?php

$router->get('/', 'controllers/home.php');
$router->get('/home', 'controllers/home.php');
$router->post('/movie', 'controllers/movie-post.php');
$router->get('/about', 'controllers/about.php');
