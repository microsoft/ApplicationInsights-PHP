<?php
namespace ApplicationInsights\Tests;
use ApplicationInsights\TelemetryClient;

/**
 * Contains tests for TelemetryClient class
 */
class TelemetryClientTest extends \PHPUnit_Framework_TestCase
{
    public function testCurrent()
    {
        $telemetryClient = new TelemetryClient();
        $telemetryClient->track_event("myEvent");
    }
}

?>
