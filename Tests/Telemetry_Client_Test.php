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
     * Tests a completely filled exception.
     *
     * Ensure this method doesn't move in the source, if it does, the test will fail and needs to have a line number adjusted.
     */
    public function testCompleteException()
    {
        try
        {
            Utils::throwNestedException(3);
        }
        catch (\Exception $ex)
        {
            $this->_telemetryClient->trackException($ex, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);
        }

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);

        $searchStrings = array("\\");
        $replaceStrings = array("\\\\");

        $expectedString = str_replace($searchStrings, $replaceStrings, '[{"ver":1,"name":"Microsoft.ApplicationInsights.Exception","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1/1/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"handledAt":"UserCode","exceptions":[{"typeName":"Exception","message":"testException in G:\\GitHub\\AppInsights-PHP\\ApplicationInsights\\Tests\\Utils.php on line 130","hasFullStack":true,"id":1,"parsedStack":[{"level":"14","method":"main","assembly":"PHPUnit_TextUI_Command","fileName":"C:\\Users\\jakubo\\AppData\\Local\\Microsoft\\VisualStudio\\12.0\\Extensions\\DEVSENSE\\PHP Tools for Visual Studio 2013 1.14.5747\\phpunit-3.7.phar","line":52},{"level":"13","method":"run","assembly":"PHPUnit_TextUI_Command","fileName":"phar://C:/Users/jakubo/AppData/Local/Microsoft/VisualStudio/12.0/Extensions/DEVSENSE/PHP Tools for Visual Studio 2013 1.14.5747/phpunit-3.7.phar/phpunit/TextUI/Command.php","line":100},{"level":"12","method":"doRun","assembly":"PHPUnit_TextUI_TestRunner","fileName":"phar://C:/Users/jakubo/AppData/Local/Microsoft/VisualStudio/12.0/Extensions/DEVSENSE/PHP Tools for Visual Studio 2013 1.14.5747/phpunit-3.7.phar/phpunit/TextUI/Command.php","line":149},{"level":"11","method":"run","assembly":"PHPUnit_Framework_TestSuite","fileName":"G:\\GitHub\\AppInsights-PHP\\vendor\\phpunit\\phpunit\\src\\TextUI\\TestRunner.php","line":440},{"level":"10","method":"run","assembly":"PHPUnit_Framework_TestSuite","fileName":"G:\\GitHub\\AppInsights-PHP\\vendor\\phpunit\\phpunit\\src\\Framework\\TestSuite.php","line":722},{"level":"9","method":"run","assembly":"PHPUnit_Framework_TestCase","fileName":"G:\\GitHub\\AppInsights-PHP\\vendor\\phpunit\\phpunit\\src\\Framework\\TestSuite.php","line":722},{"level":"8","method":"run","assembly":"PHPUnit_Framework_TestResult","fileName":"G:\\GitHub\\AppInsights-PHP\\vendor\\phpunit\\phpunit\\src\\Framework\\TestCase.php","line":724},{"level":"7","method":"runBare","assembly":"PHPUnit_Framework_TestCase","fileName":"G:\\GitHub\\AppInsights-PHP\\vendor\\phpunit\\phpunit\\src\\Framework\\TestResult.php","line":612},{"level":"6","method":"runTest","assembly":"PHPUnit_Framework_TestCase","fileName":"G:\\GitHub\\AppInsights-PHP\\vendor\\phpunit\\phpunit\\src\\Framework\\TestCase.php","line":768},{"level":"5","method":"invokeArgs","assembly":"ReflectionMethod","fileName":"G:\\GitHub\\AppInsights-PHP\\vendor\\phpunit\\phpunit\\src\\Framework\\TestCase.php","line":908},{"level":"4","method":"testCompleteException","assembly":"ApplicationInsights\\Tests\\Telemetry_Client_Test"},{"level":"3","method":"throwNestedException","assembly":"ApplicationInsights\\Tests\\Utils","fileName":"G:\\GitHub\\AppInsights-PHP\\ApplicationInsights\\Tests\\Telemetry_Client_Test.php","line":37},{"level":"2","method":"throwNestedException","assembly":"ApplicationInsights\\Tests\\Utils","fileName":"G:\\GitHub\\AppInsights-PHP\\ApplicationInsights\\Tests\\Utils.php","line":133},{"level":"1","method":"throwNestedException","assembly":"ApplicationInsights\\Tests\\Utils","fileName":"G:\\GitHub\\AppInsights-PHP\\ApplicationInsights\\Tests\\Utils.php","line":133},{"level":"0","method":"throwNestedException","assembly":"ApplicationInsights\\Tests\\Utils","fileName":"G:\\GitHub\\AppInsights-PHP\\ApplicationInsights\\Tests\\Utils.php","line":133}]}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"ExceptionData"}}]');
        $expectedValue = json_decode($expectedString, true);

        $this->assertEquals($this->removeMachineSpecificExceptionData($queue), $this->removeMachineSpecificExceptionData($expectedValue));

        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
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
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Event","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"' . Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myEvent","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"EventData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Event","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myEvent2","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"EventData"}}]', true);

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
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.PageView","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myPageView","url":"http:\/\/www.foo.com","duration":256,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"PageViewData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.PageView","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myPageView2","url":"http:\/\/www.foo.com","duration":256,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"PageViewData"}}]', true);

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
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Metric","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"metrics":[{"name":"myMetric","kind":1,"value":42,"count":5,"max":1,"stdDev":0.2}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MetricData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Metric","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"metrics":[{"name":"myMetric2","kind":1,"value":42,"count":5,"max":1,"stdDev":0.2}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MetricData"}}]', true);

        $this->assertEquals($queue, $expectedValue);

        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }

    /**
     * Tests a completely filled request.
     */
    public function testCompleteRequest()
    {
        $this->_telemetryClient->trackRequest('myRequest', 'http://foo.bar', time(), 3754, 200, true, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);
        $this->_telemetryClient->trackRequest('myRequest2', 'http://foo.bar', time(), 3754, 200, false, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Request","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"id":"ID_PLACEHOLDER","startTime":"TIME_PLACEHOLDER","duration":"00:00:03.754","responseCode":200,"success":true,"name":"myRequest","url":"http:\/\/foo.bar","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"RequestData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Request","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"id":"ID_PLACEHOLDER","startTime":"TIME_PLACEHOLDER","duration":"00:00:03.754","responseCode":200,"success":false,"name":"myRequest2","url":"http:\/\/foo.bar","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"RequestData"}}]', true);

        $this->assertEquals($queue, $expectedValue);

        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }

    /**
     * Tests a completely filled request created by begin/end pair.
     */
    public function testCompleteBeginEndRequest()
    {
        $request = $this->_telemetryClient->beginRequest('myRequest', 'http://foo.bar', time());

        // that shouldn't have queued anything so the queue should be empty
        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $this->assertEquals($queue, array());

        // now queue that request, and another begin/end pair
        $this->_telemetryClient->endRequest($request, 3754, 200, true, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);

        $request = $this->_telemetryClient->beginRequest('myRequest2', 'http://foo.bar', time());
        $this->_telemetryClient->endRequest($request, 3754, 200, false, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);
        // expected to look exactly the same as testCompleteRequest
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Request","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"id":"ID_PLACEHOLDER","startTime":"TIME_PLACEHOLDER","duration":"00:00:03.754","responseCode":200,"success":true,"name":"myRequest","url":"http:\/\/foo.bar","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"RequestData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Request","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"id":"ID_PLACEHOLDER","startTime":"TIME_PLACEHOLDER","duration":"00:00:03.754","responseCode":200,"success":false,"name":"myRequest2","url":"http:\/\/foo.bar","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"RequestData"}}]', true);

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
        $this->_telemetryClient->trackMessage('myMessage', \ApplicationInsights\Channel\Contracts\Message_Severity_Level::ERROR, ['InlineProperty' => 'test_value']);
        $this->_telemetryClient->trackMessage('myMessage2', \ApplicationInsights\Channel\Contracts\Message_Severity_Level::INFORMATION, ['InlineProperty' => 'test_value']);

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Message","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"message":"myMessage","severityLevel":"Error","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MessageData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Message","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"message":"myMessage2","severityLevel":"Information","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MessageData"}}]', true);

        $this->assertEquals($queue, $expectedValue);

        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }

    /**
     * Tests a completely filled dependency.
     */
    public function testCompleteDependency()
    {
        $this->_telemetryClient->trackDependency('Sql', \ApplicationInsights\Channel\Contracts\Dependency_Type::SQL, 'SELECT * FROM hola;', time(), 100, true, 200, true, ['InlineProperty' => 'test_value']);
        $this->_telemetryClient->trackDependency('http://example.com/api/method', \ApplicationInsights\Channel\Contracts\Dependency_Type::HTTP, null, time(), 100, false, 503, false, ['InlineProperty' => 'test_value']);
        $this->_telemetryClient->trackDependency('Other', \ApplicationInsights\Channel\Contracts\Dependency_Type::OTHER, 'Other text', time(), 100, true, 200, true, ['InlineProperty' => 'test_value']);

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.RemoteDependency","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"Sql","commandName":"SELECT * FROM hola;","startTime":"TIME_PLACEHOLDER","duration":"00:00:00.100","success":true,"resultCode":"200","async":true,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"RemoteDependencyData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.RemoteDependency","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"http:\/\/example.com\/api\/method","dependencyKind":1,"startTime":"TIME_PLACEHOLDER","duration":"00:00:00.100","success":false,"resultCode":"503","async":false,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"RemoteDependencyData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.RemoteDependency","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.device.id":"my_device_id","ai.device.ip":"127.0.0.1","ai.device.language":"EN","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.network":5,"ai.device.oemName":"my_device_oem_name","ai.device.os":"Window","ai.device.osVersion":"8","ai.device.roleInstance":"device role instance","ai.device.roleName":"device role name","ai.device.screenResolution":"1920x1080","ai.device.type":"PC","ai.device.vmName":"device vm name","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.operation.rootId":"my_operation_rood","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.session.isNew":"false","ai.user.id":"my_user_id","ai.user.accountAcquisitionDate":"1\/1\/2014","ai.user.accountId":"my_account_id","ai.user.userAgent":"my_user_agent","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"Other","dependencyKind":2,"commandName":"Other text","startTime":"TIME_PLACEHOLDER","duration":"00:00:00.100","success":true,"resultCode":"200","async":true,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"RemoteDependencyData"}}]', true);

        $this->assertEquals($queue, $expectedValue);

        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }

    /**
     * Removes machine specific data from exceptions.
     * @param array $queue The queue of items
     * @return array
     */
    private function removeMachineSpecificExceptionData($queue)
    {
        foreach ($queue as &$queueItem)
        {
            foreach ($queueItem['data']['baseData']['exceptions'] as &$exception)
            {
                if (preg_match('([A-Za-z]+\.php)', $exception['message'], $matches) == 1)
                {
                    $exception['message'] = $matches[0];
                }
                else
                {
                    $exception['message'] = NULL;
                }

                foreach ($exception['parsedStack'] as &$stackFrame)
                {
                    if (array_key_exists('fileName', $stackFrame))
                    {
                        if (preg_match('([A-Za-z]+\.php)', $stackFrame['fileName'], $matches) == 1)
                        {
                            $stackFrame['fileName'] = $matches[0];
                        }
                        else
                        {
                            $stackFrame['fileName'] = NULL;
                        }
                    }
                }
            }
        }
        return $queue;
    }

    /**
     * Remotes transient data from validation queues
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
