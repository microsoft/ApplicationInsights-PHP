<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Operation. 
*/
class Operation
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
        $this->_data = array();
    }

    /**
    * Gets the id field. 
    */
    public function getId()
    {
        return array_key_exists('ai.operation.id', $this->_data) ? $this->_data['ai.operation.id'] : null;
    }

    /**
    * Sets the id field. 
    */
    public function setId($id)
    {
        $this->_data['ai.operation.id'] = $id;
    }

    /**
    * Gets the name field. 
    */
    public function getName()
    {
        return array_key_exists('ai.operation.name', $this->_data) ? $this->_data['ai.operation.name'] : null;
    }

    /**
    * Sets the name field. 
    */
    public function setName($name)
    {
        $this->_data['ai.operation.name'] = $name;
    }

    /**
    * Gets the parentId field. 
    */
    public function getParentId()
    {
        return array_key_exists('ai.operation.parentId', $this->_data) ? $this->_data['ai.operation.parentId'] : null;
    }

    /**
    * Sets the parentId field. 
    */
    public function setParentId($parentId)
    {
        $this->_data['ai.operation.parentId'] = $parentId;
    }

    /**
    * Gets the rootId field. 
    */
    public function getRootId()
    {
        return array_key_exists('ai.operation.rootId', $this->_data) ? $this->_data['ai.operation.rootId'] : null;
    }

    /**
    * Sets the rootId field. 
    */
    public function setRootId($rootId)
    {
        $this->_data['ai.operation.rootId'] = $rootId;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
