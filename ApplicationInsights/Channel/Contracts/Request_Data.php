<?php

namespace ApplicationInsights\Channel\Contracts;

/**
 * Data contract class for type Request_Data. 
 */
class Request_Data implements \JsonSerializable {

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
     * Creates a new RequestData. 
     */
    function __construct() {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.Request';
        $this->_dataTypeName = 'RequestData';
        $this->_data['ver'] = 2;
        $this->_data['id'] = null;
        $this->_data['startTime'] = null;
        $this->_data['duration'] = null;
        $this->_data['responseCode'] = null;
        $this->_data['success'] = null;
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
     * Gets the id field. 
     */
    public function getId() {
        if (array_key_exists('id', $this->_data)) {
            return $this->_data['id'];
        }
        return null;
    }

    /**
     * Sets the id field. 
     */
    public function setId($id) {
        $this->_data['id'] = $id;
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
     * Gets the startTime field. 
     */
    public function getStartTime() {
        if (array_key_exists('startTime', $this->_data)) {
            return $this->_data['startTime'];
        }
        return null;
    }

    /**
     * Sets the startTime field. 
     */
    public function setStartTime($startTime) {
        $this->_data['startTime'] = $startTime;
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
     * Gets the responseCode field. 
     */
    public function getResponseCode() {
        if (array_key_exists('responseCode', $this->_data)) {
            return $this->_data['responseCode'];
        }
        return null;
    }

    /**
     * Sets the responseCode field. 
     */
    public function setResponseCode($responseCode) {
        $this->_data['responseCode'] = $responseCode;
    }

    /**
     * Gets the success field. 
     */
    public function getSuccess() {
        if (array_key_exists('success', $this->_data)) {
            return $this->_data['success'];
        }
        return null;
    }

    /**
     * Sets the success field. 
     */
    public function setSuccess($success) {
        $this->_data['success'] = $success;
    }

    /**
     * Gets the httpMethod field. 
     */
    public function getHttpMethod() {
        if (array_key_exists('httpMethod', $this->_data)) {
            return $this->_data['httpMethod'];
        }
        return null;
    }

    /**
     * Sets the httpMethod field. 
     */
    public function setHttpMethod($httpMethod) {
        $this->_data['httpMethod'] = $httpMethod;
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
