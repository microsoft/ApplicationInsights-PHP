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
        if (array_key_exists('baseType', $this->_data)) { return $this->_data['baseType']; }
        return NULL;
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
        if (array_key_exists('baseData', $this->_data)) { return $this->_data['baseData']; }
        return NULL;
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
        return Utils::remove_empty_value($this->_data);
    }
}
?>
