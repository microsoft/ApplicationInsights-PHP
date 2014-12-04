<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type DataPoint. 
*/
class DataPoint implements \JsonSerializable 
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new DataPoint. 
    */
    function __construct()
    {
        $this->_data['name'] = NULL;
        $this->_data['kind'] = DataPointType::Measurement;
        $this->_data['value'] = NULL;
    }

    /**
    * Gets the name field. 
    */
    public function get_name()
    {
        if (array_key_exists('name', $this->_data)) { return $this->_data['name']; }
        return NULL;
    }

    /**
    * Sets the name field. 
    */
    public function set_name($name)
    {
        $this->_data['name'] = $name;
    }

    /**
    * Gets the kind field. 
    */
    public function get_kind()
    {
        if (array_key_exists('kind', $this->_data)) { return $this->_data['kind']; }
        return NULL;
    }

    /**
    * Sets the kind field. 
    */
    public function set_kind($kind)
    {
        $this->_data['kind'] = $kind;
    }

    /**
    * Gets the value field. 
    */
    public function get_value()
    {
        if (array_key_exists('value', $this->_data)) { return $this->_data['value']; }
        return NULL;
    }

    /**
    * Sets the value field. 
    */
    public function set_value($value)
    {
        $this->_data['value'] = $value;
    }

    /**
    * Gets the count field. 
    */
    public function get_count()
    {
        if (array_key_exists('count', $this->_data)) { return $this->_data['count']; }
        return NULL;
    }

    /**
    * Sets the count field. 
    */
    public function set_count($count)
    {
        $this->_data['count'] = $count;
    }

    /**
    * Gets the min field. 
    */
    public function get_min()
    {
        if (array_key_exists('min', $this->_data)) { return $this->_data['min']; }
        return NULL;
    }

    /**
    * Sets the min field. 
    */
    public function set_min($min)
    {
        $this->_data['min'] = $min;
    }

    /**
    * Gets the max field. 
    */
    public function get_max()
    {
        if (array_key_exists('max', $this->_data)) { return $this->_data['max']; }
        return NULL;
    }

    /**
    * Sets the max field. 
    */
    public function set_max($max)
    {
        $this->_data['max'] = $max;
    }

    /**
    * Gets the stdDev field. 
    */
    public function get_std_dev()
    {
        if (array_key_exists('stdDev', $this->_data)) { return $this->_data['stdDev']; }
        return NULL;
    }

    /**
    * Sets the stdDev field. 
    */
    public function set_std_dev($std_dev)
    {
        $this->_data['stdDev'] = $std_dev;
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
