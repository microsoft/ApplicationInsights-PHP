<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Stack_Frame.
*/
class Stack_Frame
{
    use Json_Serializer;

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
        if (array_key_exists('level', $this->_data)) { return $this->_data['level']; }
        return NULL;
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
        if (array_key_exists('method', $this->_data)) { return $this->_data['method']; }
        return NULL;
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
        if (array_key_exists('assembly', $this->_data)) { return $this->_data['assembly']; }
        return NULL;
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
        if (array_key_exists('fileName', $this->_data)) { return $this->_data['fileName']; }
        return NULL;
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
        if (array_key_exists('line', $this->_data)) { return $this->_data['line']; }
        return NULL;
    }

    /**
    * Sets the line field.
    */
    public function setLine($line)
    {
        $this->_data['line'] = $line;
    }
}
