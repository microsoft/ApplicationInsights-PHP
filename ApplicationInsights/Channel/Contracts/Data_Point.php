<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Data_Point. 
*/
class Data_Point
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
        $this->_data['kind'] = Data_Point_Type::Measurement;
        $this->_data['value'] = NULL;
    }

    /**
    * Gets the name field. 
    */
    public function getName()
    {
        return array_key_exists('name', $this->_data) ? $this->_data['name'] : null;
    }

    /**
    * Sets the name field. 
    */
    public function setName($name)
    {
        $this->_data['name'] = $name;
    }

    /**
    * Gets the kind field. 
    */
    public function getKind()
    {
        return array_key_exists('kind', $this->_data) ? $this->_data['kind'] : null;
    }

    /**
    * Sets the kind field. 
    */
    public function setKind($kind)
    {
        $this->_data['kind'] = $kind;
    }

    /**
    * Gets the value field. 
    */
    public function getValue()
    {
        return array_key_exists('value', $this->_data) ? $this->_data['value'] : null;
    }

    /**
    * Sets the value field. 
    */
    public function setValue($value)
    {
        $this->_data['value'] = $value;
    }

    /**
    * Gets the count field. 
    */
    public function getCount()
    {
        return array_key_exists('count', $this->_data) ? $this->_data['count'] : null;
    }

    /**
    * Sets the count field. 
    */
    public function setCount($count)
    {
        $this->_data['count'] = $count;
    }

    /**
    * Gets the min field. 
    */
    public function getMin()
    {
        return array_key_exists('min', $this->_data) ? $this->_data['min'] : null;
    }

    /**
    * Sets the min field. 
    */
    public function setMin($min)
    {
        $this->_data['min'] = $min;
    }

    /**
    * Gets the max field. 
    */
    public function getMax()
    {
        return array_key_exists('max', $this->_data) ? $this->_data['max'] : null;
    }

    /**
    * Sets the max field. 
    */
    public function setMax($max)
    {
        $this->_data['max'] = $max;
    }

    /**
    * Gets the stdDev field. 
    */
    public function getStdDev()
    {
        return array_key_exists('stdDev', $this->_data) ? $this->_data['stdDev'] : null;
    }

    /**
    * Sets the stdDev field. 
    */
    public function setStdDev($stdDev)
    {
        $this->_data['stdDev'] = $stdDev;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
