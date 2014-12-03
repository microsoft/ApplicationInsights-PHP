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
        return $this->_data['ver'];
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
        return $this->_data['name'];
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
        return $this->_data['time'];
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
        return $this->_data['sampleRate'];
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
        return $this->_data['seq'];
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
        return $this->_data['iKey'];
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
        return $this->_data['flags'];
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
        return $this->_data['deviceId'];
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
        return $this->_data['os'];
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
        return $this->_data['osVer'];
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
        return $this->_data['appId'];
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
        return $this->_data['appVer'];
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
        return $this->_data['userId'];
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
        return $this->_data['tags'];
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
        return $this->_data['data'];
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
        return $this->_data;
    }
}
?>
