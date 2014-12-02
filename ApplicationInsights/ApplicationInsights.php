<?php
namespace ApplicationInsights;

/**
 * Handles loading of classes needed for ApplicationInsights SDK.
 * @param string $pClassName 
 */
function autoLoadClasses($pClassName) {
    include($pClassName . ".php");
}
spl_autoload_register("ApplicationInsights\autoLoadClasses");

?>