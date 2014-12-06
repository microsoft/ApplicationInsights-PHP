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
}
?>