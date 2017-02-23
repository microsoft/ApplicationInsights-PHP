<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Event_Data.
*/
class Event_Data extends Base_Data implements Data_Interface
{
    /**
    * Creates a new EventData.
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.Event';
        $this->_dataTypeName = 'EventData';
        $this->_data['ver'] = 2;
        $this->_data['name'] = NULL;
    }

    /**
    * Gets the name field.
    */
    public function getName()
    {
        if (array_key_exists('name', $this->_data)) { return $this->_data['name']; }
        return NULL;
    }

    /**
    * Sets the name field.
    */
    public function setName($name)
    {
        $this->_data['name'] = $name;
    }

    /**
    * Gets the measurements field.
    */
    public function getMeasurements()
    {
        if (array_key_exists('measurements', $this->_data)) { return $this->_data['measurements']; }
        return NULL;
    }

    /**
    * Sets the measurements field.
    */
    public function setMeasurements($measurements)
    {
        $this->_data['measurements'] = $measurements;
    }
}
