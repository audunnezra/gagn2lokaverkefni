<?php

$title = 'Home';

$movies = $query->all('movies');

require 'views/homepage.view.php';