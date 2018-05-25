/**
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
* Data contract class for type Context_Tag_Keys.  
*/
class Context_Tag_Keys
{
    use Json_Serializer;

    /**
    * Data array that will store all the values. 
    */
    private $_data;

    /**
    * Creates a new ContextTagKeys. 
    */
    function __construct()
    {
        $this->_data['ApplicationVersion'] = "ai.application.ver";
        $this->_data['DeviceId'] = "ai.device.id";
        $this->_data['DeviceLocale'] = "ai.device.locale";
        $this->_data['DeviceModel'] = "ai.device.model";
        $this->_data['DeviceOEMName'] = "ai.device.oemName";
        $this->_data['DeviceOSVersion'] = "ai.device.osVersion";
        $this->_data['DeviceType'] = "ai.device.type";
        $this->_data['LocationIp'] = "ai.location.ip";
        $this->_data['OperationId'] = "ai.operation.id";
        $this->_data['OperationName'] = "ai.operation.name";
        $this->_data['OperationParentId'] = "ai.operation.parentId";
        $this->_data['OperationSyntheticSource'] = "ai.operation.syntheticSource";
        $this->_data['OperationCorrelationVector'] = "ai.operation.correlationVector";
        $this->_data['SessionId'] = "ai.session.id";
        $this->_data['SessionIsFirst'] = "ai.session.isFirst";
        $this->_data['UserAccountId'] = "ai.user.accountId";
        $this->_data['UserId'] = "ai.user.id";
        $this->_data['UserAuthUserId'] = "ai.user.authUserId";
        $this->_data['CloudRole'] = "ai.cloud.role";
        $this->_data['CloudRoleInstance'] = "ai.cloud.roleInstance";
        $this->_data['InternalSdkVersion'] = "ai.internal.sdkVersion";
        $this->_data['InternalAgentVersion'] = "ai.internal.agentVersion";
        $this->_data['InternalNodeName'] = "ai.internal.nodeName";
    }

    /**
    * Gets the ApplicationVersion field. Application version. Information in the application context fields is always about the application that is sending the telemetry. 
    */
    public function getApplicationVersion()
    {
        if (array_key_exists('ApplicationVersion', $this->_data)) { return $this->_data['ApplicationVersion']; }
        return NULL;
    }

    /**
    * Sets the ApplicationVersion field. Application version. Information in the application context fields is always about the application that is sending the telemetry. 
    */
    public function setApplicationVersion($applicationVersion)
    {
        $this->_data['ApplicationVersion'] = $applicationVersion;
    }

    /**
    * Gets the DeviceId field. Unique client device id. Computer name in most cases. 
    */
    public function getDeviceId()
    {
        if (array_key_exists('DeviceId', $this->_data)) { return $this->_data['DeviceId']; }
        return NULL;
    }

    /**
    * Sets the DeviceId field. Unique client device id. Computer name in most cases. 
    */
    public function setDeviceId($deviceId)
    {
        $this->_data['DeviceId'] = $deviceId;
    }

    /**
    * Gets the DeviceLocale field. Device locale using <language>-<REGION> pattern, following RFC 5646. Example 'en-US'. 
    */
    public function getDeviceLocale()
    {
        if (array_key_exists('DeviceLocale', $this->_data)) { return $this->_data['DeviceLocale']; }
        return NULL;
    }

    /**
    * Sets the DeviceLocale field. Device locale using <language>-<REGION> pattern, following RFC 5646. Example 'en-US'. 
    */
    public function setDeviceLocale($deviceLocale)
    {
        $this->_data['DeviceLocale'] = $deviceLocale;
    }

    /**
    * Gets the DeviceModel field. Model of the device the end user of the application is using. Used for client scenarios. If this field is empty then it is derived from the user agent. 
    */
    public function getDeviceModel()
    {
        if (array_key_exists('DeviceModel', $this->_data)) { return $this->_data['DeviceModel']; }
        return NULL;
    }

    /**
    * Sets the DeviceModel field. Model of the device the end user of the application is using. Used for client scenarios. If this field is empty then it is derived from the user agent. 
    */
    public function setDeviceModel($deviceModel)
    {
        $this->_data['DeviceModel'] = $deviceModel;
    }

