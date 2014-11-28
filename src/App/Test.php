<?php
 
class recipe
{
 
    protected $_id;
 
    public $name;
 
    public $prep_time;
 
    function getIngredients() {
        $ingredients = Ingredients::fetchAllById($this->_id);
        return $ingredients;
    }
}
?>
