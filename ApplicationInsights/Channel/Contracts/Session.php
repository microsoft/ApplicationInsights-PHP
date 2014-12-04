<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Session. 
*/
class Session implements \JsonSerializable 
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new Session. 
    */
    function __construct()
    {
        $this->_data = [];
    }

    /**
    * Gets the id field. 
    */
    public function get_id()
    {
        if (array_key_exists('ai.session.id', $this->_data)) { return $this->_data['ai.session.id']; }
        return NULL;
    }

    /**
    * Sets the id field. 
    */
    public function set_id($id)
    {
        $this->_data['ai.session.id'] = $id;
    }

    /**
    * Gets the isFirst field. 
    */
    public function get_is_first()
    {
        if (array_key_exists('ai.session.isFirst', $this->_data)) { return $this->_data['ai.session.isFirst']; }
        return NULL;
    }

    /**
    * Sets the isFirst field. 
    */
    public function set_is_first($is_first)
    {
        $this->_data['ai.session.isFirst'] = $is_first;
    }

    /**
    * Gets the isNew field. 
    */
    public function get_is_new()
    {
        if (array_key_exists('ai.session.isNew', $this->_data)) { return $this->_data['ai.session.isNew']; }
        return NULL;
    }

    /**
    * Sets the isNew field. 
    */
    public function set_is_new($is_new)
    {
        $this->_data['ai.session.isNew'] = $is_new;
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
