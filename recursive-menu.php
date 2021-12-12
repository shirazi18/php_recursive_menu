<?php
# ======================================================================== #
#
#  Title      [PHP] RecursiveMenu
#  Author:    shirazi
#  Website:   https://phprecursivemenu.xazak.net/
#  Version:   1.0
#  Date:      12-Dec-2021
#  Purpose:   You can set the array to the this class and can create hierarchical html list with this class
#
# ======================================================================== #
class recursiveMenu {

  /**
   * Title Key
   *
   * @var	string
   */
  protected $titleKey = 'title';

  /**
   * ID Key
   *
   * @var	string
   */
  protected $idKey = 'id';

  /**
   * Parent Id Key
   *
   * @var	string
   */
  protected $parentKey = 'parent_id';

  /**
   * Url Key
   *
   * @var	string
   */
  protected $urlKey = 'url';

  /**
   * Selected item Key
   *
   * @var	string
   */
  protected $selectedKey = 'selected';

  /**
   * class name for selected <li>
   *
   * @var	string
   */
  protected $selectedLiClass = 'selected';

  /**
   * class name for selected <a>
   *
   * @var	string
   */
  protected $selectedAClass = 'selected';

  /**
   * Class name for First <ul>
   *
   * @var	string
   */
  protected $firstUlClass = 'main_menu';

  /**
   * Class name for all Parent <ul> after First main <ul>
   *
   * @var	string
   */
  protected $parentUlClass = 'second_ul';


  /**
   * Class name for parent <li>
   *
   * @var	string
   */
  protected $parentLiClass = '';

  /**
   * Attributes for parent <li>
   *
   * @var	string
   */
  protected $parentLiAttr= '';


  /**
   * Class name for parent <a>
   *
   * @var	string
   */
  protected $parentAClass = '';

  /**
   * Attributes for parent <a>
   *
   * @var	string
   */
  protected $parentAAttr= '';

  /**
   * Dropdown symbol
   *
   * @var	string
   */
  protected $dropdownSymbol = '&gt;';


  /**
   * Tree list
   *
   * @var	string
   */
  protected $treeList = '';

  /**
   * List Array
   *
   * @var	array
   */
  public $idParentList = array();

  /**
	 * Constructor
	 *
	 * @param	array	$params	Initialization parameters
	 * @return	void
	 */
  public function __construct($params = array())
  {
    $this->initialize($params);
  }



  /**
	 * Initialize Preferences
	 *
	 * @param	array	$params	Initialization parameters
	 * @return	recursiveMenu
	 */
  public function initialize(array $params = array())
	{
    foreach ($params as $key => $val)
		{
			if (property_exists($this, $key))
			{
				$this->$key = $val;
			}
		}
    return $this;
  }



  /**
	 * Generate the tree list
	 *
	 * @return	string
	 */
  public function createListTree()
	{

		if($this->idParentList)
		{
      $title = [];
      $id = [];
      $parent_id = [];
      $url = [];
      $sub_id = [];
			$sub_category = [];
			$selected = [];
			foreach($this->idParentList as $row)
			{
				$title[(string)$row[$this->idKey]] = $row[$this->titleKey];
				$selected[(string)$row[$this->idKey]] = $row[$this->selectedKey];
				$id[(string)$row[$this->idKey]] = $row[$this->idKey];
				$sub_id =$row[$this->parentKey];
				$parent_id[(string)$row[$this->idKey]] = $row[$this->parentKey];
				$url[(string)$row[$this->idKey]] = $row[$this->urlKey];
				$sub_id = (string)$sub_id;
				if(!array_key_exists($sub_id, $sub_category))
					$sub_category[$sub_id] = array();
				$sub_category[$sub_id][] = (string)$row[$this->idKey];
			}
			$first_ul =1;
			$this->recursiveTree('0',$title, $sub_category, $first_ul, $url, $parent_id, $id, $selected);
			return $this->treeList;
		}else
		{
			return "";
		}
  }
  private function recursiveTree($parent = "0", $title=[], $sub_category=[],  $first_ul=[], $url=[], $parent_id=[], $id=[], $selected=[])
	{
      if (!function_exists('is_countable')) {
        function is_countable($var) {
            return (is_array($var) || $var instanceof Countable);
        }
      }
			$parent_li_class="";
			$parent_li_attr="";
			$parent_a_class="";
			$parent_a_attr="";
			$dropdown_symbol="";
	    if($parent)
			{
				$children = @$sub_category[$parent];
		    if(is_countable($children) && count($children) !="0"){
					if($first_ul!=1)
					{
						$parent_li_class = $this->parentLiClass;
						$parent_li_attr = $this->parentLiAttr;

						$parent_a_class = $this->parentAClass;
						$parent_a_attr = $this->parentAAttr;

            $dropdown_symbol = $this->dropdownSymbol;
					}
				}
				$this->treeList =  $this->treeList.'<li class="'.($selected[$parent]?$this->selectedLiClass.' ':'').$parent_li_class.'"'.($parent_li_attr?' '.$parent_li_attr:'').'><a class="'.($selected[$parent]?$this->selectedAClass.' ':'').$parent_a_class.'" href="'.$url[$parent].'"'.($parent_a_attr?' '.$parent_a_attr:'').'>'.$title[$parent].($dropdown_symbol?' '.$dropdown_symbol:'').'</a>';
			}
	    $children = @$sub_category[$parent];
	    if(is_countable($children) && @count($children) !="0"){
			if($first_ul==1)
			{
				$this->treeList =  '<ul class="'.$this->firstUlClass.'">'. PHP_EOL;
			}else
			{
				$this->treeList =  $this->treeList.PHP_EOL.'<ul class="'.$this->parentUlClass.'">'. PHP_EOL;
			}

       foreach($children as $child)
       $this->recursiveTree($child, $title, $sub_category, 0, $url, $parent_id, $id, $selected);
			 $this->treeList =  $this->treeList."</ul>". PHP_EOL ;

	    }
	    if($parent != "0")
	    {
  			$this->treeList =  $this->treeList.'</li>'. PHP_EOL;
  		}

	}






}
