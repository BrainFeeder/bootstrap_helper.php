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

if(!function_exists('bs_col_open'))
{
	function bs_col_open($mColClasses = '')
	{
		// split into pieces (space-separated), prepend "col-" to each, and
		// reattach them to this column's "class"
		if(is_string($mColClasses))
		{			
			$mColClasses = array_filter(explode(' ', $mColClasses));
		}
		if(count($mColClasses))
		{
			foreach($mColClasses as $k => $v)
			{
				// Add 'col-' to this class if it isn't there already
				if(substr($v, 0, 4) !== 'col-') {
					$v = 'col-' . $v;
				}

				$mColClasses[$k] = $v;
			}
		}

		$aAttr = array(
			'class' => implode(' ', $mColClasses),
		);
		return '<div' . _attributes_to_string($aAttr) . '>';
	}
}

if(!function_exists('bs_col_close'))
{
	function bs_col_close()
	{
		return '</div>';
	}
}

if(!function_exists('bs_clearfix'))
{
	function bs_clearfix($mColClasses = '')
	{
		if(is_string($mColClasses))
		{			
			$mColClasses = array_filter(explode(' ', $mColClasses));
		}

		if(count($mColClasses))
		{
			foreach($mColClasses as $k => $v)
			{
				// Prepend 'visible-' to this class if it isn't there already
				if(substr($v, 0, 8) !== 'visible-') {
					$v = 'visible-' . $v;
				}

				// Append '-block' to this class if it isn't there already
				if(substr($v, -6) !== '-block') {
					$v = $v . '-block';
				}

				$mColClasses[$k] = $v;
			}
		}

		$aAttr = array(
			'class' => 'clearfix ' . implode(' ', $mColClasses),
		);
		return '<div' . _attributes_to_string($aAttr) . '></div>';
	}
}


/* End of file bootstrap_helper.php */
/* Location: ./application/helpers/bootstrap_helper.php */
