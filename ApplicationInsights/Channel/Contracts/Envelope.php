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
* Data contract class for type Envelope. System variables for a telemetry item. 
*/
class Envelope
{
    use Json_Serializer;

    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new Envelope. 
    */
    function __construct()
    {
        $this->_data['ver'] = 1;
        $this->_data['name'] = NULL;
        $this->_data['time'] = NULL;
        $this->_data['sampleRate'] = 100.0;
    }

    /**
    * Gets the ver field. Envelope version. For internal use only. By assigning this the default, it will not be serialized within the payload unless changed to a value other than #1. 
    */
    public function getVer()
    {
        if (array_key_exists('ver', $this->_data)) { return $this->_data['ver']; }
        return NULL;
    }

    /**
    * Sets the ver field. Envelope version. For internal use only. By assigning this the default, it will not be serialized within the payload unless changed to a value other than #1. 
    */
    public function setVer($ver)
    {
        $this->_data['ver'] = $ver;
    }

    /**
    * Gets the name field. Type name of telemetry data item. 
    */
    public function getName()
    {
        if (array_key_exists('name', $this->_data)) { return $this->_data['name']; }
        return NULL;
    }

    /**
    * Sets the name field. Type name of telemetry data item. 
    */
    public function setName($name)
    {
        $this->_data['name'] = $name;
    }

    /**
    * Gets the time field. Event date time when telemetry item was created. This is the wall clock time on the client when the event was generated. There is no guarantee that the client's time is accurate. This field must be formatted in UTC ISO 8601 format, with a trailing 'Z' character, as described publicly on https://en.wikipedia.org/wiki/ISO_8601#UTC. Note: the number of decimal seconds digits provided are variable (and unspecified). Consumers should handle this, i.e. managed code consumers should not use format 'O' for parsing as it specifies a fixed length. Example: 2009-06-15T13:45:30.0000000Z. 
    */
    public function getTime()
    {
        if (array_key_exists('time', $this->_data)) { return $this->_data['time']; }
        return NULL;
    }

    /**
    * Sets the time field. Event date time when telemetry item was created. This is the wall clock time on the client when the event was generated. There is no guarantee that the client's time is accurate. This field must be formatted in UTC ISO 8601 format, with a trailing 'Z' character, as described publicly on https://en.wikipedia.org/wiki/ISO_8601#UTC. Note: the number of decimal seconds digits provided are variable (and unspecified). Consumers should handle this, i.e. managed code consumers should not use format 'O' for parsing as it specifies a fixed length. Example: 2009-06-15T13:45:30.0000000Z. 
    */
    public function setTime($time)
    {
        $this->_data['time'] = $time;
    }

    /**
    * Gets the sampleRate field. Sampling rate used in application. This telemetry item represents 1 / sampleRate actual telemetry items. 
    */
    public function getSampleRate()
    {
        if (array_key_exists('sampleRate', $this->_data)) { return $this->_data['sampleRate']; }
        return NULL;
    }

    /**
    * Sets the sampleRate field. Sampling rate used in application. This telemetry item represents 1 / sampleRate actual telemetry items. 
    */
    public function setSampleRate($sampleRate)
    {
        $this->_data['sampleRate'] = $sampleRate;
    }

    /**
    * Gets the seq field. Sequence field used to track absolute order of uploaded events. 
    */
    public function getSeq()
    {
        if (array_key_exists('seq', $this->_data)) { return $this->_data['seq']; }
        return NULL;
    }

    /**
    * Sets the seq field. Sequence field used to track absolute order of uploaded events. 
    */
    public function setSeq($seq)
    {
        $this->_data['seq'] = $seq;
    }

    /**
    * Gets the iKey field. The application's instrumentation key. The key is typically represented as a GUID, but there are cases when it is not a guid. No code should rely on iKey being a GUID. Instrumentation key is case insensitive. 
    */
    public function getInstrumentationKey()
    {
        if (array_key_exists('iKey', $this->_data)) { return $this->_data['iKey']; }
        return NULL;
    }

    /**
    * Sets the iKey field. The application's instrumentation key. The key is typically represented as a GUID, but there are cases when it is not a guid. No code should rely on iKey being a GUID. Instrumentation key is case insensitive. 
    */
    public function setInstrumentationKey($iKey)
    {
        $this->_data['iKey'] = $iKey;
    }

    /**
    * Gets the tags field. Key/value collection of context properties. See ContextTagKeys for information on available properties. 
    */
    public function getTags()
    {
        if (array_key_exists('tags', $this->_data)) { return $this->_data['tags']; }
        return NULL;
    }

    /**
    * Sets the tags field. Key/value collection of context properties. See ContextTagKeys for information on available properties. 
    */
    public function setTags($tags)
    {
        $this->_data['tags'] = $tags;
    }

    /**
    * Gets the data field. Telemetry data item. 
    */
    public function getData()
    {
        if (array_key_exists('data', $this->_data)) { return $this->_data['data']; }
        return NULL;
    }

    /**
    * Sets the data field. Telemetry data item. 
    */
    public function setData($data)
    {
        $this->_data['data'] = $data;
    }
}
