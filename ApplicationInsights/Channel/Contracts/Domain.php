<?php
namespace ApplicationInsights\Channel\Contracts;
/**
*  
* THIS FILE IS AUTO-GENERATED.  
* Please do not edit manually. 
*  
* Use script at <root>/Schema/generateSchema.ps1 
*  
*/

/**
* Data contract class for type Domain. The abstract common base of all domains. 
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
