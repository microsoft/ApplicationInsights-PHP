<?php

namespace ApplicationInsights\Channel\Contracts;

/**
 * Data contract class for type Page_View_Data. 
 */
class Page_View_Data implements \JsonSerializable {

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
    function __construct() {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.PageView';
        $this->_dataTypeName = 'PageViewData';
        $this->_data['ver'] = 2;
        $this->_data['name'] = null;
    }

    /**
     * Gets the envelopeTypeName field. 
     */
    public function getEnvelopeTypeName() {
        return $this->_envelopeTypeName;
    }

    /**
     * Gets the dataTypeName field. 
     */
    public function getDataTypeName() {
        return $this->_dataTypeName;
    }

    /**
     * Gets the ver field. 
     */
    public function getVer() {
        if (array_key_exists('ver', $this->_data)) {
            return $this->_data['ver'];
        }
        return null;
    }

    /**
     * Sets the ver field. 
     */
    public function setVer($ver) {
        $this->_data['ver'] = $ver;
    }

    /**
     * Gets the url field. 
     */
    public function getUrl() {
        if (array_key_exists('url', $this->_data)) {
            return $this->_data['url'];
        }
        return null;
    }

    /**
     * Sets the url field. 
     */
    public function setUrl($url) {
        $this->_data['url'] = $url;
    }

    /**
     * Gets the name field. 
     */
    public function getName() {
        if (array_key_exists('name', $this->_data)) {
            return $this->_data['name'];
        }
        return null;
    }

    /**
     * Sets the name field. 
     */
    public function setName($name) {
        $this->_data['name'] = $name;
    }

    /**
     * Gets the duration field. 
     */
    public function getDuration() {
        if (array_key_exists('duration', $this->_data)) {
            return $this->_data['duration'];
        }
        return null;
    }

    /**
     * Sets the duration field. 
     */
    public function setDuration($duration) {
        $this->_data['duration'] = $duration;
    }

    /**
     * Gets the properties field. 
     */
    public function getProperties() {
        if (array_key_exists('properties', $this->_data)) {
            return $this->_data['properties'];
        }
        return null;
    }

    /**
     * Sets the properties field. 
     */
    public function setProperties($properties) {
        $this->_data['properties'] = $properties;
    }

    /**
     * Gets the measurements field. 
     */
    public function getMeasurements() {
        if (array_key_exists('measurements', $this->_data)) {
            return $this->_data['measurements'];
        }
        return null;
    }

    /**
     * Sets the measurements field. 
     */
    public function setMeasurements($measurements) {
        $this->_data['measurements'] = $measurements;
    }

    /**
     * Overrides JSON serialization for this class. 
     */
    public function jsonSerialize() {
        return Utils::removeEmptyValues($this->_data);
    }

}
