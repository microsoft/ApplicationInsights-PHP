<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Data. 
*/
class Data implements \JsonSerializable 
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
    public function get_base_type()
    {
        return $this->_data['baseType'];
    }

    /**
    * Sets the baseType field. 
    */
    public function set_base_type($base_type)
    {
        $this->_data['baseType'] = $base_type;
    }

    /**
    * Gets the baseData field. 
    */
    public function get_base_data()
    {
        return $this->_data['baseData'];
    }

    /**
    * Sets the baseData field. 
    */
    public function set_base_data($base_data)
    {
        $this->_data['baseData'] = $base_data;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return $this->_data;
    }
}
?>
