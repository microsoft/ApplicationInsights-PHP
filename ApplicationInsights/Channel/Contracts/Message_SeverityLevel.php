<?php
namespace ApplicationInsights\Channel\Contracts;
/**
* Enum Message_SeverityLevel.
*/
abstract class Message_SeverityLevel
{
	const VERBOSE = 'Verbose';
	const INFORMATION = 'Information';
	const WARNING = 'Warning';
	const ERROR = 'Error';
	const CRITICAL = 'Critical';
}
