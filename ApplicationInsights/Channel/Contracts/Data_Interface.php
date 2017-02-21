<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Interface class for XXXXX_Data.
*/
interface Data_Interface
{
    /**
    * Gets the envelopeTypeName field.
    */
    public function getEnvelopeTypeName();

    /**
    * Gets the dataTypeName field.
    */
    public function getDataTypeName();

    /**
    * Gets the ver field.
    */
    public function getVer();

    /**
    * Sets the ver field.
    */
    public function setVer($ver);

    /**
    * Gets the properties field.
    */
    public function getProperties();

    /**
    * Sets the properties field.
    */
    public function setProperties($properties);

    /**
    * JSON serialization for this class.
    */
    public function jsonSerialize();
}
