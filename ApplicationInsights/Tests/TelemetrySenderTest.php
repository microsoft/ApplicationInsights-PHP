<?php
namespace ApplicationInsights\Tests;
use ApplicationInsights\Channel\TelemetrySender;
use ApplicationInsights\Channel\Envelope;

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
    
    public function telemetrySenderCallback($encodedItem)
    {
        echo $encodedItem;
    }
    
    public function testCurrent()
    {
        $envelope = new Envelope();
        $envelope->setIKey('f22d426f-57e2-47c3-9668-c58013a26eb4');
        $telemetrySender = new TelemetrySender();
        $telemetrySender->setVerificationCallback(array($this, 'telemetrySenderCallback'));
        $telemetrySender->send($envelope);
    }
}

?>
