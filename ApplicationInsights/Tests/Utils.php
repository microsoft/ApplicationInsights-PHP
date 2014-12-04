<?php
namespace ApplicationInsights\Tests;

/**
 * Contains utilities for tests
 */
class Utils
{
    /**
     * A single place for managing the instrumentation key used in the tests.
     * @return string (Guid)
     */
    public static function get_test_instrumentation_key()
    {
        return 'f22d426f-57e2-47c3-9668-c58013a26eb4';
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Device
     * @return ApplicationInsights\Channel\Contracts\Device
     */
    public static function get_sample_device_context()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Device();
        $context->set_id('my_device_id');
        $context->set_ip('127.0.0.1');
        $context->set_language('EN');
        $context->set_locale('EN');
        $context->set_model('my_device_model');
        $context->set_network(5);
        $context->set_oem_name('my_device_oem_name');
        $context->set_os('Window');
        $context->set_os_version('8');
        $context->set_role_instance('device role instance');
        $context->set_role_name('device role name');
        $context->set_screen_resolution('1920x1080');
        $context->set_type('PC');
        $context->set_vm_name('device vm name');
        return $context;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Application
     * @return ApplicationInsights\Channel\Contracts\Application
     */
    public static function get_sample_application_context()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Application();
        $context->set_ver('1.0.0.0');
        return $context;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\User
     * @return ApplicationInsights\Channel\Contracts\User
     */
    public static function get_sample_user_context()
    {
        $context = new \ApplicationInsights\Channel\Contracts\User();
        $context->set_id('my_user_id');
        $context->set_account_acquisition_date('1/1/2014');
        $context->set_account_id('my_account_id');
        $context->set_user_agent('my_user_agent');
        return $context;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Location
     * @return ApplicationInsights\Channel\Contracts\Location
     */
    public static function get_sample_location_context()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Location();
        $context->set_ip("127.0.0.0");
        return $context;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Operation
     * @return ApplicationInsights\Channel\Contracts\Operation
     */
    public static function get_sample_operation_context()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Operation();
        $context->set_id('my_operation_id');
        $context->set_name('my_operation_name');
        $context->set_parent_id('my_operation_parent_id');
        $context->set_root_id('my_operation_rood');
        return $context;
    }
    
    /**
     * Gets a sample ApplicationInsights\Channel\Contracts\Session
     * @return ApplicationInsights\Channel\Contracts\Session
     */
    public static function get_sample_session_context()
    {
        $context = new \ApplicationInsights\Channel\Contracts\Session();
        $context->set_id('my_session_id');
        $context->set_is_first(false);
        $context->set_is_new(false);
        return $context;
    }
    
    /**
     * Gets a sample custom property array.
     * @return array
     */
    public static function get_sample_custom_properties()
    {
        return ['MyCustomProperty' => 42, 'MyCustomProperty2' => 'test'];
    }
}
?>