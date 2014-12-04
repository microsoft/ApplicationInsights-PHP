<?php
namespace ApplicationInsights\Tests;

/**
 * Contains tests for TelemetrySender class
 */
class TelemetryChannelTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verifies the object is constructed properly.
     */
    public function test_constructor()
    {
        $telemetry_channel = new \ApplicationInsights\Channel\TelemetryChannel();
        $this->assertEquals($telemetry_channel->get_endpoint_url(), 'http://dc.services.visualstudio.com/v2/track', 'Default Endpoint URL is incorrect.');
        $this->assertEquals($telemetry_channel->get_queue(), [], 'Queue should be empty by default.');
    }
}

?>
