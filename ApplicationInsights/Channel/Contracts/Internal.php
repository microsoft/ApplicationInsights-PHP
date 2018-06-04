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
    * Gets the sdkVersion field. SDK version. See https://github.com/Microsoft/ApplicationInsights-Home/blob/master/SDK-AUTHORING.md#sdk-version-specification for information. 
    */
    public function getSdkVersion()
    {
        if (array_key_exists('ai.internal.sdkVersion', $this->_data)) { return $this->_data['ai.internal.sdkVersion']; }
        return NULL;
    }

    /**
    * Sets the sdkVersion field. SDK version. See https://github.com/Microsoft/ApplicationInsights-Home/blob/master/SDK-AUTHORING.md#sdk-version-specification for information. 
    */
    public function setSdkVersion($sdkVersion)
    {
        $this->_data['ai.internal.sdkVersion'] = $sdkVersion;
    }

    /**
    * Gets the agentVersion field. Agent version. Used to indicate the version of StatusMonitor installed on the computer if it is used for data collection. 
    */
    public function getAgentVersion()
    {
        if (array_key_exists('ai.internal.agentVersion', $this->_data)) { return $this->_data['ai.internal.agentVersion']; }
        return NULL;
    }

    /**
    * Sets the agentVersion field. Agent version. Used to indicate the version of StatusMonitor installed on the computer if it is used for data collection. 
    */
    public function setAgentVersion($agentVersion)
    {
        $this->_data['ai.internal.agentVersion'] = $agentVersion;
    }

    /**
    * Gets the nodeName field. This is the node name used for billing purposes. Use it to override the standard detection of nodes. 
    */
    public function getNodeName()
    {
        if (array_key_exists('ai.internal.nodeName', $this->_data)) { return $this->_data['ai.internal.nodeName']; }
        return NULL;
    }

    /**
    * Sets the nodeName field. This is the node name used for billing purposes. Use it to override the standard detection of nodes. 
    */
    public function setNodeName($nodeName)
    {
        $this->_data['ai.internal.nodeName'] = $nodeName;
    }
}
