<?php
namespace ApplicationInsights\Tests;

/**
 * Contains tests for TelemetryClient class
 */
class TelemetryClientTest extends \PHPUnit_Framework_TestCase
{
    private $_telemetryClient;
        
    protected function setUp()
    {
        $this->_telemetryClient = new \ApplicationInsights\TelemetryClient();
        
        $context = $this->_telemetryClient->get_context();
        
        $context->set_instrumentation_key(Utils::get_test_instrumentation_key());
        $context->set_application_context(Utils::get_sample_application_context());
        $context->set_device_context(Utils::get_sample_device_context());
        $context->set_location_context(Utils::get_sample_location_context());
        $context->set_operation_context(Utils::get_sample_operation_context());
        $context->set_session_context(Utils::get_sample_session_context());
        $context->set_user_context(Utils::get_sample_user_context());
        
        $context->set_properties(Utils::get_sample_custom_properties());
    }

    /**
     * Verifies the object is constructed properly.
     */
    public function test_constructor()
    {
        $telemetry_client = new \ApplicationInsights\TelemetryClient();
        $this->assertEquals($telemetry_client->get_context(), new \ApplicationInsights\TelemetryContext());
        $this->assertEquals($telemetry_client->get_channel(), new \ApplicationInsights\Channel\TelemetryChannel());
    }
    
    /**
     * Tests a completely filled event.
     */
    public function test_complete_event()
    {
        $this->_telemetryClient->queue_event('myEvent', ['InlineProperty' => 'test_value'], ['duration' => 42.0]);
        $this->_telemetryClient->queue_event('myEvent2', ['InlineProperty' => 'test_value'], ['duration' => 42.0]);

        $queue = json_decode($this->_telemetryClient->get_channel()->get_serialized_queue(), true);
        $queue[0]['time'] = 'TIME_PLACEHOLDER';
        $queue[1]['time'] = 'TIME_PLACEHOLDER';
        $expected_value = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Event","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"' . Utils::get_test_instrumentation_key() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent"},"data":{"baseData":{"ver":2,"name":"myEvent","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"EventData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Event","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::get_test_instrumentation_key() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent"},"data":{"baseData":{"ver":2,"name":"myEvent2","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"EventData"}}]', true);
        
        $this->assertEquals($queue, $expected_value);
    }
    
    /**
     * Tests a completely filled page view.
     */
    public function test_complete_page_view()
    {
        $this->_telemetryClient->queue_page_view('myPageView', 'http://www.foo.com', 256, ['InlineProperty' => 'test_value'], ['duration' => 42.0]);
        $this->_telemetryClient->queue_page_view('myPageView2', 'http://www.foo.com', 256, ['InlineProperty' => 'test_value'], ['duration' => 42.0]);

        $queue = json_decode($this->_telemetryClient->get_channel()->get_serialized_queue(), true);
        $queue[0]['time'] = 'TIME_PLACEHOLDER';
        $queue[1]['time'] = 'TIME_PLACEHOLDER';
        $expected_value = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.PageView","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::get_test_instrumentation_key() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent"},"data":{"baseData":{"ver":2,"name":"myPageView","url":"http:\/\/www.foo.com","duration":256,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"PageViewData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.PageView","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::get_test_instrumentation_key() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent"},"data":{"baseData":{"ver":2,"name":"myPageView2","url":"http:\/\/www.foo.com","duration":256,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"PageViewData"}}]', true);
        
        $this->assertEquals($queue, $expected_value);
    }
    
    /**
     * Tests a completely filled metric.
     */
    public function test_complete_metric()
    {
        $this->_telemetryClient->queue_metric('myMetric', 42.0, \ApplicationInsights\Channel\Contracts\DataPointType::Aggregation, 5, 0, 1, 0.2, ['InlineProperty' => 'test_value']);
        $this->_telemetryClient->queue_metric('myMetric2', 42.0, \ApplicationInsights\Channel\Contracts\DataPointType::Aggregation, 5, 0, 1, 0.2, ['InlineProperty' => 'test_value']);

        $queue = json_decode($this->_telemetryClient->get_channel()->get_serialized_queue(), true);
        $queue[0]['time'] = 'TIME_PLACEHOLDER';
        $queue[1]['time'] = 'TIME_PLACEHOLDER';
        $expected_value = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Metric","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::get_test_instrumentation_key() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent"},"data":{"baseData":{"ver":2,"metrics":[{"name":"myMetric","kind":1,"value":42,"count":5,"max":1,"stdDev":0.2}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MetricData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Metric","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::get_test_instrumentation_key() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent"},"data":{"baseData":{"ver":2,"metrics":[{"name":"myMetric2","kind":1,"value":42,"count":5,"max":1,"stdDev":0.2}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MetricData"}}]', true);
        
        $this->assertEquals($queue, $expected_value);
    }
    
    /**
     * Tests a completely filled message.
     */
    public function test_complete_message()
    {
        $this->_telemetryClient->queue_message('myMessage', ['InlineProperty' => 'test_value']);
        $this->_telemetryClient->queue_message('myMessage2', ['InlineProperty' => 'test_value']);

        $queue = json_decode($this->_telemetryClient->get_channel()->get_serialized_queue(), true);
        $queue[0]['time'] = 'TIME_PLACEHOLDER';
        $queue[1]['time'] = 'TIME_PLACEHOLDER';
        $expected_value = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Message","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::get_test_instrumentation_key() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent"},"data":{"baseData":{"ver":2,"message":"myMessage","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MessageData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Message","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::get_test_instrumentation_key() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent"},"data":{"baseData":{"ver":2,"message":"myMessage2","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MessageData"}}]', true);
        
        $this->assertEquals($queue, $expected_value);
    }

}

?>
