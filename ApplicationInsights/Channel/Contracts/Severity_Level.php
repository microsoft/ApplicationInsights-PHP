<?php
namespace ApplicationInsights\Channel\Contracts;
/**
* Enum Severity_Level. 
*/
abstract class Severity_Level
{
    const Verbose = 0;
    const Information = 1;
    const Warning = 2;
    const Error = 3;
    const Critical = 4;
}
