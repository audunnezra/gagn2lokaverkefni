<?php

require 'core/bootstrap.php';

$query = new QueryBuilder();

require Router::load('routes.php')->direct(Request::uri(), Request::method());