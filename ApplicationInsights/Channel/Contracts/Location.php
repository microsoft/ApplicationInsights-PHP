<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Location.
*/
class Location
{
    use Json_Serializer;

    /**
    * Data array that will store all the values.
    */
    private $_data;

    /**
    * Creates a new Location.
    */
    function __construct()
    {
        $this->_data = array();
    }

    /**
    * Gets the ip field.
    */
    public function getIp()
    {
        if (array_key_exists('ai.location.ip', $this->_data)) { return $this->_data['ai.location.ip']; }
        return NULL;
    }

    /**
    * Sets the ip field.
    */
    public function setIp($ip)
    {
        $this->_data['ai.location.ip'] = $ip;
    }
}
