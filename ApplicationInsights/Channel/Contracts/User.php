<?php

namespace ApplicationInsights\Channel\Contracts;

/**
 * Data contract class for type User. 
 */
class User implements \JsonSerializable {

    /**
     * Data array that will store all the values. 
     */
    private $_data;

    /**
     * Creates a new User. 
     */
    function __construct() {
        $this->_data = [];
    }

    /**
     * Gets the accountAcquisitionDate field. 
     */
    public function getAccountAcquisitionDate() {
        if (array_key_exists('ai.user.accountAcquisitionDate', $this->_data)) {
            return $this->_data['ai.user.accountAcquisitionDate'];
        }
        return null;
    }

    /**
     * Sets the accountAcquisitionDate field. 
     */
    public function setAccountAcquisitionDate($accountAcquisitionDate) {
        $this->_data['ai.user.accountAcquisitionDate'] = $accountAcquisitionDate;
    }

    /**
     * Gets the accountId field. 
     */
    public function getAccountId() {
        if (array_key_exists('ai.user.accountId', $this->_data)) {
            return $this->_data['ai.user.accountId'];
        }
        return null;
    }

    /**
     * Sets the accountId field. 
     */
    public function setAccountId($accountId) {
        $this->_data['ai.user.accountId'] = $accountId;
    }

    /**
     * Gets the userAgent field. 
     */
    public function getUserAgent() {
        if (array_key_exists('ai.user.userAgent', $this->_data)) {
            return $this->_data['ai.user.userAgent'];
        }
        return null;
    }

    /**
     * Sets the userAgent field. 
     */
    public function setUserAgent($userAgent) {
        $this->_data['ai.user.userAgent'] = $userAgent;
    }

    /**
     * Gets the id field. 
     */
    public function getId() {
        if (array_key_exists('ai.user.id', $this->_data)) {
            return $this->_data['ai.user.id'];
        }
        return null;
    }

    /**
     * Sets the id field. 
     */
    public function setId($id) {
        $this->_data['ai.user.id'] = $id;
    }

    /**
     * Overrides JSON serialization for this class. 
     */
    public function jsonSerialize() {
        return Utils::removeEmptyValues($this->_data);
    }

}
