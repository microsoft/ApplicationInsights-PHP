<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Data.
*/
class Data
{
    use Json_Serializer;

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
        if (array_key_exists('baseType', $this->_data)) { return $this->_data['baseType']; }
        return NULL;
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
        if (array_key_exists('baseData', $this->_data)) { return $this->_data['baseData']; }
        return NULL;
    }

    /**
    * Sets the baseData field.
    */
    public function setBaseData($baseData)
    {
        $this->_data['baseData'] = $baseData;
    }
}
