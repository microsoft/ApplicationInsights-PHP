<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Data_Point.
*/
class Data_Point
{
    use Json_Serializer;

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
        if (array_key_exists('name', $this->_data)) { return $this->_data['name']; }
        return NULL;
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
        if (array_key_exists('kind', $this->_data)) { return $this->_data['kind']; }
        return NULL;
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
        if (array_key_exists('value', $this->_data)) { return $this->_data['value']; }
        return NULL;
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
        if (array_key_exists('count', $this->_data)) { return $this->_data['count']; }
        return NULL;
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
        if (array_key_exists('min', $this->_data)) { return $this->_data['min']; }
        return NULL;
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
        if (array_key_exists('max', $this->_data)) { return $this->_data['max']; }
        return NULL;
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
        if (array_key_exists('stdDev', $this->_data)) { return $this->_data['stdDev']; }
        return NULL;
    }

    /**
    * Sets the stdDev field.
    */
    public function setStdDev($stdDev)
    {
        $this->_data['stdDev'] = $stdDev;
    }
}
