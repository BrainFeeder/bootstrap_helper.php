bootstrap_helper.php
=============

A [CodeIgniter](http://www.codeigniter.com/) helper which generates [Bootstrap](http://getbootstrap.com/)-specific HTML.


**This helper is in active development**; [some documentation](https://github.com/gbrock/bootstrap_helper.php/wiki/History) is currently available.


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

## On the Wiki
* [History](https://github.com/gbrock/bootstrap_helper.php/wiki/History)
