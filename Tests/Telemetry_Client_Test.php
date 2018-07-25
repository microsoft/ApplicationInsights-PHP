<?php
namespace ApplicationInsights\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Contains tests for Telemetry_Client class
 */
class Telemetry_Client_Test extends TestCase
{
    private $_telemetryClient;

    protected function setUp()
    {
        $this->_telemetryClient = new \ApplicationInsights\Telemetry_Client();

        $context = $this->_telemetryClient->getContext();

        $context->setInstrumentationKey(Utils::getTestInstrumentationKey());
        $context->setApplicationContext(Utils::getSampleApplicationContext());
        $context->setDeviceContext(Utils::getSampleDeviceContext());
        $context->setCloudContext(Utils::getSampleCloudContext());
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

        $expectedString = str_replace($searchStrings, $replaceStrings, '[{"ver":1,"name":"Microsoft.ApplicationInsights.Exception","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"11111111-1111-1111-1111-111111111111","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"exceptions":[{"typeName":"Exception","message":"testException in \/Users\/sergeykanzhelev\/src\/ApplicationInsights\/php\/Tests\/Utils.php on line 130","hasFullStack":true,"id":1,"parsedStack":[{"level":"13","method":"main","assembly":"PHPUnit\\TextUI\\Command","fileName":"\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit","line":588},{"level":"12","method":"run","assembly":"PHPUnit\\TextUI\\Command","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/TextUI\/Command.php","line":151},{"level":"11","method":"doRun","assembly":"PHPUnit\\TextUI\\TestRunner","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/TextUI\/Command.php","line":198},{"level":"10","method":"run","assembly":"PHPUnit\\Framework\\TestSuite","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/TextUI\/TestRunner.php","line":529},{"level":"9","method":"run","assembly":"PHPUnit\\Framework\\TestSuite","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestSuite.php","line":776},{"level":"8","method":"run","assembly":"PHPUnit\\Framework\\TestCase","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestSuite.php","line":776},{"level":"7","method":"run","assembly":"PHPUnit\\Framework\\TestResult","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestCase.php","line":798},{"level":"6","method":"runBare","assembly":"PHPUnit\\Framework\\TestCase","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestResult.php","line":645},{"level":"5","method":"runTest","assembly":"PHPUnit\\Framework\\TestCase","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestCase.php","line":840},{"level":"4","method":"testCompleteException","assembly":"ApplicationInsights\\Tests\\Telemetry_Client_Test","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestCase.php","line":1145},{"level":"3","method":"throwNestedException","assembly":"ApplicationInsights\\Tests\\Utils","fileName":"\/Users\/sergeykanzhelev\/src\/ApplicationInsights\/php\/Tests\/Telemetry_Client_Test.php","line":40},{"level":"2","method":"throwNestedException","assembly":"ApplicationInsights\\Tests\\Utils","fileName":"\/Users\/sergeykanzhelev\/src\/ApplicationInsights\/php\/Tests\/Utils.php","line":133},{"level":"1","method":"throwNestedException","assembly":"ApplicationInsights\\Tests\\Utils","fileName":"\/Users\/sergeykanzhelev\/src\/ApplicationInsights\/php\/Tests\/Utils.php","line":133},{"level":"0","method":"throwNestedException","assembly":"ApplicationInsights\\Tests\\Utils","fileName":"\/Users\/sergeykanzhelev\/src\/ApplicationInsights\/php\/Tests\/Utils.php","line":133}]}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"ExceptionData"}}]');
        $expectedValue = json_decode($expectedString, true);

        $this->assertEquals($this->removeMachineSpecificExceptionData($expectedValue, 4), $this->removeMachineSpecificExceptionData($queue, 4));

        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }

    /**
     * Tests a completely filled error.
     *
     * Ensure this method doesn't move in the source, if it does, the test will fail and needs to have a line number adjusted.
     */
    public function testCompleteError()
    {
        $errorsSupported = false;

        try
        {
            Utils::throwError();
        }
        catch (\Error $err)
        {
            $errorsSupported = true;
            $this->_telemetryClient->trackException($err, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);
        }

        if (!$errorsSupported)
        {
            return;
        }

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);

        $searchStrings = array("\\");
        $replaceStrings = array("\\\\");

