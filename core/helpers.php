<?php

function dd($data)
{
	echo '<pre>';
	die(var_dump($data));
	echo '</pre>';
}

function redirect($path)
{
	header("Location: /{$path}");
}