<?php
namespace ApplicationInsights\Channel\Contracts;

/**
* Data contract class for type Page_View_Perf_Data. 
*/
class Page_View_Perf_Data extends Base_Data implements Data_Interface
{

    /**
    * Creates a new PageViewPerfData. 
    */
    function __construct()
    {
        $this->_envelopeTypeName = 'Microsoft.ApplicationInsights.PageViewPerf';
        $this->_dataTypeName = 'PageViewPerfData';
        $this->_data['ver'] = 2;
        $this->_data['name'] = NULL;
    }

    /**
    * Gets the url field. 
    */
    public function getUrl()
    {
        if (array_key_exists('url', $this->_data)) { return $this->_data['url']; }
        return NULL;
    }

    /**
    * Sets the url field. 
    */
    public function setUrl($url)
    {
        $this->_data['url'] = $url;
    }

    /**
    * Gets the perfTotal field. 
    */
    public function getPerfTotal()
    {
        if (array_key_exists('perfTotal', $this->_data)) { return $this->_data['perfTotal']; }
        return NULL;
    }

    /**
    * Sets the perfTotal field. 
    */
    public function setPerfTotal($perfTotal)
    {
        $this->_data['perfTotal'] = $perfTotal;
    }

    /**
    * Gets the name field. 
    */
    public function getName()
    {
        if (array_key_exists('name', $this->_data)) { return $this->_data['name']; }
        return NULL;
    }

    /**
    * Sets the name field. 
    */
    public function setName($name)
    {
        $this->_data['name'] = $name;
    }

    /**
    * Gets the duration field. 
    */
    public function getDuration()
    {
        if (array_key_exists('duration', $this->_data)) { return $this->_data['duration']; }
        return NULL;
    }

    /**
    * Sets the duration field. 
    */
    public function setDuration($duration)
    {
        $this->_data['duration'] = $duration;
    }

    /**
    * Gets the networkConnect field. 
    */
    public function getNetworkConnect()
    {
        if (array_key_exists('networkConnect', $this->_data)) { return $this->_data['networkConnect']; }
        return NULL;
    }

    /**
    * Sets the networkConnect field. 
    */
    public function setNetworkConnect($networkConnect)
    {
        $this->_data['networkConnect'] = $networkConnect;
    }

    /**
    * Gets the sentRequest field. 
    */
    public function getSentRequest()
    {
        if (array_key_exists('sentRequest', $this->_data)) { return $this->_data['sentRequest']; }
        return NULL;
    }

    /**
    * Sets the sentRequest field. 
    */
    public function setSentRequest($sentRequest)
    {
        $this->_data['sentRequest'] = $sentRequest;
    }

    /**
    * Gets the receivedResponse field. 
    */
    public function getReceivedResponse()
    {
        if (array_key_exists('receivedResponse', $this->_data)) { return $this->_data['receivedResponse']; }
        return NULL;
    }

    /**
    * Sets the receivedResponse field. 
    */
    public function setReceivedResponse($receivedResponse)
    {
        $this->_data['receivedResponse'] = $receivedResponse;
    }

    /**
    * Gets the id field. 
    */
    public function getId()
    {
        if (array_key_exists('id', $this->_data)) { return $this->_data['id']; }
        return NULL;
    }

    /**
    * Sets the id field. 
    */
    public function setId($id)
    {
        $this->_data['id'] = $id;
    }

    /**
    * Gets the domProcessing field. 
    */
    public function getDomProcessing()
    {
        if (array_key_exists('domProcessing', $this->_data)) { return $this->_data['domProcessing']; }
        return NULL;
    }

    /**
    * Sets the domProcessing field. 
    */
    public function setDomProcessing($domProcessing)
    {
        $this->_data['domProcessing'] = $domProcessing;
    }

    /**
    * Gets the referrerUri field. 
    */
    public function getReferrerUri()
    {
        if (array_key_exists('referrerUri', $this->_data)) { return $this->_data['referrerUri']; }
        return NULL;
    }

    /**
    * Sets the referrerUri field. 
    */
    public function setReferrerUri($referrerUri)
    {
        $this->_data['referrerUri'] = $referrerUri;
    }

    /**
    * Gets the measurements field. 
    */
    public function getMeasurements()
    {
        if (array_key_exists('measurements', $this->_data)) { return $this->_data['measurements']; }
        return NULL;
    }

    /**
    * Sets the measurements field. 
    */
    public function setMeasurements($measurements)
    {
        $this->_data['measurements'] = $measurements;
    }
}
