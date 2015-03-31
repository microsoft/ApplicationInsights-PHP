<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Stack_Frame. 
*/
class Stack_Frame
{
    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new StackFrame. 
    */
    function __construct()
    {
        $this->_data['level'] = NULL;
        $this->_data['method'] = NULL;
    }

    /**
    * Gets the level field. 
    */
    public function getLevel()
    {
        return array_key_exists('level', $this->_data) ? $this->_data['level'] : null;
    }

    /**
    * Sets the level field. 
    */
    public function setLevel($level)
    {
        $this->_data['level'] = $level;
    }

    /**
    * Gets the method field. 
    */
    public function getMethod()
    {
        return array_key_exists('method', $this->_data) ? $this->_data['method'] : null;
    }

    /**
    * Sets the method field. 
    */
    public function setMethod($method)
    {
        $this->_data['method'] = $method;
    }

    /**
    * Gets the assembly field. 
    */
    public function getAssembly()
    {
        return array_key_exists('assembly', $this->_data) ? $this->_data['assembly'] : null;
    }

    /**
    * Sets the assembly field. 
    */
    public function setAssembly($assembly)
    {
        $this->_data['assembly'] = $assembly;
    }

    /**
    * Gets the fileName field. 
    */
    public function getFileName()
    {
        return array_key_exists('fileName', $this->_data) ? $this->_data['fileName'] : null;
    }

    /**
    * Sets the fileName field. 
    */
    public function setFileName($fileName)
    {
        $this->_data['fileName'] = $fileName;
    }

    /**
    * Gets the line field. 
    */
    public function getLine()
    {
        return array_key_exists('line', $this->_data) ? $this->_data['line'] : null;
    }

    /**
    * Sets the line field. 
    */
    public function setLine($line)
    {
        $this->_data['line'] = $line;
    }

    /**
    * Overrides JSON serialization for this class. 
    */
    public function jsonSerialize()
    {
        return Utils::removeEmptyValues($this->_data);
    }
}
