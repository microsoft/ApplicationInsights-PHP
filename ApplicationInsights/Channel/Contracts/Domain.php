<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Domain. 
*/
class Domain extends Base_Data implements Data_Interface
{

    /**
    * Creates a new Domain. 
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.Do';
        $this->_dataTypeName = 'Domain';
        $this->_data = array();
    }
}
