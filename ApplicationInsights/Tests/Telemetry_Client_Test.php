<?php
namespace ApplicationInsights\Tests;

/**
 * Contains tests for Telemetry_Client class
 */
class Telemetry_Client_Test extends \PHPUnit_Framework_TestCase
{
    private $_telemetryClient;
        
    protected function setUp()
    {
        $this->_telemetryClient = new \ApplicationInsights\Telemetry_Client();
        
        $context = $this->_telemetryClient->getContext();
        
        $context->setInstrumentationKey(Utils::getTestInstrumentationKey());
        $context->setApplicationContext(Utils::getSampleApplicationContext());
        $context->setDeviceContext(Utils::getSampleDeviceContext());
        $context->setLocationContext(Utils::getSampleLocationContext());
        $context->setOperationContext(Utils::getSampleOperationContext());
        $context->setSessionContext(Utils::getSampleSessionContext());
        $context->setUserContext(Utils::getSampleUserContext());
        
        $context->setProperties(Utils::getSampleCustomProperties());
    }
    
    /**
     * Verifies the object is constructed properly.
     */
    public function testConstructor()
    {
        $telemetryClient = new \ApplicationInsights\Telemetry_Client();
        $this->assertEquals($telemetryClient->getContext(), new \ApplicationInsights\Telemetry_Context());
        $this->assertEquals($telemetryClient->getChannel(), new \ApplicationInsights\Channel\Telemetry_Channel());
    }
    
    /**
     * Tests a completely filled event.
     */
    public function testCompleteEvent()
    {
        $this->_telemetryClient->trackEvent('myEvent', ['InlineProperty' => 'test_value'], ['duration' => 42.0]);
        $this->_telemetryClient->trackEvent('myEvent2', ['InlineProperty' => 'test_value'], ['duration' => 42.0]);

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Event","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"' . Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myEvent","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"EventData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Event","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myEvent2","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"EventData"}}]', true);
        
        $this->assertEquals($queue, $expectedValue);
        
        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }
    
    /**
     * Tests a completely filled page view.
     */
    public function testCompletePageView()
    {
        $this->_telemetryClient->trackPageView('myPageView', 'http://www.foo.com', 256, ['InlineProperty' => 'test_value'], ['duration' => 42.0]);
        $this->_telemetryClient->trackPageView('myPageView2', 'http://www.foo.com', 256, ['InlineProperty' => 'test_value'], ['duration' => 42.0]);

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.PageView","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myPageView","url":"http:\/\/www.foo.com","duration":256,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"PageViewData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.PageView","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myPageView2","url":"http:\/\/www.foo.com","duration":256,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"PageViewData"}}]', true);
        
        $this->assertEquals($queue, $expectedValue);
        
        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }
    
    /**
     * Tests a completely filled metric.
     */
    public function testCompleteMetric()
    {
        $this->_telemetryClient->trackMetric('myMetric', 42.0, \ApplicationInsights\Channel\Contracts\Data_Point_Type::Aggregation, 5, 0, 1, 0.2, ['InlineProperty' => 'test_value']);
        $this->_telemetryClient->trackMetric('myMetric2', 42.0, \ApplicationInsights\Channel\Contracts\Data_Point_Type::Aggregation, 5, 0, 1, 0.2, ['InlineProperty' => 'test_value']);

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Metric","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"metrics":[{"name":"myMetric","kind":1,"value":42,"count":5,"max":1,"stdDev":0.2}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MetricData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Metric","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"metrics":[{"name":"myMetric2","kind":1,"value":42,"count":5,"max":1,"stdDev":0.2}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MetricData"}}]', true);
        
        $this->assertEquals($queue, $expectedValue);
        
        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }
    
    /**
     * Tests a completely filled message.
     */
    public function testCompleteRequest()
    {
        $this->_telemetryClient->trackRequest('myRequest', 'http://foo.bar', time(), 3754, 200, true, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);
        $this->_telemetryClient->trackRequest('myRequest2', 'http://foo.bar', time(), 3754, 200, true, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);
        
        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Request","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"id":"ID_PLACEHOLDER","startTime":"TIME_PLACEHOLDER","duration":"00:00:03.754","responseCode":200,"success":true,"name":"myRequest","url":"http:\/\/foo.bar","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"RequestData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Request","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"id":"ID_PLACEHOLDER","startTime":"TIME_PLACEHOLDER","duration":"00:00:03.754","responseCode":200,"success":true,"name":"myRequest2","url":"http:\/\/foo.bar","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"RequestData"}}]', true);
        
        $this->assertEquals($queue, $expectedValue);
        
        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }

    /**
     * Tests a completely filled message.
     */
    public function testCompleteMessage()
    {
        $this->_telemetryClient->trackMessage('myMessage', ['InlineProperty' => 'test_value']);
        $this->_telemetryClient->trackMessage('myMessage2', ['InlineProperty' => 'test_value']);

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Message","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"message":"myMessage","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MessageData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Message","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"message":"myMessage2","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MessageData"}}]', true);
        
        $this->assertEquals($queue, $expectedValue);
        
        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }
    
    /**
     * Tests a completely filled exception.
     */
    public function testCompleteException()
    {
        try
        {
            Utils::throwNestedException(0);
        }        
        catch (\Exception $ex)
        {
            $this->_telemetryClient->trackException($ex, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);
        }
    }
    
    /**
     * Summary of adjustDataInQueue
     * @param array $queue The queue of items
     * @return array
     */
    private function adjustDataInQueue($queue)
    {
        foreach ($queue as &$queueItem)
        {
            $queueItem['time'] = 'TIME_PLACEHOLDER';
            $queueItem['tags']['ai.internal.sdkVersion'] = 'SDK_VERSION_STRING';
            if (array_key_exists('startTime', $queueItem['data']['baseData']) == true)
            {
                $queueItem['data']['baseData']['startTime'] = 'TIME_PLACEHOLDER';
            }
            if (array_key_exists('id', $queueItem['data']['baseData']) == true)
            {
                $queueItem['data']['baseData']['id'] = 'ID_PLACEHOLDER';
            }
        }
        return $queue;
    }
}
