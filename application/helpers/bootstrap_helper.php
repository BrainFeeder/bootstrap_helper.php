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

if(!function_exists('bs_container_open'))
{
	function bs_container_open($bFluid = FALSE)
	{
		$aAttr = array(
			'class' => 'container' . ($bFluid ? '-fluid' : ''),
			'aria-hidden' => 'true',
		);
		return '<div' . _attributes_to_string($aAttr) . '>';
	}
}

if(!function_exists('bs_container_close'))
{
	function bs_container_close()
	{
		return '</div>';
	}
}

if(!function_exists('bs_row_open'))
{
	function bs_row_open()
	{
		$aAttr = array(
			'class' => 'row',
		);
		return '<div' . _attributes_to_string($aAttr) . '>';
	}
}

if(!function_exists('bs_row_close'))
{
	function bs_row_close()
	{
		return '</div>';
	}
}


/* End of file bootstrap_helper.php */
/* Location: ./application/helpers/bootstrap_helper.php */
