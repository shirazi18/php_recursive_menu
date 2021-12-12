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

# Other options
Also you can change other options below:


```php
require('recursive-menu.php');
$recursive_menu = new recursiveMenu();
//If keys of array are different as bellow:
$config["idParentList"]  =   array( array("cat_id"=>1, "parent"=>0, "menu_name"=>"Home page", "active"=>1, "link"=>"/index.html" ));
//Then you must set it to config bellow:
$config["idKey"]="cat_id";
$config["parentKey"]="parent";
$config["titleKey"]="menu_name";
$config["urlKey"]="link";
//Other options
$config["selectedKey"]="active";
$config["firstUlClass"]="main_menu";
$config["parentLiClass"]="dropdown";
$config["selectedAClass"]="active";
$config["dropdownSymbol"]="»";
...
$recursive_menu->initialize($config);
echo $recursive_menu->createListTree();
```

# General options

|Option|Default|Description|
|--- |--- |--- |
|`idParentList`||Array for the suggestion. For example: `array(array("id"=>1,"parent_id"=>0,"title"=>"Home page","selected"=>1, "url"=>"/"))`|
|`idKey`|`id`|If `id` key of array are different then you mus set it to `idKey`|
|`titleKey`|`title`|If `title` key of array are different then you mus set it to `titleKey`|
|`parentKey`|`parent_id`|If `parent_id` key of array are different then you mus set it to `parentKey`|
|`urlKey`|`url`|If `url` key of array are different then you mus set it to `urlKey`|
|`selectedKey`|`selected`|If `selected` key of array are different then you mus set it to `selectedKey`|
|`selectedLiClass`|`selected`|If `selected` key of array is true then  `selected` class name added to the <li> tag. You can change it new class name.|
|`selectedAClass`|`selected`|If `selected` key of array is true then  `selected` class name added to the <a> tag. You can change it new class name.|
|`firstUlClass`|`main_menu`|Class name of first <ul>|
|`parentUlClass`|`second_ul`|Class name for all Parent <ul> after First main <ul>|
|`parentLiClass`||Class name for parent  <li>|
|`parentLiAttr`||Attributes for parent  <li>|
|`parentAClass`||Class name for parent  <a>|
|`parentAAttr`||Attributes for parent  <a>|
|`dropdownSymbol`|`>`|Symbol for dropdowns  <a>.|



