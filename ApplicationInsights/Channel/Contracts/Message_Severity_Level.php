<?php
namespace ApplicationInsights\Channel\Contracts;
/**
* Enum Message_Severity_Level.
*/
abstract class Message_Severity_Level
{
	const VERBOSE = 'Verbose';
	const INFORMATION = 'Information';
	const WARNING = 'Warning';
	const ERROR = 'Error';
	const CRITICAL = 'Critical';
}
