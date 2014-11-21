<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// "$this" works under light testing, but experience shows that it won't
// necessarily work in every context, so let's use a $CI variable
$CI =& get_instance();

 // we use the CI form helper's _attributes_to_string()
$CI->load->helper('form');

if(!function_exists('bs_icon'))
{
	function bs_icon($sIcon = FALSE, $aUserAttr = array())
	{
		$aAttr = array(
			'class' => 'glyphicon glyphicon-' . $sIcon,
			'aria-hidden' => 'true',
		);

		return '<span' . _bs_attributes_to_string($aAttr, $aUserAttr) . '></span>';
	}
}

if(!function_exists('bs_label'))
{
	function bs_label($sLabel = '', $mClasses = FALSE, $aUserAttr = array())
	{
		if(!$mClasses)
		{
			$mClasses = 'default';
		}

		if(is_string($mClasses))
		{			
			$mClasses = array_filter(explode(' ', $mClasses));
		}

		if(count($mClasses))
		{
			foreach($mClasses as $k => $v)
			{
				// Add 'btn-' to this class if it isn't there already
				if(substr($v, 0, 6) !== 'label-') {
					$v = 'label-' . $v;
				}

				$mClasses[$k] = $v;
			}
		}

		$aAttr = array(
			'class' => 'label ' . implode(' ', $mClasses),
		);

		return '<span' . _bs_attributes_to_string($aAttr, $aUserAttr) . '>' . $sLabel . '</span>';
	}
}

if(!function_exists('bs_panel'))
{
	function bs_panel($sTitle = '', $sBody = '', $sFooter = '', $aUserAttr = array(), $sContext = FALSE, $bSpecialBody = FALSE)
	{
		if(!$sContext)
		{
			$sContext = 'default';
		}

		$aAttr = array(
			'class' => 'panel panel-' . $sContext,
		);

		if($sTitle)
		{
			$sTitle = '<div class="panel-heading">' . $sTitle . '</div>';
		}

		if($sFooter)
		{
			$sFooter = '<div class="panel-footer">' . $sFooter . '</div>';
		}

		if(!$bSpecialBody)
		{
			$sBody = '<div class="panel-body">' . $sBody . '</div>';
		}

		return '<div' . _bs_attributes_to_string($aAttr, $aUserAttr) . '>' . $sTitle . $sBody . $sFooter . '</div>';
	}
}

if(!function_exists('bs_breadcrumbs'))
{
	function bs_breadcrumbs($aItems = array())
	{
		// $aPassedItems = (isset($items) ? $items : NULL);
		$CI =& get_instance();

		$s = '';
		$aPrintItems = array();

		foreach($aItems as $k => $v)
		{
			$sUrl = $k;
			$sLabel = $v;

			if(!is_string($sLabel))
			{
				throw new Exception('Passed label must be a string');
			}

			// if this link is empty, or numeric, 
			// assume this is a link to the homepage
			if(empty($sUrl) || is_numeric($sUrl)) {
				$CI->load->helper('url');

				$sUrl = site_url();
			}

			
			if(strpos($sUrl, '#') === 0) // if the URL begins with #, let it pass
			{
			}
			elseif(strpos($v, '://') === FALSE) // if it isn't an external URL, run it through site_url()
			{
				$CI->load->helper('url');

				$sUrl = site_url($sUrl);
			}

			// Add this item to the "to print" array
			$aPrintItems[] = (object) array(
				'url' => $sUrl, 
				'label' => $sLabel,
			);
		}

		// output it all
		$s .= '<ol class="breadcrumb">';
		foreach($aPrintItems as $i => $oCrumb)
		{

			// Check if this is the last item
			$bLast = ($i+1 === count($aPrintItems) ? TRUE : FALSE);

			$s .= '<li' . ($bLast ? ' class="active"' : '') . '>';
			
			if($bLast)
			{
				$s .= $oCrumb->label;
			}
			else
			{
				$s .= '<a href="' . $oCrumb->url . '">'. $oCrumb->label . '</a>';
			}
				
			$s .= '</li>';
		}
		
		$s .= '</ol>';

		return $s;
	}
}

if(!function_exists('bs_button'))
{
	function bs_button($sUrl = FALSE, $sLabel = '', $mButtonClasses = FALSE, $aUserAttr = array())
	{
		$bAnchor = ($sUrl ? TRUE : FALSE);

		if(!$mButtonClasses)
		{
			$mButtonClasses = 'link';
		}

		if(is_string($mButtonClasses))
		{			
			$mButtonClasses = array_filter(explode(' ', $mButtonClasses));
		}

		if(count($mButtonClasses))
		{
			foreach($mButtonClasses as $k => $v)
			{
				// Add 'btn-' to this class if it isn't there already
				if(substr($v, 0, 4) !== 'btn-') {
					$v = 'btn-' . $v;
				}

				$mButtonClasses[$k] = $v;
			}
		}

		$aAttr = array(
			'class' => 'btn ' . implode(' ', $mButtonClasses),
		);

		$sTag = 'button';

		if($bAnchor)
		{
			// if this is a link, use an anchor tag and insert the URL as its href
			$sTag = 'a';
			$aAttr = array_merge($aAttr, array(
				'href' => $sUrl,
			));
		}

		return '<' . $sTag . _bs_attributes_to_string($aAttr, $aUserAttr) . '>' . $sLabel . '</' . $sTag . '>';
	}
}

