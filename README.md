bootstrap_helper.php
=============

A [CodeIgniter](http://www.codeigniter.com/) helper which generates [Bootstrap](http://getbootstrap.com/)-specific HTML.


## Installation

1. Have Bootstrap loaded in a CodeIgniter project. [See our wiki page on the topic](https://github.com/gp-greg/bootstrap_helper.php/wiki/Installing-Bootstrap-in-a-CodeIgniter-Project).

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


## Usage

###bs_icon()
```php
string bs_icon ( string $icon [, array $attributes ] )
```
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

###bs_label()
```php
string bs_icon ( string $text [, string $context_class = 'default' [, array $attributes ]] )
```
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

###bs_panel()
Generates a [panel](http://getbootstrap.com/components/#panels), accepting the title, body, and footer as the first three parameters.
```php
echo bs_panel(FALSE, 'This panel just has a footer.', "Why can't I just <em>be</em>?");
```
```html
<div class="panel panel-default">
	<div class="panel-body">This panel just has a footer.</div>
	<div class="panel-footer">Why can't I just <em>be</em>?</div>
</div>
```
The fourth parameter can contain any attributes to be applied to the main panel `<div>`.  The fifth can be used to specify the context (primary, success, info, warning, or danger).
```php
echo bs_panel('Standout Panel', 'Ooh, what is that?', FALSE, array('id' => 'cool_panel'), 'primary');
```
```html
<div class="panel panel-primary" id="cool_panel">
	<div class="panel-heading">Standout Panel</div>
	<div class="panel-body">Ooh, what is that?</div>
</div>
```
The sixth and final parameter should be `TRUE` if the user has passed in a table or list group as the body (see the [official](http://getbootstrap.com/components/#panels-tables) [docs](http://getbootstrap.com/components/#panels-list-group)) for a seamless panel.  **NOTE**: if you still want to pass in regular panel content, you'll need to wrap it in `<div class="panel-body"></div>` yourself.

---

###bs_breadcrumbs()
Generates [breadcrumbs](http://getbootstrap.com/components/#breadcrumbs).  The first and only parameter should be an array of key-value pairs of strings:
* *key*: the URL the crumb should link to.  Basic strings are run through [`site_url()`](http://www.codeigniter.com/user_guide/helpers/url_helper.html), while #page_anchors and external links are left alone.
* *value*: the visible area of the crumb.  Can contain HTML.

```php
echo bs_breadcrumbs(array(
	'' => 'Home',
	'#library' => 'Library',
	'data' => 'Data',
	'This Page'
));
```
```html
<ol class="breadcrumb">
	<li><a href="http://{{your_url}}/index.php">Home</a></li>
	<li><a href="#library">Library</a></li>
	<li><a href="http://{{your_url}}/index.php/data">Data</a></li>
	<li class="active">This Page</li>
</ol>
```
The last list item will not be linked, and will take the "active" class.

---

###bs_button()
Generates a [button](http://getbootstrap.com/css/#buttons).  The first and second parameters should contain the **URL** and **inner button HTML** respectively.  If your button is not a link, pass `FALSE` as the URL and a `<button>` element will be used instead.
```php
echo bs_button('awesome_page', 'Go to the Awesome Page');
// <a class="btn btn-link" href="http://{{your_url}}/index.php/awesome_page">Go to the Awesome Page</a>
echo bs_button(FALSE, 'Simple Button');
// <button class="btn btn-link">Simple Button</button>
```

The third parameter should contain any button classes.  **You can omit the non-unique ("btn-") part of the class names.**  Accepts an array or a space-separated string.
```php
echo bs_button('#clicken', 'Click Here', 'lg');
// <a class="btn btn-lg" href="#clicken">Click Here</a>
echo bs_button(FALSE, 'Fancy Button', array('warning', 'block', 'btn-sm'));
// <button class="btn btn-warning btn-block btn-sm">Fancy Button</button>
```
The fourth and final parameter can be an array containing additional element attributes.
```php
echo bs_button(FALSE, 'Go', 'primary block', array('id' => 'do_the_thing', 'type' => 'submit'));
// <button class="btn btn-primary btn-block" id="do_the_thing" type="submit">Go</button>
```
###bs_dropdown()
###bs_nav()
###bs_alert()
###bs_list_group()
###bs_progress_bar()
###bs_container()
###bs_row()
###bs_col()
###bs_clearfix()

## Requirements / Compatibility

* PHP >= 5.1.6
* CodeIgniter 2.x
* Bootstrap 3.x
