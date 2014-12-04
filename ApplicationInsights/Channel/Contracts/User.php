<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type User. 
*/
class User implements \JsonSerializable 
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new User. 
    */
    function __construct()
    {
        $this->_data = [];
    }

    /**
    * Gets the accountAcquisitionDate field. 
    */
    public function get_account_acquisition_date()
    {
        if (array_key_exists('ai.user.accountAcquisitionDate', $this->_data)) { return $this->_data['ai.user.accountAcquisitionDate']; }
        return NULL;
    }

    /**
    * Sets the accountAcquisitionDate field. 
    */
    public function set_account_acquisition_date($account_acquisition_date)
    {
        $this->_data['ai.user.accountAcquisitionDate'] = $account_acquisition_date;
    }

    /**
    * Gets the accountId field. 
    */
    public function get_account_id()
    {
        if (array_key_exists('ai.user.accountId', $this->_data)) { return $this->_data['ai.user.accountId']; }
        return NULL;
    }

    /**
    * Sets the accountId field. 
    */
    public function set_account_id($account_id)
    {
        $this->_data['ai.user.accountId'] = $account_id;
    }

    /**
    * Gets the userAgent field. 
    */
    public function get_user_agent()
    {
        if (array_key_exists('ai.user.userAgent', $this->_data)) { return $this->_data['ai.user.userAgent']; }
        return NULL;
    }

    /**
    * Sets the userAgent field. 
    */
    public function set_user_agent($user_agent)
    {
        $this->_data['ai.user.userAgent'] = $user_agent;
    }

    /**
    * Gets the id field. 
    */
    public function get_id()
    {
        if (array_key_exists('ai.user.id', $this->_data)) { return $this->_data['ai.user.id']; }
        return NULL;
    }

    /**
    * Sets the id field. 
    */
    public function set_id($id)
    {
        $this->_data['ai.user.id'] = $id;
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
