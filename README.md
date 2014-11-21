ci-bootstrap
=============

A collection of tools for easily integrating Bootstrap components into CodeIgniter projects.


## Installation

Copy the contents of `/application` into your own CodeIgniter's application folder.  Only a [helper](http://www.codeigniter.com/user_guide/general/helpers.html) is included with this package (so far).


## Usage

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

> Function documentation to come.
