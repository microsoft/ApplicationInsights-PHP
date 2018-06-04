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
* Data contract class for type Operation.  
*/
class Operation
{
    use Json_Serializer;

    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new Operation. 
    */
    function __construct()
    {
        $this->_data = array();
    }

    /**
    * Gets the id field. A unique identifier for the operation instance. The operation.id is created by either a request or a page view. All other telemetry sets this to the value for the containing request or page view. Operation.id is used for finding all the telemetry items for a specific operation instance. 
    */
    public function getId()
    {
        if (array_key_exists('ai.operation.id', $this->_data)) { return $this->_data['ai.operation.id']; }
        return NULL;
    }

    /**
    * Sets the id field. A unique identifier for the operation instance. The operation.id is created by either a request or a page view. All other telemetry sets this to the value for the containing request or page view. Operation.id is used for finding all the telemetry items for a specific operation instance. 
    */
    public function setId($id)
    {
        $this->_data['ai.operation.id'] = $id;
    }

    /**
    * Gets the name field. The name (group) of the operation. The operation.name is created by either a request or a page view. All other telemetry items set this to the value for the containing request or page view. Operation.name is used for finding all the telemetry items for a group of operations (i.e. 'GET Home/Index'). 
    */
    public function getName()
    {
        if (array_key_exists('ai.operation.name', $this->_data)) { return $this->_data['ai.operation.name']; }
        return NULL;
    }

    /**
    * Sets the name field. The name (group) of the operation. The operation.name is created by either a request or a page view. All other telemetry items set this to the value for the containing request or page view. Operation.name is used for finding all the telemetry items for a group of operations (i.e. 'GET Home/Index'). 
    */
    public function setName($name)
    {
        $this->_data['ai.operation.name'] = $name;
    }

    /**
    * Gets the parentId field. The unique identifier of the telemetry item's immediate parent. 
    */
    public function getParentId()
    {
        if (array_key_exists('ai.operation.parentId', $this->_data)) { return $this->_data['ai.operation.parentId']; }
        return NULL;
    }

    /**
    * Sets the parentId field. The unique identifier of the telemetry item's immediate parent. 
    */
    public function setParentId($parentId)
    {
        $this->_data['ai.operation.parentId'] = $parentId;
    }

    /**
    * Gets the syntheticSource field. Name of synthetic source. Some telemetry from the application may represent a synthetic traffic. It may be web crawler indexing the web site, site availability tests or traces from diagnostic libraries like Application Insights SDK itself. 
    */
    public function getSyntheticSource()
    {
        if (array_key_exists('ai.operation.syntheticSource', $this->_data)) { return $this->_data['ai.operation.syntheticSource']; }
        return NULL;
    }

    /**
    * Sets the syntheticSource field. Name of synthetic source. Some telemetry from the application may represent a synthetic traffic. It may be web crawler indexing the web site, site availability tests or traces from diagnostic libraries like Application Insights SDK itself. 
    */
    public function setSyntheticSource($syntheticSource)
    {
        $this->_data['ai.operation.syntheticSource'] = $syntheticSource;
    }

    /**
    * Gets the correlationVector field. The correlation vector is a light weight vector clock which can be used to identify and order related events across clients and services. 
    */
    public function getCorrelationVector()
    {
        if (array_key_exists('ai.operation.correlationVector', $this->_data)) { return $this->_data['ai.operation.correlationVector']; }
        return NULL;
    }

    /**
    * Sets the correlationVector field. The correlation vector is a light weight vector clock which can be used to identify and order related events across clients and services. 
    */
    public function setCorrelationVector($correlationVector)
    {
        $this->_data['ai.operation.correlationVector'] = $correlationVector;
    }
}
