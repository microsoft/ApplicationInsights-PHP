<?php
namespace ApplicationInsights\Channel\Contracts;
/**
* Enum Dependency_Type.
*/
abstract class Dependency_Type
{
	const SQL = 0;
	const HTTP = 1;
	const OTHER = 2;
}
