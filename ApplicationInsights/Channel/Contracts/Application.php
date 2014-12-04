<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Application. 
*/
class Application implements \JsonSerializable 
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new Application. 
    */
    function __construct()
    {
        $this->_data = [];
    }

    /**
    * Gets the ver field. 
    */
    public function get_ver()
    {
        if (array_key_exists('ai.application.ver', $this->_data)) { return $this->_data['ai.application.ver']; }
        return NULL;
    }

    /**
    * Sets the ver field. 
    */
    public function set_ver($ver)
    {
        $this->_data['ai.application.ver'] = $ver;
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
