bootstrap_helper.php
=============

A [CodeIgniter](http://www.codeigniter.com/) helper which generates [Bootstrap](http://getbootstrap.com/)-specific HTML.


## Installation

1. [**Download** this repository](https://github.com/gp-greg/bootstrap_helper.php/archive/master.zip) and extract the archive contents.

1. **Copy** `bootstrap_helper.php` into your application's `/helpers` folder.

2. Either **load** the helper as-needed:

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


## Usage

####bs_icon()
Generates a [glyphicon](http://getbootstrap.com/components/#glyphicons), requiring at least the non-prefixed portion of the icon.
```php
echo bs_icon('home');
// <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
```
Additional attributes may be passed in the second parameter.
```php
$attr = array(
  'class' => 'text-primary',
  'id' => 'upload_now',
);

echo bs_icon('home', $attr);
// <span class="glyphicon glyphicon-home text-primary" aria-hidden="true" id="upload_now"></span>
```
---

####bs_label()
Generates a [label](http://getbootstrap.com/components/#labels), requiring at least the visible string inside the label.
```php
echo bs_label('New');
// <span class="label label-default">New</span>
```
A context class may be passed as the second parameter.
```php
echo bs_label('Watch Out', 'danger');
// <span class="label label-danger">Watch Out</span>
```
Additional attributes may be passed in the third parameter.
```php
$attr = array(
  'id' => 'hero_label',
  'class' => 'pull-right'
);

echo bs_label('Powerful', FALSE, $attr);
// <span class="label label-default pull-right" id="hero_label">Powerful</span>
```
---

####bs_panel()
####bs_breadcrumbs()
####bs_button()
####bs_dropdown()
####bs_container_open()
####bs_container_close()
####bs_row_open()
####bs_row_close()
####bs_col_open()
####bs_col_close()
####bs_clearfix()
