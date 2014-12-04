<?php
namespace ApplicationInsights\Tests;

/**
 * Contains tests for TelemetryContext class
 */
class TelemetryContextTest extends \PHPUnit_Framework_TestCase
{
    public function test_instrumentation_key()
    {
        $telemetry_context = new \ApplicationInsights\TelemetryContext();
        $instrumentation_key = Utils::get_test_instrumentation_key();
        $telemetry_context->set_instrumentation_key($instrumentation_key);
        $this->assertEquals($instrumentation_key, $telemetry_context->get_instrumentation_key());
    }
    
    public function test_device_context()
    {
        $telemetry_context = new \ApplicationInsights\TelemetryContext();
        $context = $telemetry_context->get_device_context();
        $this->assertEquals($context, new \ApplicationInsights\Channel\Contracts\Device());
        $telemetry_context->set_device_context(Utils::get_sample_device_context());
        $context = $telemetry_context->get_device_context();
        $this->assertEquals($context, Utils::get_sample_device_context());
    }
    
    public function test_application_context()
    {
        $telemetry_context = new \ApplicationInsights\TelemetryContext();
        $context = $telemetry_context->get_application_context();
        $this->assertEquals($context, new \ApplicationInsights\Channel\Contracts\Application());
        $telemetry_context->set_application_context(Utils::get_sample_application_context());
        $context = $telemetry_context->get_application_context();
        $this->assertEquals($context, Utils::get_sample_application_context());
    }
    
    public function test_user_context()
    {
        $telemetry_context = new \ApplicationInsights\TelemetryContext();
        $context = $telemetry_context->get_user_context();
        $this->assertEquals($context, new \ApplicationInsights\Channel\Contracts\User());
        $telemetry_context->set_user_context(Utils::get_sample_user_context());
        $context = $telemetry_context->get_user_context();
        $this->assertEquals($context, Utils::get_sample_user_context());
    }
    
    public function test_location_context()
    {
        $telemetry_context = new \ApplicationInsights\TelemetryContext();
        $context = $telemetry_context->get_location_context();
        $this->assertEquals($context, new \ApplicationInsights\Channel\Contracts\Location());
        $telemetry_context->set_location_context(Utils::get_sample_location_context());
        $context = $telemetry_context->get_location_context();
        $this->assertEquals($context, Utils::get_sample_location_context());
    }
    
    public function test_operation_context()
    {
        $telemetry_context = new \ApplicationInsights\TelemetryContext();
        $context = $telemetry_context->get_operation_context();
        $this->assertEquals($context, new \ApplicationInsights\Channel\Contracts\Operation());
        $telemetry_context->set_operation_context(Utils::get_sample_operation_context());
        $context = $telemetry_context->get_operation_context();
        $this->assertEquals($context, Utils::get_sample_operation_context());
    }
    
    public function test_session_context()
    {
        $telemetry_context = new \ApplicationInsights\TelemetryContext();
        $context = $telemetry_context->get_session_context();
        $this->assertEquals($context, new \ApplicationInsights\Channel\Contracts\Session());
        $telemetry_context->set_session_context(Utils::get_sample_session_context());
        $context = $telemetry_context->get_session_context();
        $this->assertEquals($context, Utils::get_sample_session_context());
    }
    
    public function test_properties()
    {
        $telemetry_context = new \ApplicationInsights\TelemetryContext();
        $properties = $telemetry_context->get_properties();
        $this->assertEquals($properties, []);
        $telemetry_context->set_properties(Utils::get_sample_custom_properties());
        $properties = $telemetry_context->get_properties();
        $this->assertEquals($properties, Utils::get_sample_custom_properties());
    }
}

?>
