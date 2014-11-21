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

####`bs_icon()`
####`bs_label()`
####`bs_panel()`
####`bs_breadcrumbs()`
####`bs_button()`
####`bs_dropdown()`
####`bs_container_open()`
####`bs_container_close()`
####`bs_row_open()`
####`bs_row_close()`
####`bs_col_open()`
####`bs_col_close()`
####`bs_clearfix()`
