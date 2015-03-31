<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Data. 
*/
class Data
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new Data. 
    */
    function __construct()
    {
        $this->_data['baseData'] = NULL;
    }

    /**
    * Gets the baseType field. 
    */
    public function getBaseType()
    {
        return array_key_exists('baseType', $this->_data) ? $this->_data['baseType'] : null;
    }

    /**
    * Sets the baseType field. 
    */
    public function setBaseType($baseType)
    {
        $this->_data['baseType'] = $baseType;
    }

    /**
    * Gets the baseData field. 
    */
    public function getBaseData()
    {
        return array_key_exists('baseData', $this->_data) ? $this->_data['baseData'] : null;
    }

    /**
    * Sets the baseData field. 
    */
    public function setBaseData($baseData)
    {
        $this->_data['baseData'] = $baseData;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