        $expectedString = str_replace($searchStrings, $replaceStrings, '[{"ver":1,"name":"Microsoft.ApplicationInsights.Exception","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"11111111-1111-1111-1111-111111111111","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"exceptions":[{"typeName":"ParseError","message":"syntax error, unexpected \'asdlkja\' (T_STRING) in \/Users\/sergeykanzhelev\/src\/ApplicationInsights\/php\/Tests\/Utils.php(141) : eval()\'d code on line 1","hasFullStack":true,"id":1,"parsedStack":[{"level":"10","method":"main","assembly":"PHPUnit\\TextUI\\Command","fileName":"\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit","line":588},{"level":"9","method":"run","assembly":"PHPUnit\\TextUI\\Command","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/TextUI\/Command.php","line":151},{"level":"8","method":"doRun","assembly":"PHPUnit\\TextUI\\TestRunner","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/TextUI\/Command.php","line":198},{"level":"7","method":"run","assembly":"PHPUnit\\Framework\\TestSuite","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/TextUI\/TestRunner.php","line":529},{"level":"6","method":"run","assembly":"PHPUnit\\Framework\\TestSuite","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestSuite.php","line":776},{"level":"5","method":"run","assembly":"PHPUnit\\Framework\\TestCase","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestSuite.php","line":776},{"level":"4","method":"run","assembly":"PHPUnit\\Framework\\TestResult","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestCase.php","line":798},{"level":"3","method":"runBare","assembly":"PHPUnit\\Framework\\TestCase","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestResult.php","line":645},{"level":"2","method":"runTest","assembly":"PHPUnit\\Framework\\TestCase","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestCase.php","line":840},{"level":"1","method":"testCompleteError","assembly":"ApplicationInsights\\Tests\\Telemetry_Client_Test","fileName":"phar:\/\/\/usr\/local\/Cellar\/phpunit\/7.1.5\/bin\/phpunit\/phpunit\/Framework\/TestCase.php","line":1145},{"level":"0","method":"throwError","assembly":"ApplicationInsights\\Tests\\Utils","fileName":"\/Users\/sergeykanzhelev\/src\/ApplicationInsights\/php\/Tests\/Telemetry_Client_Test.php","line":75}]}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"ExceptionData"}}]');
        $expectedValue = json_decode($expectedString, true);