    /**
    * Gets the DeviceOEMName field. Client device OEM name taken from the browser. 
    */
    public function getDeviceOEMName()
    {
        if (array_key_exists('DeviceOEMName', $this->_data)) { return $this->_data['DeviceOEMName']; }
        return NULL;
    }

    /**
    * Sets the DeviceOEMName field. Client device OEM name taken from the browser. 
    */
    public function setDeviceOEMName($deviceOEMName)
    {
        $this->_data['DeviceOEMName'] = $deviceOEMName;
    }

    /**
    * Gets the DeviceOSVersion field. Operating system name and version of the device the end user of the application is using. If this field is empty then it is derived from the user agent. Example 'Windows 10 Pro 10.0.10586.0' 
    */
    public function getDeviceOSVersion()
    {
        if (array_key_exists('DeviceOSVersion', $this->_data)) { return $this->_data['DeviceOSVersion']; }
        return NULL;
    }

    /**
    * Sets the DeviceOSVersion field. Operating system name and version of the device the end user of the application is using. If this field is empty then it is derived from the user agent. Example 'Windows 10 Pro 10.0.10586.0' 
    */
    public function setDeviceOSVersion($deviceOSVersion)
    {
        $this->_data['DeviceOSVersion'] = $deviceOSVersion;
    }

    /**
    * Gets the DeviceType field. The type of the device the end user of the application is using. Used primarily to distinguish JavaScript telemetry from server side telemetry. Examples: 'PC', 'Phone', 'Browser'. 'PC' is the default value. 
    */
    public function getDeviceType()
    {
        if (array_key_exists('DeviceType', $this->_data)) { return $this->_data['DeviceType']; }
        return NULL;
    }

    /**
    * Sets the DeviceType field. The type of the device the end user of the application is using. Used primarily to distinguish JavaScript telemetry from server side telemetry. Examples: 'PC', 'Phone', 'Browser'. 'PC' is the default value. 
    */
    public function setDeviceType($deviceType)
    {
        $this->_data['DeviceType'] = $deviceType;
    }

    /**
    * Gets the LocationIp field. The IP address of the client device. IPv4 and IPv6 are supported. Information in the location context fields is always about the end user. When telemetry is sent from a service, the location context is about the user that initiated the operation in the service. 
    */
    public function getLocationIp()
    {
        if (array_key_exists('LocationIp', $this->_data)) { return $this->_data['LocationIp']; }
        return NULL;
    }

    /**
    * Sets the LocationIp field. The IP address of the client device. IPv4 and IPv6 are supported. Information in the location context fields is always about the end user. When telemetry is sent from a service, the location context is about the user that initiated the operation in the service. 
    */
    public function setLocationIp($locationIp)
    {
        $this->_data['LocationIp'] = $locationIp;
    }

    /**
    * Gets the OperationId field. A unique identifier for the operation instance. The operation.id is created by either a request or a page view. All other telemetry sets this to the value for the containing request or page view. Operation.id is used for finding all the telemetry items for a specific operation instance. 
    */
    public function getOperationId()
    {
        if (array_key_exists('OperationId', $this->_data)) { return $this->_data['OperationId']; }
        return NULL;
    }

    /**
    * Sets the OperationId field. A unique identifier for the operation instance. The operation.id is created by either a request or a page view. All other telemetry sets this to the value for the containing request or page view. Operation.id is used for finding all the telemetry items for a specific operation instance. 
    */
    public function setOperationId($operationId)
    {
        $this->_data['OperationId'] = $operationId;
    }

    /**
    * Gets the OperationName field. The name (group) of the operation. The operation.name is created by either a request or a page view. All other telemetry items set this to the value for the containing request or page view. Operation.name is used for finding all the telemetry items for a group of operations (i.e. 'GET Home/Index'). 
    */
    public function getOperationName()
    {
        if (array_key_exists('OperationName', $this->_data)) { return $this->_data['OperationName']; }
        return NULL;
    }

    /**
    * Sets the OperationName field. The name (group) of the operation. The operation.name is created by either a request or a page view. All other telemetry items set this to the value for the containing request or page view. Operation.name is used for finding all the telemetry items for a group of operations (i.e. 'GET Home/Index'). 
    */
    public function setOperationName($operationName)
    {
        $this->_data['OperationName'] = $operationName;
    }

