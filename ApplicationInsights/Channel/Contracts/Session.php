/**
*  
*  
* THIS FILE IS AUTO-GENERATED.  
* Please do not edit manually. 
*  
* Use script at <root>/Schema/generateSchema.ps1 
*  
*/
<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Session. 
*/
class Session
{
    use Json_Serializer;

    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new Session. 
    */
    function __construct()
    {
        $this->_data = array();
    }

    /**
    * Gets the id field. 
    */
    public function getId()
    {
        if (array_key_exists('ai.session.id', $this->_data)) { return $this->_data['ai.session.id']; }
        return NULL;
    }

    /**
    * Sets the id field. 
    */
    public function setId($id)
    {
        $this->_data['ai.session.id'] = $id;
    }

    /**
    * Gets the isFirst field. 
    */
    public function getIsFirst()
    {
        if (array_key_exists('ai.session.isFirst', $this->_data)) { return $this->_data['ai.session.isFirst']; }
        return NULL;
    }

    /**
    * Sets the isFirst field. 
    */
    public function setIsFirst($isFirst)
    {
        $this->_data['ai.session.isFirst'] = $isFirst;
    }
}
