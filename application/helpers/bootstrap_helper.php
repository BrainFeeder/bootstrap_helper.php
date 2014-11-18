<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('bs_icon'))
{
	function bs_icon($sIcon = FALSE)
	{
		return '<span class="glyphicon glyphicon-' . $sIcon . '" aria-hidden="true"></span>';
	}
}