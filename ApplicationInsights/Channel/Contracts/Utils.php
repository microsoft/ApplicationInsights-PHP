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
        $newArray = [];
        foreach ($sourceArray as $key => $value)
        {
        	if ($value == [] || $value == NULL)
            {
                continue;
            }
            $newArray[$key] = $value;
        }
        
        return $newArray;
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
}
?>