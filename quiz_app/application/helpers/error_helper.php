<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if( ! function_exists('response') )
{
	function response( $success, $error )
	{
		if(isset($error)){
			$Return['error'] = $error;			
		}

		if(isset($success)){
			$Return['result'] = $success;			
		}
		return $Return;

	}
}