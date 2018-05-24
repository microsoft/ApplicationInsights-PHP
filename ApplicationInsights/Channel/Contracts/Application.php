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
}
