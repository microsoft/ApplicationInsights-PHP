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
    * Gets the role field. 
    */
    public function getRole()
    {
        if (array_key_exists('ai.cloud.role', $this->_data)) { return $this->_data['ai.cloud.role']; }
        return NULL;
    }

    /**
    * Sets the role field. 
    */
    public function setRole($role)
    {
        $this->_data['ai.cloud.role'] = $role;
    }

    /**
    * Gets the roleInstance field. 
    */
    public function getRoleInstance()
    {
        if (array_key_exists('ai.cloud.roleInstance', $this->_data)) { return $this->_data['ai.cloud.roleInstance']; }
        return NULL;
    }

    /**
    * Sets the roleInstance field. 
    */
    public function setRoleInstance($roleInstance)
    {
        $this->_data['ai.cloud.roleInstance'] = $roleInstance;
    }
}
