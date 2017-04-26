<?php

class Router
{

	/**
	 * Fylki með öllum routes á síðunni
	 * @var Array
	 */
	protected $routes = [
		'GET' => [],
		'POST' => []
	];

	/**
	 * Náum í skrá með öllum routes
	 * @param  String $file - Skrá með routes
	 * @return Router
	 */
	public static function load($file)
	{
		$router = new static;

		require $file;

		return $router;
	}

	/**
	 * Býr til nýjan GET route
	 * @param  String $uri
	 * @param  String $controller
	 */
	public function get($uri, $controller)
	{
		$uri = trim($uri, '/');

		$this->routes['GET'][$uri] = $controller;
	}

	/**
	 * Býr til nýjan POST route
	 * @param  String $uri
	 * @param  String $controller
	 */
	public function post($uri, $controller)
	{
		$uri = trim($uri, '/');

		$this->routes['POST'][$uri] = $controller;
	}

	/**
	 * Beinum umferðinni á réttan controller
	 * @param  String $uri
	 * @param  String $method
	 * @return String - Nafn og staðsetning á controller skrá
	 */
	public function direct($uri, $method)
	{
		if(array_key_exists($uri, $this->routes[$method]))
		{
            return $this->routes[$method][$uri];
        }

        throw new Exception('No route defined for this URI.');
	}

}