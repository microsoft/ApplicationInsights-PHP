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
* Data contract class for type Stack_Frame. Stack frame information. 
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
    * Gets the level field. Level in the call stack. For the long stacks SDK may not report every function in a call stack. 
    */
    public function getLevel()
    {
        if (array_key_exists('level', $this->_data)) { return $this->_data['level']; }
        return NULL;
    }

    /**
    * Sets the level field. Level in the call stack. For the long stacks SDK may not report every function in a call stack. 
    */
    public function setLevel($level)
    {
        $this->_data['level'] = $level;
    }

    /**
    * Gets the method field. Method name. 
    */
    public function getMethod()
    {
        if (array_key_exists('method', $this->_data)) { return $this->_data['method']; }
        return NULL;
    }

    /**
    * Sets the method field. Method name. 
    */
    public function setMethod($method)
    {
        $this->_data['method'] = $method;
    }

    /**
    * Gets the assembly field. Name of the assembly (dll, jar, etc.) containing this function. 
    */
    public function getAssembly()
    {
        if (array_key_exists('assembly', $this->_data)) { return $this->_data['assembly']; }
        return NULL;
    }

    /**
    * Sets the assembly field. Name of the assembly (dll, jar, etc.) containing this function. 
    */
    public function setAssembly($assembly)
    {
        $this->_data['assembly'] = $assembly;
    }

    /**
    * Gets the fileName field. File name or URL of the method implementation. 
    */
    public function getFileName()
    {
        if (array_key_exists('fileName', $this->_data)) { return $this->_data['fileName']; }
        return NULL;
    }

    /**
    * Sets the fileName field. File name or URL of the method implementation. 
    */
    public function setFileName($fileName)
    {
        $this->_data['fileName'] = $fileName;
    }

    /**
    * Gets the line field. Line number of the code implementation. 
    */
    public function getLine()
    {
        if (array_key_exists('line', $this->_data)) { return $this->_data['line']; }
        return NULL;
    }

    /**
    * Sets the line field. Line number of the code implementation. 
    */
    public function setLine($line)
    {
        $this->_data['line'] = $line;
    }
}
