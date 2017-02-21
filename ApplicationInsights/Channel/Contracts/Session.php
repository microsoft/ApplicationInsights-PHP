<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Session.
*/
class Session
{
    use Json_Serializer;

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
        if (array_key_exists('ai.session.id', $this->_data)) { return $this->_data['ai.session.id']; }
        return NULL;
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
        if (array_key_exists('ai.session.isFirst', $this->_data)) { return $this->_data['ai.session.isFirst']; }
        return NULL;
    }

    /**
    * Sets the isFirst field.
    */
    public function setIsFirst($isFirst)
    {
        $this->_data['ai.session.isFirst'] = var_export($isFirst, true);
    }

    /**
    * Gets the isNew field.
    */
    public function getIsNew()
    {
        if (array_key_exists('ai.session.isNew', $this->_data)) { return $this->_data['ai.session.isNew']; }
        return NULL;
    }

    /**
    * Sets the isNew field.
    */
    public function setIsNew($isNew)
    {
        $this->_data['ai.session.isNew'] = var_export($isNew, true);;
    }
}
