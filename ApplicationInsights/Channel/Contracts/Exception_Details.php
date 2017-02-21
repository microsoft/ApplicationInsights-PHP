<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Exception_Details.
*/
class Exception_Details
{
    use Json_Serializer;

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
        if (array_key_exists('id', $this->_data)) { return $this->_data['id']; }
        return NULL;
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
        if (array_key_exists('outerId', $this->_data)) { return $this->_data['outerId']; }
        return NULL;
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
        if (array_key_exists('typeName', $this->_data)) { return $this->_data['typeName']; }
        return NULL;
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
        if (array_key_exists('message', $this->_data)) { return $this->_data['message']; }
        return NULL;
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
        if (array_key_exists('hasFullStack', $this->_data)) { return $this->_data['hasFullStack']; }
        return NULL;
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
        if (array_key_exists('stack', $this->_data)) { return $this->_data['stack']; }
        return NULL;
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
        if (array_key_exists('parsedStack', $this->_data)) { return $this->_data['parsedStack']; }
        return NULL;
    }

    /**
    * Sets the parsedStack field.
    */
    public function setParsedStack($parsedStack)
    {
        $this->_data['parsedStack'] = $parsedStack;
    }
}