    /**
    * Gets the OperationParentId field. The unique identifier of the telemetry item's immediate parent. 
    */
    public function getOperationParentId()
    {
        if (array_key_exists('OperationParentId', $this->_data)) { return $this->_data['OperationParentId']; }
        return NULL;
    }

    /**
    * Sets the OperationParentId field. The unique identifier of the telemetry item's immediate parent. 
    */
    public function setOperationParentId($operationParentId)
    {
        $this->_data['OperationParentId'] = $operationParentId;
    }

    /**
    * Gets the OperationSyntheticSource field. Name of synthetic source. Some telemetry from the application may represent a synthetic traffic. It may be web crawler indexing the web site, site availability tests or traces from diagnostic libraries like Application Insights SDK itself. 
    */
    public function getOperationSyntheticSource()
    {
        if (array_key_exists('OperationSyntheticSource', $this->_data)) { return $this->_data['OperationSyntheticSource']; }
        return NULL;
    }

    /**
    * Sets the OperationSyntheticSource field. Name of synthetic source. Some telemetry from the application may represent a synthetic traffic. It may be web crawler indexing the web site, site availability tests or traces from diagnostic libraries like Application Insights SDK itself. 
    */
    public function setOperationSyntheticSource($operationSyntheticSource)
    {
        $this->_data['OperationSyntheticSource'] = $operationSyntheticSource;
    }

    /**
    * Gets the OperationCorrelationVector field. The correlation vector is a light weight vector clock which can be used to identify and order related events across clients and services. 
    */
    public function getOperationCorrelationVector()
    {
        if (array_key_exists('OperationCorrelationVector', $this->_data)) { return $this->_data['OperationCorrelationVector']; }
        return NULL;
    }

    /**
    * Sets the OperationCorrelationVector field. The correlation vector is a light weight vector clock which can be used to identify and order related events across clients and services. 
    */
    public function setOperationCorrelationVector($operationCorrelationVector)
    {
        $this->_data['OperationCorrelationVector'] = $operationCorrelationVector;
    }

    /**
    * Gets the SessionId field. Session ID - the instance of the user's interaction with the app. Information in the session context fields is always about the end user. When telemetry is sent from a service, the session context is about the user that initiated the operation in the service. 
    */
    public function getSessionId()
    {
        if (array_key_exists('SessionId', $this->_data)) { return $this->_data['SessionId']; }
        return NULL;
    }

    /**
    * Sets the SessionId field. Session ID - the instance of the user's interaction with the app. Information in the session context fields is always about the end user. When telemetry is sent from a service, the session context is about the user that initiated the operation in the service. 
    */
    public function setSessionId($sessionId)
    {
        $this->_data['SessionId'] = $sessionId;
    }

    /**
    * Gets the SessionIsFirst field. Boolean value indicating whether the session identified by ai.session.id is first for the user or not. 
    */
    public function getSessionIsFirst()
    {
        if (array_key_exists('SessionIsFirst', $this->_data)) { return $this->_data['SessionIsFirst']; }
        return NULL;
    }

    /**
    * Sets the SessionIsFirst field. Boolean value indicating whether the session identified by ai.session.id is first for the user or not. 
    */
    public function setSessionIsFirst($sessionIsFirst)
    {
        $this->_data['SessionIsFirst'] = $sessionIsFirst;
    }

    /**
    * Gets the UserAccountId field. In multi-tenant applications this is the account ID or name which the user is acting with. Examples may be subscription ID for Azure portal or blog name blogging platform. 
    */
    public function getUserAccountId()
    {
        if (array_key_exists('UserAccountId', $this->_data)) { return $this->_data['UserAccountId']; }
        return NULL;
    }

    /**
    * Sets the UserAccountId field. In multi-tenant applications this is the account ID or name which the user is acting with. Examples may be subscription ID for Azure portal or blog name blogging platform. 
    */
    public function setUserAccountId($userAccountId)
    {
        $this->_data['UserAccountId'] = $userAccountId;
    }

    /**
    * Gets the UserId field. Anonymous user id. Represents the end user of the application. When telemetry is sent from a service, the user context is about the user that initiated the operation in the service. 
    */
    public function getUserId()
    {
        if (array_key_exists('UserId', $this->_data)) { return $this->_data['UserId']; }
        return NULL;
    }

