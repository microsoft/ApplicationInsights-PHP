<?php 
namespace ApplicationInsights\Channel\Contracts; 

abstract class Message_Severity_Level 
{ 
	const VERBOSE = Severity_Level::Verbose; 
	const INFORMATION = Severity_Level::Information; 
	const WARNING = Severity_Level::Warning; 
	const ERROR = Severity_Level::Error; 
	const CRITICAL = Severity_Level::Critical; 
} 