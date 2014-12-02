bootstrap_helper.php
=============

A [CodeIgniter](http://www.codeigniter.com/) helper which generates [Bootstrap](http://getbootstrap.com/)-specific HTML.


## Reference

* [bs_icon()](https://github.com/gp-greg/bootstrap_helper.php/wiki/bs_icon())
* [bs_label()](https://github.com/gp-greg/bootstrap_helper.php/wiki/bs_label())
* [bs_panel()](https://github.com/gp-greg/bootstrap_helper.php/wiki/bs_panel())
* [bs_breadcrumbs()](https://github.com/gp-greg/bootstrap_helper.php/wiki/bs_breadcrumbs())
* [bs_button()](https://github.com/gp-greg/bootstrap_helper.php/wiki/bs_button())
* bs_dropdown()
* bs_nav()
* bs_alert()
* bs_list_group()
* bs_progress_bar()
* bs_navbar()
* bs_container()
* bs_row()
* bs_col()
* bs_clearfix()


## Installation

1. **Load** [Bootstrap](http://getbootstrap.com/getting-started/) into a CodeIgniter project.

1. [**Download** this repository](https://github.com/gp-greg/bootstrap_helper.php/archive/master.zip) and extract the archive contents.

1. **Copy** `bootstrap_helper.php` into your application's `/helpers` folder.

1. Either **load** the helper as-needed:

  ```php
  $this->load->helper('bootstrap');
  ```

  **or autoload globally** by editing `/application/config/autoload.php`:

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

## Requirements / Compatibility

* PHP >= 5.1.6
* CodeIgniter >= 2.0
* Bootstrap >= 3.0
