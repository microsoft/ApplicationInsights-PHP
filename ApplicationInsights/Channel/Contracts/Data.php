<?php

namespace ApplicationInsights\Channel\Contracts;

/**
 * Data contract class for type Data. 
 */
class Data implements \JsonSerializable {

    /**
     * Data array that will store all the values. 
     */
    private $_data;

    /**
     * Creates a new Data. 
     */
    function __construct() {
        $this->_data['baseData'] = NULL;
    }

    /**
     * Gets the baseType field. 
     */
    public function getBaseType() {
        if (array_key_exists('baseType', $this->_data)) {
            return $this->_data['baseType'];
        }
        return null;
    }

    /**
     * Sets the baseType field. 
     */
    public function setBaseType($baseType) {
        $this->_data['baseType'] = $baseType;
    }

    /**
     * Gets the baseData field. 
     */
    public function getBaseData() {
        if (array_key_exists('baseData', $this->_data)) {
            return $this->_data['baseData'];
        }
        return null;
    }

    /**
     * Sets the baseData field. 
     */
    public function setBaseData($baseData) {
        $this->_data['baseData'] = $baseData;
    }

    /**
     * Overrides JSON serialization for this class. 
     */
    public function jsonSerialize() {
        return Utils::removeEmptyValues($this->_data);
    }

}
