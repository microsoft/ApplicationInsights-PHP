<?php
namespace ApplicationInsights\Channel\Contracts;

/**
 * Contains utilities for contract classes
 */
class Utils
{
    /**
     * Removes NULL and empty collections
     * @param array $sourceArray 
     * @return array
     */
    public static function removeEmptyValues($sourceArray)
    {
        $newArray = array();
        foreach ($sourceArray as $key => $value)
        {
        	if ((is_array($value) && sizeof($value) == 0) || ($value == NULL && is_bool($value) == false))
            {
                continue;
            }
            $newArray[$key] = $value;
        }
        
        return $newArray;
    }
    
    /**
     * Serialization helper.
     * @param array Items to serialize 
     * @return array JSON serialized items, nested
     */
    public static function getUnderlyingData($dataItems)
    {
        $queueToEncode = array();
        foreach ($dataItems as $key => $dataItem)
        {
        	if (is_object($dataItem) && method_exists($dataItem, 'jsonSerialize') == true)
            {
                $queueToEncode[$key] = Utils::getUnderlyingData($dataItem->jsonSerialize());
            }
            else if (is_array($dataItem))
            {
                $queueToEncode[$key] = Utils::getUnderlyingData($dataItem);
            }
            else
            {
                $queueToEncode[$key] = $dataItem;
            }
        }
        
        return $queueToEncode;
    }
    
    /**
     * Converts milliseconds to a timespan string as accepted by the backend
     * @param int $milliseconds 
     * @return string
     */
    public static function convertMillisecondsToTimeSpan($milliseconds)
    {
        if ($milliseconds == NULL || $milliseconds < 0) 
        {
            $milliseconds = 0;
        }

        $ms = $milliseconds % 1000;
        $sec = floor($milliseconds / 1000) % 60;
        $min = floor($milliseconds / (1000 * 60)) % 60;
        $hour = floor($milliseconds / (1000 * 60 * 60)) % 24;
        
        $ms = strlen($ms) == 1 ? '00' . $ms : (strlen($ms) === 2 ? "0" . $ms : $ms);
        $sec = strlen($sec) < 2 ? '0' . $sec : $sec;
        $min = strlen($min) < 2 ? '0' . $min : $min;
        $hour = strlen($hour) < 2 ? '0' . $hour : $hour;
        
        return $hour . ":" . $min . ":" . $sec . "." . $ms;
    }
    
    /**
     * Returns the proper ISO string for Application Insights service to accept.
     * @param mixed $time 
     * @return string
     */
    public static function returnISOStringForTime($time = null)
    {
        if ($time == NULL)
        {
            return gmdate('c') . 'Z';
        }
        else
        {
            return gmdate('c', $time) . 'Z';
        }
    }
    
    /**
     * Returns a Guid on all flavors of PHP. Copied from the PHP manual: http://php.net/manual/en/function.com-create-guid.php
     * @return mixed
     */
    public static function returnGuid()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

    }
}
