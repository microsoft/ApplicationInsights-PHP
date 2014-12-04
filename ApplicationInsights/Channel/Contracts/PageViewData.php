<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type PageViewData. 
*/
class PageViewData implements \JsonSerializable 
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Needed to properly construct the JSON envelope. 
    */
    private $_envelope_type_name;

    /**
    * Needed to properly construct the JSON envelope. 
    */
    private $_data_type_name;

    /**
    * Creates a new PageViewData. 
    */
    function __construct()
    {
        $this->_envelope_type_name = 'Microsoft.ApplicationInsights.PageView';
        $this->_data_type_name = 'PageViewData';
        $this->_data['ver'] = 2;
        $this->_data['name'] = NULL;
    }

    /**
    * Gets the envelope_type_name field. 
    */
    public function get_envelope_type_name()
    {
        return $this->_envelope_type_name;
    }

    /**
    * Gets the data_type_name field. 
    */
    public function get_data_type_name()
    {
        return $this->_data_type_name;
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
    * Gets the url field. 
    */
    public function get_url()
    {
        if (array_key_exists('url', $this->_data)) { return $this->_data['url']; }
        return NULL;
    }

    /**
    * Sets the url field. 
    */
    public function set_url($url)
    {
        $this->_data['url'] = $url;
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
    * Gets the duration field. 
    */
    public function get_duration()
    {
        if (array_key_exists('duration', $this->_data)) { return $this->_data['duration']; }
        return NULL;
    }

    /**
    * Sets the duration field. 
    */
    public function set_duration($duration)
    {
        $this->_data['duration'] = $duration;
    }

    /**
    * Gets the properties field. 
    */
    public function get_properties()
    {
        if (array_key_exists('properties', $this->_data)) { return $this->_data['properties']; }
        return NULL;
    }

    /**
    * Sets the properties field. 
    */
    public function set_properties($properties)
    {
        $this->_data['properties'] = $properties;
    }

    /**
    * Gets the measurements field. 
    */
    public function get_measurements()
    {
        if (array_key_exists('measurements', $this->_data)) { return $this->_data['measurements']; }
        return NULL;
    }

    /**
    * Sets the measurements field. 
    */
    public function set_measurements($measurements)
    {
        $this->_data['measurements'] = $measurements;
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
