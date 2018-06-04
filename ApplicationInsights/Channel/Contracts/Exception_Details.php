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
* Data contract class for type Exception_Details. Exception details of the exception in a chain. 
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
    * Gets the id field. In case exception is nested (outer exception contains inner one), the id and outerId properties are used to represent the nesting. 
    */
    public function getId()
    {
        if (array_key_exists('id', $this->_data)) { return $this->_data['id']; }
        return NULL;
    }

    /**
    * Sets the id field. In case exception is nested (outer exception contains inner one), the id and outerId properties are used to represent the nesting. 
    */
    public function setId($id)
    {
        $this->_data['id'] = $id;
    }

    /**
    * Gets the outerId field. The value of outerId is a reference to an element in ExceptionDetails that represents the outer exception 
    */
    public function getOuterId()
    {
        if (array_key_exists('outerId', $this->_data)) { return $this->_data['outerId']; }
        return NULL;
    }

    /**
    * Sets the outerId field. The value of outerId is a reference to an element in ExceptionDetails that represents the outer exception 
    */
    public function setOuterId($outerId)
    {
        $this->_data['outerId'] = $outerId;
    }

    /**
    * Gets the typeName field. Exception type name. 
    */
    public function getTypeName()
    {
        if (array_key_exists('typeName', $this->_data)) { return $this->_data['typeName']; }
        return NULL;
    }

    /**
    * Sets the typeName field. Exception type name. 
    */
    public function setTypeName($typeName)
    {
        $this->_data['typeName'] = $typeName;
    }

    /**
    * Gets the message field. Exception message. 
    */
    public function getMessage()
    {
        if (array_key_exists('message', $this->_data)) { return $this->_data['message']; }
        return NULL;
    }

    /**
    * Sets the message field. Exception message. 
    */
    public function setMessage($message)
    {
        $this->_data['message'] = $message;
    }

    /**
    * Gets the hasFullStack field. Indicates if full exception stack is provided in the exception. The stack may be trimmed, such as in the case of a StackOverflow exception. 
    */
    public function getHasFullStack()
    {
        if (array_key_exists('hasFullStack', $this->_data)) { return $this->_data['hasFullStack']; }
        return NULL;
    }

    /**
    * Sets the hasFullStack field. Indicates if full exception stack is provided in the exception. The stack may be trimmed, such as in the case of a StackOverflow exception. 
    */
    public function setHasFullStack($hasFullStack)
    {
        $this->_data['hasFullStack'] = $hasFullStack;
    }

    /**
    * Gets the stack field. Text describing the stack. Either stack or parsedStack should have a value. 
    */
    public function getStack()
    {
        if (array_key_exists('stack', $this->_data)) { return $this->_data['stack']; }
        return NULL;
    }

    /**
    * Sets the stack field. Text describing the stack. Either stack or parsedStack should have a value. 
    */
    public function setStack($stack)
    {
        $this->_data['stack'] = $stack;
    }

    /**
    * Gets the parsedStack field. List of stack frames. Either stack or parsedStack should have a value. 
    */
    public function getParsedStack()
    {
        if (array_key_exists('parsedStack', $this->_data)) { return $this->_data['parsedStack']; }
        return NULL;
    }

    /**
    * Sets the parsedStack field. List of stack frames. Either stack or parsedStack should have a value. 
    */
    public function setParsedStack($parsedStack)
    {
        $this->_data['parsedStack'] = $parsedStack;
    }
}
