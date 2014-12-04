<?php
namespace ApplicationInsights\Channel\Contracts;

/**
 * Contains utilities for contract classes
 */
class Utils
{
    /**
     * Removes NULL and empty collections
     * @param array $source_array 
     * @return array
     */
    public static function remove_empty_value($source_array)
    {
        $newArray = [];
        foreach ($source_array as $key => $value)
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