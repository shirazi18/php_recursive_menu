# PHP Recursive hiraricial list Menu
With this class you can build the html list tree from flat array in php. For example:

* Home page
* Courses »
    * Frameworks »
      * CodeIgniter
      * Laravel
    * Programming
    * Trading
* Services
* Contact

# Basic usage
You will need to require the `recursive-menu.php` file you downloaded in your page. Example:

```php
require('recursive-menu.php');
$recursive_menu = new recursiveMenu();
$recursive_menu->idParentList = array(
  array(
    "id"=>1,
    "parent_id"=>0,
    "title"=>"Home page",
    "selected"=>1,
    "url"=>"/index.html"
  ),
  array(
    "id"=>4,
    "parent_id"=>0,
    "title"=>"Courses",
    "selected"=>0,
  "url"=>"/courses.html"
  )
);
echo $recursive_menu->createListTree();
```
