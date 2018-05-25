/**
*  
*  
* THIS FILE IS AUTO-GENERATED.  
* Please do not edit manually. 
*  
* Use script at <root>/Schema/generateSchema.ps1 
*  
*/
<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Envelope. 
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
    * Gets the ver field. 
    */
    public function getVer()
    {
        if (array_key_exists('ver', $this->_data)) { return $this->_data['ver']; }
        return NULL;
    }

    /**
    * Sets the ver field. 
    */
    public function setVer($ver)
    {
        $this->_data['ver'] = $ver;
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
    * Gets the time field. 
    */
    public function getTime()
    {
        if (array_key_exists('time', $this->_data)) { return $this->_data['time']; }
        return NULL;
    }

    /**
    * Sets the time field. 
    */
    public function setTime($time)
    {
        $this->_data['time'] = $time;
    }

    /**
    * Gets the sampleRate field. 
    */
    public function getSampleRate()
    {
        if (array_key_exists('sampleRate', $this->_data)) { return $this->_data['sampleRate']; }
        return NULL;
    }

    /**
    * Sets the sampleRate field. 
    */
    public function setSampleRate($sampleRate)
    {
        $this->_data['sampleRate'] = $sampleRate;
    }

    /**
    * Gets the seq field. 
    */
    public function getSeq()
    {
        if (array_key_exists('seq', $this->_data)) { return $this->_data['seq']; }
        return NULL;
    }

    /**
    * Sets the seq field. 
    */
    public function setSeq($seq)
    {
        $this->_data['seq'] = $seq;
    }

    /**
    * Gets the iKey field. 
    */
    public function getInstrumentationKey()
    {
        if (array_key_exists('iKey', $this->_data)) { return $this->_data['iKey']; }
        return NULL;
    }

    /**
    * Sets the iKey field. 
    */
    public function setInstrumentationKey($iKey)
    {
        $this->_data['iKey'] = $iKey;
    }

    /**
    * Gets the tags field. 
    */
    public function getTags()
    {
        if (array_key_exists('tags', $this->_data)) { return $this->_data['tags']; }
        return NULL;
    }

    /**
    * Sets the tags field. 
    */
    public function setTags($tags)
    {
        $this->_data['tags'] = $tags;
    }

    /**
    * Gets the data field. 
    */
    public function getData()
    {
        if (array_key_exists('data', $this->_data)) { return $this->_data['data']; }
        return NULL;
    }

    /**
    * Sets the data field. 
    */
    public function setData($data)
    {
        $this->_data['data'] = $data;
    }
}
