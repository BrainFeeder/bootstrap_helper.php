ci-bootstrap
=============

A collection of tools for easily integrating Bootstrap components into CodeIgniter projects.


## Installation

1. Copy the `/application/views/bootstrap/` folder into your own CodeIgniter's `application/` folder.


## Usage

### Breadcrumbs
<small>[Breadcrumbs on getbootstrap.com](http://getbootstrap.com/components/#breadcrumbs)</small>

```php
$this->load->view('bootstrap/breadcrumbs', array(
	'items' => array(
		// Blank links correspond to the homepage
		'' => 'Home',

		// anchors are left untouched
		'#library' => 'Library',

		// strings without "http" are run through "site_url()"
		'data' => 'Data',

		// the last link doesn't need a URL since it's always considered active
		'This Page',
	),
));
```
