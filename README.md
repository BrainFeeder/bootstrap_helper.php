ci-bootstrap_helper
=============

A CodeIgniter helper which generates Bootstrap-specific HTML.


## Installation

Copy the contents of `/application` into your own CodeIgniter's application folder.  Only a [helper](http://www.codeigniter.com/user_guide/general/helpers.html) is included with this package (so far).

Load the helper as needed:

```php
$this->load->helper('bootstrap');
```

or globally by editing `/application/config/autoload.php`:

```php

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/

$autoload['helper'] = array('bootstrap');
```


## Usage

####`bs_icon($sIcon, $aUserAttr)`
####`bs_label($sLabel, $mClasses, $aUserAttr)`
####`bs_panel($sTitle, $sBody, $sFooter, $aUserAttr, $sContext, $bSpecialBody)`
####`bs_breadcrumbs($aItems)`
####`bs_button($sUrl, $sLabel, $mButtonClasses, $aUserAttr)`
####`bs_dropdown($sLabel, $aItems, $mButtonClasses, $mSplitAttr)`
####`bs_container_open($bFluid, $aUserAttr)`
####`bs_container_close()`
####`bs_row_open($aUserAttr)`
####`bs_row_close()`
####`bs_col_open($mColClasses, $aUserAttr)`
####`bs_col_close()`
####`bs_clearfix($mColClasses, $aUserAttr)`
