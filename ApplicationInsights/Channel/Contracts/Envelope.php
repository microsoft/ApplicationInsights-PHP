<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Envelope. 
*/
class Envelope implements \JsonSerializable 
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
    public function get_ver()
    {
        if (array_key_exists('ver', $this->_data)) { return $this->_data['ver']; }
        return NULL;
    }

    /**
    * Sets the ver field. 
    */
    public function set_ver($ver)
    {
        $this->_data['ver'] = $ver;
    }

    /**
    * Gets the name field. 
    */
    public function get_name()
    {
        if (array_key_exists('name', $this->_data)) { return $this->_data['name']; }
        return NULL;
    }

    /**
    * Sets the name field. 
    */
    public function set_name($name)
    {
        $this->_data['name'] = $name;
    }

    /**
    * Gets the time field. 
    */
    public function get_time()
    {
        if (array_key_exists('time', $this->_data)) { return $this->_data['time']; }
        return NULL;
    }

    /**
    * Sets the time field. 
    */
    public function set_time($time)
    {
        $this->_data['time'] = $time;
    }

    /**
    * Gets the sampleRate field. 
    */
    public function get_sample_rate()
    {
        if (array_key_exists('sampleRate', $this->_data)) { return $this->_data['sampleRate']; }
        return NULL;
    }

    /**
    * Sets the sampleRate field. 
    */
    public function set_sample_rate($sample_rate)
    {
        $this->_data['sampleRate'] = $sample_rate;
    }

    /**
    * Gets the seq field. 
    */
    public function get_seq()
    {
        if (array_key_exists('seq', $this->_data)) { return $this->_data['seq']; }
        return NULL;
    }

    /**
    * Sets the seq field. 
    */
    public function set_seq($seq)
    {
        $this->_data['seq'] = $seq;
    }

    /**
    * Gets the iKey field. 
    */
    public function get_ikey()
    {
        if (array_key_exists('iKey', $this->_data)) { return $this->_data['iKey']; }
        return NULL;
    }

    /**
    * Sets the iKey field. 
    */
    public function set_ikey($ikey)
    {
        $this->_data['iKey'] = $ikey;
    }

    /**
    * Gets the flags field. 
    */
    public function get_flags()
    {
        if (array_key_exists('flags', $this->_data)) { return $this->_data['flags']; }
        return NULL;
    }

    /**
    * Sets the flags field. 
    */
    public function set_flags($flags)
    {
        $this->_data['flags'] = $flags;
    }

    /**
    * Gets the deviceId field. 
    */
    public function get_device_id()
    {
        if (array_key_exists('deviceId', $this->_data)) { return $this->_data['deviceId']; }
        return NULL;
    }

    /**
    * Sets the deviceId field. 
    */
    public function set_device_id($device_id)
    {
        $this->_data['deviceId'] = $device_id;
    }

    /**
    * Gets the os field. 
    */
    public function get_os()
    {
        if (array_key_exists('os', $this->_data)) { return $this->_data['os']; }
        return NULL;
    }

    /**
    * Sets the os field. 
    */
    public function set_os($os)
    {
        $this->_data['os'] = $os;
    }

    /**
    * Gets the osVer field. 
    */
    public function get_os_ver()
    {
        if (array_key_exists('osVer', $this->_data)) { return $this->_data['osVer']; }
        return NULL;
    }

    /**
    * Sets the osVer field. 
    */
    public function set_os_ver($os_ver)
    {
        $this->_data['osVer'] = $os_ver;
    }

    /**
    * Gets the appId field. 
    */
    public function get_app_id()
    {
        if (array_key_exists('appId', $this->_data)) { return $this->_data['appId']; }
        return NULL;
    }

    /**
    * Sets the appId field. 
    */
    public function set_app_id($app_id)
    {
        $this->_data['appId'] = $app_id;
    }

    /**
    * Gets the appVer field. 
    */
    public function get_app_ver()
    {
        if (array_key_exists('appVer', $this->_data)) { return $this->_data['appVer']; }
        return NULL;
    }

    /**
    * Sets the appVer field. 
    */
    public function set_app_ver($app_ver)
    {
        $this->_data['appVer'] = $app_ver;
    }

    /**
    * Gets the userId field. 
    */
    public function get_user_id()
    {
        if (array_key_exists('userId', $this->_data)) { return $this->_data['userId']; }
        return NULL;
    }

    /**
    * Sets the userId field. 
    */
    public function set_user_id($user_id)
    {
        $this->_data['userId'] = $user_id;
    }

    /**
    * Gets the tags field. 
    */
    public function get_tags()
    {
        if (array_key_exists('tags', $this->_data)) { return $this->_data['tags']; }
        return NULL;
    }

    /**
    * Sets the tags field. 
    */
    public function set_tags($tags)
    {
        $this->_data['tags'] = $tags;
    }

    /**
    * Gets the data field. 
    */
    public function get_data()
    {
        if (array_key_exists('data', $this->_data)) { return $this->_data['data']; }
        return NULL;
    }

    /**
    * Sets the data field. 
    */
    public function set_data($data)
    {
        $this->_data['data'] = $data;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::remove_empty_value($this->_data);
    }
}
?>
