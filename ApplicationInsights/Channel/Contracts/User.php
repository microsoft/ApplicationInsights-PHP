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
    public function setAuthUserId($authUserId)
    {
        $this->_data['ai.user.authUserId'] = $authUserId;
    }
}
