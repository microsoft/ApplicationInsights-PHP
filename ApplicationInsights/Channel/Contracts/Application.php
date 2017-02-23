<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Application.
*/
class Application
{
    use Json_Serializer;

    /**
    * Data array that will store all the values.
    */
    private $_data;

    /**
    * Creates a new Application.
    */
    function __construct()
    {
        $this->_data = array();
    }

    /**
    * Gets the ver field.
    */
    public function getVer()
    {
        if (array_key_exists('ai.application.ver', $this->_data)) { return $this->_data['ai.application.ver']; }
        return NULL;
    }

    /**
    * Sets the ver field.
    */
    public function setVer($ver)
    {
        $this->_data['ai.application.ver'] = $ver;
    }
}
