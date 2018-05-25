<?php
namespace ApplicationInsights\Channel\Contracts;
/**
*  
* THIS FILE IS AUTO-GENERATED.  
* Please do not edit manually. 
*  
* Use script at <root>/Schema/generateSchema.ps1 
*  
*/

/**
* Data contract class for type Base. Data struct to contain only C section with custom fields. 
*/
class Base
{
    use Json_Serializer;

    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new Base. 
    */
    function __construct()
    {
        $this->_data = array();
    }

    /**
    * Gets the baseType field. Name of item (B section) if any. If telemetry data is derived straight from this, this should be null. 
    */
    public function getBaseType()
    {
        if (array_key_exists('baseType', $this->_data)) { return $this->_data['baseType']; }
        return NULL;
    }

    /**
    * Sets the baseType field. Name of item (B section) if any. If telemetry data is derived straight from this, this should be null. 
    */
    public function setBaseType($baseType)
    {
        $this->_data['baseType'] = $baseType;
    }
}
