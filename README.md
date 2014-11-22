bootstrap_helper.php
=============

A [CodeIgniter](http://www.codeigniter.com/) helper which generates [Bootstrap](http://getbootstrap.com/)-specific HTML.


## Installation

1. [**Download** this repository](https://github.com/gp-greg/bootstrap_helper.php/archive/master.zip) and extract the archive contents.

2. **Copy** `bootstrap_helper.php` into your application's `/helpers` folder.

3. Either **load** the helper as-needed:

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
// [GREG ADD OUTPUT]
```
The fourth parameter can contain any attributes to be applied to the main panel `<div>`.  The fifth can be used to specify the context (primary, success, info, warning, or danger).
```php
echo bs_panel('Standout Panel', 'Ooh, what is that?', FALSE, 'primary');
// [GREG ADD OUTPUT]
```
The sixth and final parameter should be `TRUE` if the user has passed in a table or list group as the body (see the [official](http://getbootstrap.com/components/#panels-tables) [docs](http://getbootstrap.com/components/#panels-list-group)) for a seamless panel.

**NOTE**: if you still want to pass in regular panel content, you'll need to wrap it in `<div class="panel-body"></div>` yourself.

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

###bs_button()
###bs_dropdown()
###bs_container()
###bs_row()
###bs_col()
###bs_clearfix()
