<?php

namespace ApplicationInsights\Channel\Contracts;

/**
 * Data contract class for type Location. 
 */
class Location implements \JsonSerializable {

    /**
     * Data array that will store all the values. 
     */
    private $_data;

    /**
     * Creates a new Location. 
     */
    function __construct() {
        $this->_data = [];
    }

    /**
     * Gets the ip field. 
     */
    public function getIp() {
        if (array_key_exists('ai.location.ip', $this->_data)) {
            return $this->_data['ai.location.ip'];
        }
        return null;
    }

    /**
     * Sets the ip field. 
     */
    public function setIp($ip) {
        $this->_data['ai.location.ip'] = $ip;
    }

    /**
     * Overrides JSON serialization for this class. 
     */
    public function jsonSerialize() {
        return Utils::removeEmptyValues($this->_data);
    }

}
