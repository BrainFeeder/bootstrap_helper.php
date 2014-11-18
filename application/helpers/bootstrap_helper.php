<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// "$this" works under light testing, but experience shows that it won't
// necessarily work in every context, so let's use a $CI variable
$CI =& get_instance();

 // we use the CI form helper's _attributes_to_string()
$CI->load->helper('form');

if(!function_exists('bs_icon'))
{
	function bs_icon($sIcon = FALSE)
	{
		$aAttr = array(
			'class' => 'glyphicon glyphicon-' . $sIcon,
			'aria-hidden' => 'true',
		);
		return '<span' . _attributes_to_string($aAttr) . '></span>';
	}
}