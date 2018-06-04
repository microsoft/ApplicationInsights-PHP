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
* Data contract class for type Cloud.  
*/
class Cloud
{
    use Json_Serializer;

    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new Cloud. 
    */
    function __construct()
    {
        $this->_data = array();
    }

    /**
    * Gets the role field. Name of the role the application is a part of. Maps directly to the role name in azure. 
    */
    public function getRole()
    {
        if (array_key_exists('ai.cloud.role', $this->_data)) { return $this->_data['ai.cloud.role']; }
        return NULL;
    }

    /**
    * Sets the role field. Name of the role the application is a part of. Maps directly to the role name in azure. 
    */
    public function setRole($role)
    {
        $this->_data['ai.cloud.role'] = $role;
    }

    /**
    * Gets the roleInstance field. Name of the instance where the application is running. Computer name for on-premisis, instance name for Azure. 
    */
    public function getRoleInstance()
    {
        if (array_key_exists('ai.cloud.roleInstance', $this->_data)) { return $this->_data['ai.cloud.roleInstance']; }
        return NULL;
    }

    /**
    * Sets the roleInstance field. Name of the instance where the application is running. Computer name for on-premisis, instance name for Azure. 
    */
    public function setRoleInstance($roleInstance)
    {
        $this->_data['ai.cloud.roleInstance'] = $roleInstance;
    }
}