        $this->assertEquals($this->removeMachineSpecificExceptionData($expectedValue, 1), $this->removeMachineSpecificExceptionData($queue, 1));

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
        $this->assertNotNull($telemetryClient->getContext());
        $this->assertEquals($telemetryClient->getChannel(), new \ApplicationInsights\Channel\Telemetry_Channel());
    }


    /**
     * Verifies the guzzle client is properly overridden.
     */
    public function testGuzzleClientOverrideConstructor()
    {
        if (class_exists('\GuzzleHttp\Client') == true) {
            $baseUrl = "http://www.foo2.com";
            $client = new \GuzzleHttp\Client(['base_uri' => $baseUrl]);
            $telemetryChannel = new \ApplicationInsights\Channel\Telemetry_Channel('/what', $client);
            $telemetryClient = new \ApplicationInsights\Telemetry_Client(null, $telemetryChannel);
            $this->assertEquals($telemetryClient->getChannel()->GetClient(), new \GuzzleHttp\Client(['base_uri' => $baseUrl]));
        }
        else
        {
            $this->markTestSkipped("\GuzzleHttp\Client does not exist");
        }
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
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Event","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"' . Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myEvent","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"EventData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Event","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myEvent2","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"EventData"}}]', true);

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
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.PageView","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myPageView","url":"http:\/\/www.foo.com","duration":"00:00:00.256","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"PageViewData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.PageView","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"myPageView2","url":"http:\/\/www.foo.com","duration":"00:00:00.256","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration":42}},"baseType":"PageViewData"}}]', true);

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
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Metric","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"metrics":[{"name":"myMetric","kind":1,"value":42,"count":5,"max":1,"stdDev":0.2}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MetricData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Metric","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"metrics":[{"name":"myMetric2","kind":1,"value":42,"count":5,"max":1,"stdDev":0.2}],"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MetricData"}}]', true);

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
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Request","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"id":"ID_PLACEHOLDER","duration":"00:00:03.754","responseCode":200,"success":true,"name":"myRequest","url":"http:\/\/foo.bar","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"RequestData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Request","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"id":"ID_PLACEHOLDER","duration":"00:00:03.754","responseCode":200,"success":false,"name":"myRequest2","url":"http:\/\/foo.bar","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"RequestData"}}]', true);

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
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Request","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"id":"ID_PLACEHOLDER","duration":"00:00:03.754","responseCode":200,"success":true,"name":"myRequest","url":"http:\/\/foo.bar","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"RequestData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Request","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"id":"ID_PLACEHOLDER","duration":"00:00:03.754","responseCode":200,"success":false,"name":"myRequest2","url":"http:\/\/foo.bar","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"},"measurements":{"duration_inner":42}},"baseType":"RequestData"}}]', true);

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
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.Message","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"message":"myMessage","severityLevel":3,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MessageData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.Message","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"message":"myMessage2","severityLevel":1,"properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"MessageData"}}]', true);

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
        $this->_telemetryClient->trackDependency('Sql', 'SQL', 'SELECT * FROM hola;', time(), 100, true, 200, ['InlineProperty' => 'test_value']);
        $this->_telemetryClient->trackDependency('http://example.com/api/method', 'HTTP', null, time(), 100, false, 503, ['InlineProperty' => 'test_value']);
        $this->_telemetryClient->trackDependency('Other', 'OTHER', 'Other text', time(), 100, true, 200, ['InlineProperty' => 'test_value']);

        $queue = json_decode($this->_telemetryClient->getChannel()->getSerializedQueue(), true);
        $queue = $this->adjustDataInQueue($queue);
        $expectedValue = json_decode('[{"ver":1,"name":"Microsoft.ApplicationInsights.RemoteDependency","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"Sql","type":"SQL","data":"SELECT * FROM hola;","duration":"00:00:00.100","success":true,"resultCode":"200","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"RemoteDependencyData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.RemoteDependency","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"http:\/\/example.com\/api\/method","duration":"00:00:00.100","success":false,"type":"HTTP","resultCode":"503","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"RemoteDependencyData"}},{"ver":1,"name":"Microsoft.ApplicationInsights.RemoteDependency","time":"TIME_PLACEHOLDER","sampleRate":100,"iKey":"'. Utils::getTestInstrumentationKey() . '","tags":{"ai.application.ver":"1.0.0.0","ai.cloud.role":"my_role_name","ai.cloud.roleInstance":"my_role_instance","ai.device.id":"my_device_id","ai.device.locale":"EN","ai.device.model":"my_device_model","ai.device.oemName":"my_device_oem_name","ai.device.osVersion":"Windows 8","ai.device.type":"PC","ai.location.ip":"127.0.0.0","ai.operation.id":"my_operation_id","ai.operation.name":"my_operation_name","ai.operation.parentId":"my_operation_parent_id","ai.session.id":"my_session_id","ai.session.isFirst":"false","ai.user.id":"my_user_id","ai.user.accountId":"my_account_id","ai.internal.sdkVersion":"SDK_VERSION_STRING"},"data":{"baseData":{"ver":2,"name":"Other","type":"OTHER","data":"Other text","duration":"00:00:00.100","success":true,"resultCode":"200","properties":{"InlineProperty":"test_value","MyCustomProperty":42,"MyCustomProperty2":"test"}},"baseType":"RemoteDependencyData"}}]', true);

        $this->assertEquals($queue, $expectedValue);

        if (Utils::sendDataToServer())
        {
            $this->_telemetryClient->flush();
        }
    }

    /**
     * Tests that sdk version can be overridden
     */
    public function testPluginCanOverrideSdkVersion()
    {
        $telemetryClient = new \ApplicationInsights\Telemetry_Client();

        $context = $telemetryClient->getContext()->getInternalContext();

        $this->assertNotNull($context);
        $this->assertNotNull($context->getSdkVersion());
        $context->setSdkVersion("version");
        $this->assertEquals("version", $context->getSdkVersion());
    }


    /**
     * Removes machine specific data from exceptions.
     * @param array $queue The queue of items
     * @return array
     */
    private function removeMachineSpecificExceptionData($queue, $maxLevel)
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

                $exception['parsedStack'] =
                    array_filter($exception['parsedStack'], function($e) use($maxLevel){
                        return $e['level'] < $maxLevel;
                    });
                
                $exception['parsedStack'] = array_combine(range(0, count($exception['parsedStack'])-1), $exception['parsedStack']);

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
            if (array_key_exists('id', $queueItem['data']['baseData']) == true)
            {
                $queueItem['data']['baseData']['id'] = 'ID_PLACEHOLDER';
            }
        }
        return $queue;
    }
}
