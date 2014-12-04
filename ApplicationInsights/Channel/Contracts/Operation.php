<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Operation. 
*/
class Operation implements \JsonSerializable 
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new Operation. 
    */
    function __construct()
    {
        $this->_data = [];
    }

    /**
    * Gets the id field. 
    */
    public function get_id()
    {
        if (array_key_exists('ai.operation.id', $this->_data)) { return $this->_data['ai.operation.id']; }
        return NULL;
    }

    /**
    * Sets the id field. 
    */
    public function set_id($id)
    {
        $this->_data['ai.operation.id'] = $id;
    }

    /**
    * Gets the name field. 
    */
    public function get_name()
    {
        if (array_key_exists('ai.operation.name', $this->_data)) { return $this->_data['ai.operation.name']; }
        return NULL;
    }

    /**
    * Sets the name field. 
    */
    public function set_name($name)
    {
        $this->_data['ai.operation.name'] = $name;
    }

    /**
    * Gets the parentId field. 
    */
    public function get_parent_id()
    {
        if (array_key_exists('ai.operation.parentId', $this->_data)) { return $this->_data['ai.operation.parentId']; }
        return NULL;
    }

    /**
    * Sets the parentId field. 
    */
    public function set_parent_id($parent_id)
    {
        $this->_data['ai.operation.parentId'] = $parent_id;
    }

    /**
    * Gets the rootId field. 
    */
    public function get_root_id()
    {
        if (array_key_exists('ai.operation.rootId', $this->_data)) { return $this->_data['ai.operation.rootId']; }
        return NULL;
    }

    /**
    * Sets the rootId field. 
    */
    public function set_root_id($root_id)
    {
        $this->_data['ai.operation.rootId'] = $root_id;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::remove_empty_value($this->_data);
    }
}
?>
