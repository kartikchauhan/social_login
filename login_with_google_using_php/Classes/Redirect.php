<?php

class Redirect
{
	public static function to($location = null)
	{
		if($location)
		{
			if(is_numeric($location))
			{
				header('HTTP/1.0 404 Not Found');
				include('Includes/Errors/404.php');
				exit();
			}
			else
			{
				header('Location: '.filter_var($location, FILTER_SANITIZE_URL));
				exit();
			}
		}
	}
}

?>