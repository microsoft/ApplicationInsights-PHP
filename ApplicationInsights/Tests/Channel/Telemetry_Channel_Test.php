<?php
namespace ApplicationInsights\Channel\Tests;

/**
 * Contains tests for TelemetrySender class
 */
class Telemetry_Channel_Test extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $telemetryChannel = new \ApplicationInsights\Channel\Telemetry_Channel();
        $this->assertEquals($telemetryChannel->getEndpointUrl(), 'https://dc.services.visualstudio.com/v2/track', 'Default Endpoint URL is incorrect.');
        $this->assertEquals($telemetryChannel->getQueue(), [], 'Queue should be empty by default.');
    }
    
    public function testEndpointUrl()
    {
        $telemetryChannel = new \ApplicationInsights\Channel\Telemetry_Channel();
        $telemetryChannel->setEndpointUrl('http://foo.com');
        $this->assertEquals($telemetryChannel->getEndpointUrl(), 'http://foo.com');
    }
    
    public function testQueue()
    {
        $telemetryChannel = new \ApplicationInsights\Channel\Telemetry_Channel();
        $telemetryChannel->setQueue([42, 42, 42]);
        $this->assertEquals($telemetryChannel->getQueue(), [42, 42, 42]);
    }
}
