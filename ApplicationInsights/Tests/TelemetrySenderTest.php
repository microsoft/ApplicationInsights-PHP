<?php
namespace ApplicationInsights\Tests;
use ApplicationInsights\Channel\TelemetrySender;

/**
 * Contains tests for TelemetrySender class
 */
class TelemetrySenderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verifies the object is constructed properly.
     */
    public function testConstructor()
    {
        $telemetrySender = new TelemetrySender();
        $this->assertEquals($telemetrySender->getEndpointURL(), 'http://dc.services.visualstudio.com/v2/track', 'Default Endpoint URL is incorrect.');
        $this->assertEquals($telemetrySender->getQueue(), [], 'Queue should be empty by default.');
        $this->assertEquals($telemetrySender->getVerificationCallback(), NULL, 'Callback should be NULL by default.');
    }
}

?>
