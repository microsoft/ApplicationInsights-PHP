<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Operation. 
*/
class Operation
{
    use Json_Serializer;

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
        if (array_key_exists('ai.operation.id', $this->_data)) { return $this->_data['ai.operation.id']; }
        return NULL;
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
        if (array_key_exists('ai.operation.name', $this->_data)) { return $this->_data['ai.operation.name']; }
        return NULL;
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
        if (array_key_exists('ai.operation.parentId', $this->_data)) { return $this->_data['ai.operation.parentId']; }
        return NULL;
    }

    /**
    * Sets the parentId field. 
    */
    public function setParentId($parentId)
    {
        $this->_data['ai.operation.parentId'] = $parentId;
    }

    /**
    * Gets the syntheticSource field. 
    */
    public function getSyntheticSource()
    {
        if (array_key_exists('ai.operation.syntheticSource', $this->_data)) { return $this->_data['ai.operation.syntheticSource']; }
        return NULL;
    }

    /**
    * Sets the syntheticSource field. 
    */
    public function setSyntheticSource($syntheticSource)
    {
        $this->_data['ai.operation.syntheticSource'] = $syntheticSource;
    }

    /**
    * Gets the correlationVector field. 
    */
    public function getCorrelationVector()
    {
        if (array_key_exists('ai.operation.correlationVector', $this->_data)) { return $this->_data['ai.operation.correlationVector']; }
        return NULL;
    }

    /**
    * Sets the correlationVector field. 
    */
    public function setCorrelationVector($correlationVector)
    {
        $this->_data['ai.operation.correlationVector'] = $correlationVector;
    }
}
