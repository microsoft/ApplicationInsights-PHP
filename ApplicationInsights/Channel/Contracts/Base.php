/**
*  
*  
* THIS FILE IS AUTO-GENERATED.  
* Please do not edit manually. 
*  
* Use script at <root>/Schema/generateSchema.ps1 
*  
*/
<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Base. 
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
}
