<?php
namespace ApplicationInsights\Channel\Contracts;
/**
*  
* THIS FILE IS AUTO-GENERATED.  
* Please do not edit manually. 
*  
* Use script at <root>/Schema/generateSchema.ps1 
*  
*/

/**
* Data contract class for type Page_View_Perf_Data. An instance of PageViewPerf represents: a page view with no performance data, a page view with performance data, or just the performance data of an earlier page request. 
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
    * Gets the ver field. Schema version 
    */
    public function getVer()
    {
        if (array_key_exists('ver', $this->_data)) { return $this->_data['ver']; }
        return NULL;
    }

    /**
    * Sets the ver field. Schema version 
    */
    public function setVer($ver)
    {
        $this->_data['ver'] = $ver;
    }

    /**
    * Gets the url field. Request URL with all query string parameters 
    */
    public function getUrl()
    {
        if (array_key_exists('url', $this->_data)) { return $this->_data['url']; }
        return NULL;
    }

    /**
    * Sets the url field. Request URL with all query string parameters 
    */
    public function setUrl($url)
    {
        $this->_data['url'] = $url;
    }

    /**
    * Gets the perfTotal field. Performance total in TimeSpan 'G' (general long) format: d:hh:mm:ss.fffffff 
    */
    public function getPerfTotal()
    {
        if (array_key_exists('perfTotal', $this->_data)) { return $this->_data['perfTotal']; }
        return NULL;
    }

    /**
    * Sets the perfTotal field. Performance total in TimeSpan 'G' (general long) format: d:hh:mm:ss.fffffff 
    */
    public function setPerfTotal($perfTotal)
    {
        $this->_data['perfTotal'] = $perfTotal;
    }

    /**
    * Gets the name field. Event name. Keep it low cardinality to allow proper grouping and useful metrics. 
    */
    public function getName()
    {
        if (array_key_exists('name', $this->_data)) { return $this->_data['name']; }
        return NULL;
    }

    /**
    * Sets the name field. Event name. Keep it low cardinality to allow proper grouping and useful metrics. 
    */
    public function setName($name)
    {
        $this->_data['name'] = $name;
    }

    /**
    * Gets the duration field. Request duration in format: DD.HH:MM:SS.MMMMMM. For a page view (PageViewData), this is the duration. For a page view with performance information (PageViewPerfData), this is the page load time. Must be less than 1000 days. 
    */
    public function getDuration()
    {
        if (array_key_exists('duration', $this->_data)) { return $this->_data['duration']; }
        return NULL;
    }

    /**
    * Sets the duration field. Request duration in format: DD.HH:MM:SS.MMMMMM. For a page view (PageViewData), this is the duration. For a page view with performance information (PageViewPerfData), this is the page load time. Must be less than 1000 days. 
    */
    public function setDuration($duration)
    {
        $this->_data['duration'] = $duration;
    }

    /**
    * Gets the networkConnect field. Network connection time in TimeSpan 'G' (general long) format: d:hh:mm:ss.fffffff 
    */
    public function getNetworkConnect()
    {
        if (array_key_exists('networkConnect', $this->_data)) { return $this->_data['networkConnect']; }
        return NULL;
    }

    /**
    * Sets the networkConnect field. Network connection time in TimeSpan 'G' (general long) format: d:hh:mm:ss.fffffff 
    */
    public function setNetworkConnect($networkConnect)
    {
        $this->_data['networkConnect'] = $networkConnect;
    }

    /**
    * Gets the sentRequest field. Sent request time in TimeSpan 'G' (general long) format: d:hh:mm:ss.fffffff 
    */
    public function getSentRequest()
    {
        if (array_key_exists('sentRequest', $this->_data)) { return $this->_data['sentRequest']; }
        return NULL;
    }

    /**
    * Sets the sentRequest field. Sent request time in TimeSpan 'G' (general long) format: d:hh:mm:ss.fffffff 
    */
    public function setSentRequest($sentRequest)
    {
        $this->_data['sentRequest'] = $sentRequest;
    }

    /**
    * Gets the receivedResponse field. Received response time in TimeSpan 'G' (general long) format: d:hh:mm:ss.fffffff 
    */
    public function getReceivedResponse()
    {
        if (array_key_exists('receivedResponse', $this->_data)) { return $this->_data['receivedResponse']; }
        return NULL;
    }

    /**
    * Sets the receivedResponse field. Received response time in TimeSpan 'G' (general long) format: d:hh:mm:ss.fffffff 
    */
    public function setReceivedResponse($receivedResponse)
    {
        $this->_data['receivedResponse'] = $receivedResponse;
    }

    /**
    * Gets the id field. Identifier of a page view instance. Used for correlation between page view and other telemetry items. 
    */
    public function getId()
    {
        if (array_key_exists('id', $this->_data)) { return $this->_data['id']; }
        return NULL;
    }

    /**
    * Sets the id field. Identifier of a page view instance. Used for correlation between page view and other telemetry items. 
    */
    public function setId($id)
    {
        $this->_data['id'] = $id;
    }

    /**
    * Gets the domProcessing field. DOM processing time in TimeSpan 'G' (general long) format: d:hh:mm:ss.fffffff 
    */
    public function getDomProcessing()
    {
        if (array_key_exists('domProcessing', $this->_data)) { return $this->_data['domProcessing']; }
        return NULL;
    }

    /**
    * Sets the domProcessing field. DOM processing time in TimeSpan 'G' (general long) format: d:hh:mm:ss.fffffff 
    */
    public function setDomProcessing($domProcessing)
    {
        $this->_data['domProcessing'] = $domProcessing;
    }

    /**
    * Gets the referrerUri field. Fully qualified page URI or URL of the referring page; if unknown, leave blank. 
    */
    public function getReferrerUri()
    {
        if (array_key_exists('referrerUri', $this->_data)) { return $this->_data['referrerUri']; }
        return NULL;
    }

    /**
    * Sets the referrerUri field. Fully qualified page URI or URL of the referring page; if unknown, leave blank. 
    */
    public function setReferrerUri($referrerUri)
    {
        $this->_data['referrerUri'] = $referrerUri;
    }

    /**
    * Gets the properties field. Collection of custom properties. 
    */
    public function getProperties()
    {
        if (array_key_exists('properties', $this->_data)) { return $this->_data['properties']; }
        return NULL;
    }

    /**
    * Sets the properties field. Collection of custom properties. 
    */
    public function setProperties($properties)
    {
        $this->_data['properties'] = $properties;
    }

    /**
    * Gets the measurements field. Collection of custom measurements. 
    */
    public function getMeasurements()
    {
        if (array_key_exists('measurements', $this->_data)) { return $this->_data['measurements']; }
        return NULL;
    }

    /**
    * Sets the measurements field. Collection of custom measurements. 
    */
    public function setMeasurements($measurements)
    {
        $this->_data['measurements'] = $measurements;
    }
}
