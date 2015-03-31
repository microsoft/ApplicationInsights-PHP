<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Exception_Details. 
*/
class Exception_Details
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new ExceptionDetails. 
    */
    function __construct()
    {
        $this->_data['typeName'] = NULL;
        $this->_data['message'] = NULL;
        $this->_data['hasFullStack'] = true;
    }

    /**
    * Gets the id field. 
    */
    public function getId()
    {
        return array_key_exists('id', $this->_data) ? $this->_data['id'] : null;
    }

    /**
    * Sets the id field. 
    */
    public function setId($id)
    {
        $this->_data['id'] = $id;
    }

    /**
    * Gets the outerId field. 
    */
    public function getOuterId()
    {
        return array_key_exists('outerId', $this->_data) ? $this->_data['outerId'] : null;
    }

    /**
    * Sets the outerId field. 
    */
    public function setOuterId($outerId)
    {
        $this->_data['outerId'] = $outerId;
    }

    /**
    * Gets the typeName field. 
    */
    public function getTypeName()
    {
        return array_key_exists('typeName', $this->_data) ? $this->_data['typeName'] : null;
    }

    /**
    * Sets the typeName field. 
    */
    public function setTypeName($typeName)
    {
        $this->_data['typeName'] = $typeName;
    }

    /**
    * Gets the message field. 
    */
    public function getMessage()
    {
        return array_key_exists('message', $this->_data) ? $this->_data['message'] : null;
    }

    /**
    * Sets the message field. 
    */
    public function setMessage($message)
    {
        $this->_data['message'] = $message;
    }

    /**
    * Gets the hasFullStack field. 
    */
    public function getHasFullStack()
    {
        return array_key_exists('hasFullStack', $this->_data) ? $this->_data['hasFullStack'] : null;
    }

    /**
    * Sets the hasFullStack field. 
    */
    public function setHasFullStack($hasFullStack)
    {
        $this->_data['hasFullStack'] = $hasFullStack;
    }

    /**
    * Gets the stack field. 
    */
    public function getStack()
    {
        return array_key_exists('stack', $this->_data) ? $this->_data['stack'] : null;
    }

    /**
    * Sets the stack field. 
    */
    public function setStack($stack)
    {
        $this->_data['stack'] = $stack;
    }

    /**
    * Gets the parsedStack field. 
    */
    public function getParsedStack()
    {
        return array_key_exists('parsedStack', $this->_data) ? $this->_data['parsedStack'] : null;
    }

    /**
    * Sets the parsedStack field. 
    */
    public function setParsedStack($parsedStack)
    {
        $this->_data['parsedStack'] = $parsedStack;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
