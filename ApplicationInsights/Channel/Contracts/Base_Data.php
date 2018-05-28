<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Event_Data.
*/
abstract class Base_Data implements Data_Interface
{
    use Json_Serializer;
    use Version_Manager;

    /**
    * Override for the time of the event
    */
    protected $_time;
    
    /**
    * Data array that will store all the values.
    */
    protected $_data;

    /**
    * Needed to properly construct the JSON envelope.
    */
    protected $_envelopeTypeName;

    /**
    * Needed to properly construct the JSON envelope.
    */
    protected $_dataTypeName;

    /**
    * Gets the envelopeTypeName field.
    */
    public function getEnvelopeTypeName()
    {
        return $this->_envelopeTypeName;
    }

    /**
    * Gets the dataTypeName field.
    */
    public function getDataTypeName()
    {
        return $this->_dataTypeName;
    }

    /**
    * Gets the time of the event.
    */
    public function getTime()
    {
        return $this->_time;
    }

    /**
    * Sets the time of the event.
    */
    public function setTime($time)
    {
        $this->_time = $time;
    }
}
