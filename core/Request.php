<?php

class Request
{
	/**
	 * Skilum til baka því URI sem notandi heimsótti
	 * @return String
	 */
	public static function uri()
	{
		return trim($_SERVER['REQUEST_URI'], "/");
	}

	/**
	 * Skilum til baka hvort notandi sendi GET eða POST request
	 * @return String
	 */
	public static function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}
}