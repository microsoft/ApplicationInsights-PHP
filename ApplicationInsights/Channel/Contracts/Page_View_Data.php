<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Page_View_Data. 
*/
class Page_View_Data
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Needed to properly construct the JSON envelope. 
    */
    private $_envelopeTypeName;

    /**
    * Needed to properly construct the JSON envelope. 
    */
    private $_dataTypeName;

    /**
    * Creates a new PageViewData. 
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.PageView';
        $this->_dataTypeName = 'PageViewData';
        $this->_data['ver'] = 2;
        $this->_data['name'] = NULL;
    }

    /**
    * Gets the envelopeTypeName field. 
    */
    public function getEnvelopeTypeName()
    {
        return $this->_envelopeTypeName;
    }

    /**
    * Gets the dataTypeName field. 
    */
    public function getDataTypeName()
    {
        return $this->_dataTypeName;
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
    * Gets the url field. 
    */
    public function getUrl()
    {
        return array_key_exists('url', $this->_data) ? $this->_data['url'] : null;
    }

    /**
    * Sets the url field. 
    */
    public function setUrl($url)
    {
        $this->_data['url'] = $url;
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
    * Gets the duration field. 
    */
    public function getDuration()
    {
        return array_key_exists('duration', $this->_data) ? $this->_data['duration'] : null;
    }

    /**
    * Sets the duration field. 
    */
    public function setDuration($duration)
    {
        $this->_data['duration'] = $duration;
    }

    /**
    * Gets the properties field. 
    */
    public function getProperties()
    {
        return array_key_exists('properties', $this->_data) ? $this->_data['properties'] : null;
    }

    /**
    * Sets the properties field. 
    */
    public function setProperties($properties)
    {
        $this->_data['properties'] = $properties;
    }

    /**
    * Gets the measurements field. 
    */
    public function getMeasurements()
    {
        return array_key_exists('measurements', $this->_data) ? $this->_data['measurements'] : null;
    }

    /**
    * Sets the measurements field. 
    */
    public function setMeasurements($measurements)
    {
        $this->_data['measurements'] = $measurements;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