    /**
    * Sets the UserId field. Anonymous user id. Represents the end user of the application. When telemetry is sent from a service, the user context is about the user that initiated the operation in the service. 
    */
    public function setUserId($userId)
    {
        $this->_data['UserId'] = $userId;
    }

    /**
    * Gets the UserAuthUserId field. Authenticated user id. The opposite of ai.user.id, this represents the user with a friendly name. Since it's PII information it is not collected by default by most SDKs. 
    */
    public function getUserAuthUserId()
    {
        if (array_key_exists('UserAuthUserId', $this->_data)) { return $this->_data['UserAuthUserId']; }
        return NULL;
    }

    /**
    * Sets the UserAuthUserId field. Authenticated user id. The opposite of ai.user.id, this represents the user with a friendly name. Since it's PII information it is not collected by default by most SDKs. 
    */
    public function setUserAuthUserId($userAuthUserId)
    {
        $this->_data['UserAuthUserId'] = $userAuthUserId;
    }

    /**
    * Gets the CloudRole field. Name of the role the application is a part of. Maps directly to the role name in azure. 
    */
    public function getCloudRole()
    {
        if (array_key_exists('CloudRole', $this->_data)) { return $this->_data['CloudRole']; }
        return NULL;
    }

    /**
    * Sets the CloudRole field. Name of the role the application is a part of. Maps directly to the role name in azure. 
    */
    public function setCloudRole($cloudRole)
    {
        $this->_data['CloudRole'] = $cloudRole;
    }

    /**
    * Gets the CloudRoleInstance field. Name of the instance where the application is running. Computer name for on-premisis, instance name for Azure. 
    */
    public function getCloudRoleInstance()
    {
        if (array_key_exists('CloudRoleInstance', $this->_data)) { return $this->_data['CloudRoleInstance']; }
        return NULL;
    }

    /**
    * Sets the CloudRoleInstance field. Name of the instance where the application is running. Computer name for on-premisis, instance name for Azure. 
    */
    public function setCloudRoleInstance($cloudRoleInstance)
    {
        $this->_data['CloudRoleInstance'] = $cloudRoleInstance;
    }

    /**
    * Gets the InternalSdkVersion field. SDK version. See https://github.com/Microsoft/ApplicationInsights-Home/blob/master/SDK-AUTHORING.md#sdk-version-specification for information. 
    */
    public function getInternalSdkVersion()
    {
        if (array_key_exists('InternalSdkVersion', $this->_data)) { return $this->_data['InternalSdkVersion']; }
        return NULL;
    }

    /**
    * Sets the InternalSdkVersion field. SDK version. See https://github.com/Microsoft/ApplicationInsights-Home/blob/master/SDK-AUTHORING.md#sdk-version-specification for information. 
    */
    public function setInternalSdkVersion($internalSdkVersion)
    {
        $this->_data['InternalSdkVersion'] = $internalSdkVersion;
    }

    /**
    * Gets the InternalAgentVersion field. Agent version. Used to indicate the version of StatusMonitor installed on the computer if it is used for data collection. 
    */
    public function getInternalAgentVersion()
    {
        if (array_key_exists('InternalAgentVersion', $this->_data)) { return $this->_data['InternalAgentVersion']; }
        return NULL;
    }

    /**
    * Sets the InternalAgentVersion field. Agent version. Used to indicate the version of StatusMonitor installed on the computer if it is used for data collection. 
    */
    public function setInternalAgentVersion($internalAgentVersion)
    {
        $this->_data['InternalAgentVersion'] = $internalAgentVersion;
    }

    /**
    * Gets the InternalNodeName field. This is the node name used for billing purposes. Use it to override the standard detection of nodes. 
    */
    public function getInternalNodeName()
    {
        if (array_key_exists('InternalNodeName', $this->_data)) { return $this->_data['InternalNodeName']; }
        return NULL;
    }

    /**
    * Sets the InternalNodeName field. This is the node name used for billing purposes. Use it to override the standard detection of nodes. 
    */
    public function setInternalNodeName($internalNodeName)
    {
        $this->_data['InternalNodeName'] = $internalNodeName;
    }
}
