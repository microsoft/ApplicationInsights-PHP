<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Envelope.
*/
class Envelope
{
    use Json_Serializer;
    use Version_Manager;

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
    * Gets the flags field.
    */
    public function getFlags()
    {
        if (array_key_exists('flags', $this->_data)) { return $this->_data['flags']; }
        return NULL;
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
        if (array_key_exists('deviceId', $this->_data)) { return $this->_data['deviceId']; }
        return NULL;
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
        if (array_key_exists('os', $this->_data)) { return $this->_data['os']; }
        return NULL;
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
        if (array_key_exists('osVer', $this->_data)) { return $this->_data['osVer']; }
        return NULL;
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
        if (array_key_exists('appId', $this->_data)) { return $this->_data['appId']; }
        return NULL;
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
        if (array_key_exists('appVer', $this->_data)) { return $this->_data['appVer']; }
        return NULL;
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
        if (array_key_exists('userId', $this->_data)) { return $this->_data['userId']; }
        return NULL;
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
