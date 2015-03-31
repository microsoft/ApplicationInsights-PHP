<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Envelope. 
*/
class Envelope
{
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
        return array_key_exists('ver', $this->_data) ? $this->_data['ver'] : null;
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
    * Gets the time field. 
    */
    public function getTime()
    {
        return array_key_exists('time', $this->_data) ? $this->_data['time'] : null;
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
        return array_key_exists('sampleRate', $this->_data) ? $this->_data['sampleRate'] : null;
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
        return array_key_exists('seq', $this->_data) ? $this->_data['seq'] : null;
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
        return array_key_exists('iKey', $this->_data) ? $this->_data['iKey'] : null;
    }

    /**
    * Sets the iKey field. 
    */
    public function setInstrumentationKey($iKey)
    {
        $this->_data['iKey'] = $iKey;
    }

    /**
    * Gets the flags field. 
    */
    public function getFlags()
    {
        return array_key_exists('flags', $this->_data) ? $this->_data['flags'] : null;
    }

    /**
    * Sets the flags field. 
    */
    public function setFlags($flags)
    {
        $this->_data['flags'] = $flags;
    }

    /**
    * Gets the deviceId field. 
    */
    public function getDeviceId()
    {
        return array_key_exists('deviceId', $this->_data) ? $this->_data['deviceId'] : null;
    }

    /**
    * Sets the deviceId field. 
    */
    public function setDeviceId($deviceId)
    {
        $this->_data['deviceId'] = $deviceId;
    }

    /**
    * Gets the os field. 
    */
    public function getOs()
    {
        return array_key_exists('os', $this->_data) ? $this->_data['os'] : null;
    }

    /**
    * Sets the os field. 
    */
    public function setOs($os)
    {
        $this->_data['os'] = $os;
    }

    /**
    * Gets the osVer field. 
    */
    public function getOsVer()
    {
        return array_key_exists('osVer', $this->_data) ? $this->_data['osVer'] : null;
    }

    /**
    * Sets the osVer field. 
    */
    public function setOsVer($osVer)
    {
        $this->_data['osVer'] = $osVer;
    }

    /**
    * Gets the appId field. 
    */
    public function getAppId()
    {
        return array_key_exists('appId', $this->_data) ? $this->_data['appId'] : null;
    }

    /**
    * Sets the appId field. 
    */
    public function setAppId($appId)
    {
        $this->_data['appId'] = $appId;
    }

    /**
    * Gets the appVer field. 
    */
    public function getAppVer()
    {
        return array_key_exists('appVer', $this->_data) ? $this->_data['appVer'] : null;
    }

    /**
    * Sets the appVer field. 
    */
    public function setAppVer($appVer)
    {
        $this->_data['appVer'] = $appVer;
    }

    /**
    * Gets the userId field. 
    */
    public function getUserId()
    {
        return array_key_exists('userId', $this->_data) ? $this->_data['userId'] : null;
    }

    /**
    * Sets the userId field. 
    */
    public function setUserId($userId)
    {
        $this->_data['userId'] = $userId;
    }

    /**
    * Gets the tags field. 
    */
    public function getTags()
    {
        return array_key_exists('tags', $this->_data) ? $this->_data['tags'] : null;
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
        return array_key_exists('data', $this->_data) ? $this->_data['data'] : null;
    }

    /**
    * Sets the data field. 
    */
    public function setData($data)
    {
        $this->_data['data'] = $data;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
