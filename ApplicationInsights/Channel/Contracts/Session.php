<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Session. 
*/
class Session
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
        $this->_data = array();
    }

    /**
    * Gets the id field. 
    */
    public function getId()
    {
        return array_key_exists('ai.session.id', $this->_data) ? $this->_data['ai.session.id'] : null;
    }

    /**
    * Sets the id field. 
    */
    public function setId($id)
    {
        $this->_data['ai.session.id'] = $id;
    }

    /**
    * Gets the isFirst field. 
    */
    public function getIsFirst()
    {
        return array_key_exists('ai.session.isFirst', $this->_data) ? $this->_data['ai.session.isFirst'] : null;
    }

    /**
    * Sets the isFirst field. 
    */
    public function setIsFirst($isFirst)
    {
        $this->_data['ai.session.isFirst'] = $isFirst;
    }

    /**
    * Gets the isNew field. 
    */
    public function getIsNew()
    {
        return array_key_exists('ai.session.isNew', $this->_data) ? $this->_data['ai.session.isNew'] : null;
    }

    /**
    * Sets the isNew field. 
    */
    public function setIsNew($isNew)
    {
        $this->_data['ai.session.isNew'] = $isNew;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
