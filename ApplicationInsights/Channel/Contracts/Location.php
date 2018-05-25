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
    * Gets the ip field. The IP address of the client device. IPv4 and IPv6 are supported. Information in the location context fields is always about the end user. When telemetry is sent from a service, the location context is about the user that initiated the operation in the service. 
    */
    public function getIp()
    {
        if (array_key_exists('ai.location.ip', $this->_data)) { return $this->_data['ai.location.ip']; }
        return NULL;
    }

    /**
    * Sets the ip field. The IP address of the client device. IPv4 and IPv6 are supported. Information in the location context fields is always about the end user. When telemetry is sent from a service, the location context is about the user that initiated the operation in the service. 
    */
    public function setIp($ip)
    {
        $this->_data['ai.location.ip'] = $ip;
    }
}
