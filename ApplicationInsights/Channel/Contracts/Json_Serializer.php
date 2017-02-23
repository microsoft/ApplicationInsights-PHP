<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Application.
*/
trait Json_Serializer
{
    /**
    * Implements JSON serialization for a class.
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
