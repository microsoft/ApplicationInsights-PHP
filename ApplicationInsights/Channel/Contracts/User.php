<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type User.
*/
class User
{
    use Json_Serializer;

    /**
    * Data array that will store all the values.
    */
    private $_data;

    /**
    * Creates a new User.
    */
    function __construct()
    {
        $this->_data = array();
    }

    /**
    * Gets the accountAcquisitionDate field.
    */
    public function getAccountAcquisitionDate()
    {
        if (array_key_exists('ai.user.accountAcquisitionDate', $this->_data)) { return $this->_data['ai.user.accountAcquisitionDate']; }
        return NULL;
    }

    /**
    * Sets the accountAcquisitionDate field.
    */
    public function setAccountAcquisitionDate($accountAcquisitionDate)
    {
        $this->_data['ai.user.accountAcquisitionDate'] = $accountAcquisitionDate;
    }

    /**
    * Gets the accountId field.
    */
    public function getAccountId()
    {
        if (array_key_exists('ai.user.accountId', $this->_data)) { return $this->_data['ai.user.accountId']; }
        return NULL;
    }

    /**
    * Sets the accountId field.
    */
    public function setAccountId($accountId)
    {
        $this->_data['ai.user.accountId'] = $accountId;
    }

    /**
    * Gets the userAgent field.
    */
    public function getUserAgent()
    {
        if (array_key_exists('ai.user.userAgent', $this->_data)) { return $this->_data['ai.user.userAgent']; }
        return NULL;
    }

    /**
    * Sets the userAgent field.
    */
    public function setUserAgent($userAgent)
    {
        $this->_data['ai.user.userAgent'] = $userAgent;
    }

    /**
    * Gets the id field.
    */
    public function getId()
    {
        if (array_key_exists('ai.user.id', $this->_data)) { return $this->_data['ai.user.id']; }
        return NULL;
    }

    /**
    * Sets the id field.
    */
    public function setId($id)
    {
        $this->_data['ai.user.id'] = $id;
    }
    
    /**
    * Gets the authUserId field.
    */
    public function getAuthUserId()
    {
        if (array_key_exists('ai.user.authUserId', $this->_data)) { return $this->_data['ai.user.authUserId']; }
        return NULL;
    }

    /**
    * Sets the authUserId field.
    */
    public function setAuthUserId($id)
    {
        $this->_data['ai.user.authUserId'] = $id;
    }
}
