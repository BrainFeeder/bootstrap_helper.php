<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * the items, or, "crumbs", always defined by a label and a link
 *
 * @var array
 **/
$aPassedItems = (isset($items) ? $items : NULL);

if($aPassedItems === NULL)
{
	throw new Exception('Breadcrumbs need items.  Please pass <em>items</em> as a view parameter.');
}

if(!is_array($aPassedItems))
{
	throw new Exception('<em>items</em> must be an array.');
}

// the collection of finalized items with fully-qualified URLs
// key-value pair:
// URL => Label
$aPrintItems = array();

foreach($aPassedItems as $k => $v)
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
		$this->load->helper('url');

		$sUrl = site_url();
	}

	
	if(strpos($sUrl, '#') === 0)
	{
		// if the URL begins with #, let it pass
	}
	elseif(strpos($sUrl, 'http') !== 0)
	{
		// if the URL doesn't begin with 'http', assume it's local and use site_url
		$this->load->helper('url');

		$sUrl = site_url($sUrl);
	}

	// Add this item to the "to print" array
	$aPrintItems[] = (object) array(
		'url' => $sUrl, 
		'label' => $sLabel,
	);
}

// output it all
?>
<ol class="breadcrumb">
<?php foreach($aPrintItems as $i => $oCrumb): ?>
	<?php
	// Check if this is the last item
	$bLast = ($i+1 === count($aPrintItems) ? TRUE : FALSE);
?>

	<li<?php echo ($bLast ? ' class="active"' : ''); ?>>
		<?php if($bLast): ?>
			<?php echo $oCrumb->label; ?>
		<?php else: ?>
			<a href="<?php echo $oCrumb->url; ?>"><?php echo $oCrumb->label; ?></a>
		<?php endif; ?>
	</li>
	<?php endforeach; ?>
</ol>

<?php



/* End of file breadcrumbs.php */
/* Location: ./application/views/bootstrap/breadcrumbs.php */