<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP Recursive Menu</title>
  </head>
  <body>
    <?php
    require('recursive-menu.php');
    $config["idParentList"] = array(
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
      ),
      array(
        "id"=>2,
        "parent_id"=>4,
        "title"=>"Frameworks",
        "selected"=>0,
        "url"=>"#"
      ),
      array(
        "id"=>8,
        "parent_id"=>4,
        "title"=>"Programming",
        "selected"=>0,
        "url"=>"#"
      ),
      array(
        "id"=>9,
        "parent_id"=>4,
        "title"=>"Trading",
        "selected"=>0,
        "url"=>"#"
      ),
      array(
        "id"=>5,
        "parent_id"=>2,
        "title"=>"CodeIgniter",
        "selected"=>0,
        "url"=>"#"
      ),
      array(
        "id"=>6,
        "parent_id"=>2,
        "title"=>"Laravel",
        "selected"=>0,
        "url"=>"#"
      ),
      array(
        "id"=>3,
        "parent_id"=>0,
        "title"=>"Services",
        "selected"=>0,
        "url"=>"#"
      ),
      array(
        "id"=>7,
        "parent_id"=>0,
        "title"=>"Contact",
        "selected"=>0,
        "url"=>"#"
      ),
    );
    $config["firstUlClass"]="main_menu";
    $config["parentLiClass"]="dropdown";
    $config["selectedAClass"]="active";
    $config["dropdownSymbol"]="»";
    $recursiveMenu = new recursiveMenu();
    $recursiveMenu->initialize($config);
    echo $recursiveMenu->createListTree();
    ?>
  </body>
</html>