if(!function_exists('bs_dropdown'))
{
	function bs_dropdown($sLabel = '', $aItems = array(), $mButtonClasses = FALSE, $mSplitAttr = FALSE)
	{
		if(!$mButtonClasses)
		{
			$mButtonClasses = 'default';
		}

		$s = ''; // the return string
		$bSplit = ($mSplitAttr != FALSE); // is this is a split button?
		$sCaret = '<div class="caret"></div>';
		$sToggleLabel = $sLabel;
		$aLI = array();
		$aListAttr = array(
			'class' => 'dropdown-menu',
			'role' => 'menu',
		);

		$sSplitURL = FALSE;
		$aSplitAttr = array();

		if($bSplit) {
			$sToggleLabel = $sCaret;

			if(is_string($mSplitAttr))
			{
				$sSplitURL = $mSplitAttr;
			}
			elseif(is_object($mSplitAttr) || is_array($mSplitAttr))
			{
				$aSplitAttr = (array) $mSplitAttr;
			}
		} else {
			$sToggleLabel .= ' '.$sCaret;
		}

		if(count($aItems))
		{
			foreach($aItems as $k => $v)
			{
				if(is_string($v) && preg_match('/^\-+$/', $v))
				{
					// It's a divider
					$aLI[] = '<li' . _bs_attributes_to_string(array(
						'class' => 'divider',
						'role' => 'presentation',
					)) . '></li>';
				}
				elseif(is_array($v))
				{
					$sHref = (isset($v['href']) ? $v['href'] : '');
					unset($v['href']);

					if(isset($v['label']))
					{
						// If the user has set the 'label' key, use that.
						$sItemLabel = $v['label'];
					}
					else
					{
						// otherwise, assume the key is the label.
						$sItemLabel = $k;
					}

					$aLI[] = '<li' . _bs_attributes_to_string($v).'>' . $sItemLabel . '</li>';
				}
				elseif(is_string($k))
				{
					$aLI[] = '<li>' . anchor($k, $v) . '</li>';
				}
				else
				{
					$aLI[] = '<li>' . $v . '</li>';
				}
			}
		}

		$s .= '<div class="btn-group">';
		if($bSplit) {
			$s .= bs_button($sSplitURL, $sLabel, $mButtonClasses);
		}
		$s .= bs_button(FALSE, $sToggleLabel, $mButtonClasses, array(
			'class' => 'dropdown-toggle',
			'data-toggle' => 'dropdown',
			'aria-expanded' => 'false',
		));

		$s .= '<ul' . _bs_attributes_to_string($aListAttr) . '>';
		$s .= implode('', $aLI);
		$s .= '</ul>';

		$s .= '</div>';

		return $s;
	}
}

if(!function_exists('bs_container_open'))
{
	function bs_container_open($bFluid = FALSE, $aUserAttr = array())
	{
		$aAttr = array(
			'class' => 'container' . ($bFluid ? '-fluid' : ''),
		);
		return '<div' . _bs_attributes_to_string($aAttr, $aUserAttr) . '>';
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
	function bs_row_open($aUserAttr = array())
	{
		$aAttr = array(
			'class' => 'row',
		);
		return '<div' . _bs_attributes_to_string($aAttr, $aUserAttr) . '>';
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
	function bs_col_open($mColClasses = '', $aUserAttr = array())
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
		return '<div' . _bs_attributes_to_string($aAttr, $aUserAttr) . '>';
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
	function bs_clearfix($mColClasses = '', $aUserAttr = array())
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
		return '<div' . _bs_attributes_to_string($aAttr, $aUserAttr) . '></div>';
	}
}

if(!function_exists('_bs_attributes_to_string'))
{
	// Merges in a secondary array of user variables,
	// then uses the CI form helper.
	function _bs_attributes_to_string($aAttr, $aUserAttr = array())
	{
		$aMergedAttr = $aAttr; // will get sent if $aUserAttr is empty

		if(is_array($aUserAttr) && count($aUserAttr))
		{
			// if both arrays sent classes, concatenate them instead of
			// overwriting one with the other
			if(isset($aUserAttr['class']) && isset($aAttr['class']))
			{
				// Merge both classes into the array with precedence
				$aUserAttr['class'] = $aAttr['class'].' '.$aUserAttr['class'];
			}
			$aMergedAttr = array_merge($aAttr, $aUserAttr); // merge in any passed attributes
			
		}

		return _attributes_to_string($aMergedAttr);
	}
}


/* End of file bootstrap_helper.php */
/* Location: ./application/helpers/bootstrap_helper.php */
