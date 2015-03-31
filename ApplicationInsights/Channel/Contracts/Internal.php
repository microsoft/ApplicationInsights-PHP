<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Internal. 
*/
class Internal
{
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
        return array_key_exists('ai.internal.sdkVersion', $this->_data) ? $this->_data['ai.internal.sdkVersion'] : null;
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
        return array_key_exists('ai.internal.agentVersion', $this->_data) ? $this->_data['ai.internal.agentVersion'] : null;
    }

    /**
    * Sets the agentVersion field. 
    */
    public function setAgentVersion($agentVersion)
    {
        $this->_data['ai.internal.agentVersion'] = $agentVersion;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
