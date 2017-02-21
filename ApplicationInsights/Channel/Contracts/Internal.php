<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Internal.
*/
class Internal
{
    use Json_Serializer;

    /**
    * Data array that will store all the values.
    */
    private $_data;

    /**
    * Creates a new Internal.
    */
    function __construct()
    {
        $this->_data = array();
    }

    /**
    * Gets the sdkVersion field.
    */
    public function getSdkVersion()
    {
        if (array_key_exists('ai.internal.sdkVersion', $this->_data)) { return $this->_data['ai.internal.sdkVersion']; }
        return NULL;
    }

    /**
    * Sets the sdkVersion field.
    */
    public function setSdkVersion($sdkVersion)
    {
        $this->_data['ai.internal.sdkVersion'] = $sdkVersion;
    }

    /**
    * Gets the agentVersion field.
    */
    public function getAgentVersion()
    {
        if (array_key_exists('ai.internal.agentVersion', $this->_data)) { return $this->_data['ai.internal.agentVersion']; }
        return NULL;
    }

    /**
    * Sets the agentVersion field.
    */
    public function setAgentVersion($agentVersion)
    {
        $this->_data['ai.internal.agentVersion'] = $agentVersion;
    }
}
