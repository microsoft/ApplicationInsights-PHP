# Application Insights for PHP #

This project extends the Application Insights API surface to support PHP. [Application Insights](http://azure.microsoft.com/en-us/services/application-insights/) is a service that allows developers to keep their application available, performing and succeeding. This PHP module will allow you to send telemetry of various kinds (event, trace, exception, etc.) to the Application Insights service where they can be visualized in the Azure Portal. 

## Requirements ##

PHP version >=5.4.2 is supported.

For opening the project in Microsoft Visual Studio you will need [PHP Tools for Visual Studio](ADD LINK).

## Installation ##

TODO COMPOSER INSTALL

## Usage ##

Once installed, you can send telemetry to Application Insights. Here are a few samples.

>**Note**: before you can send data to you will need an instrumentation key. Please see the [Getting an Application Insights Instrumentation Key](https://github.com/Microsoft/AppInsights-Home/wiki#getting-an-application-insights-instrumentation-key) section for more information.


**Sending a simple event telemetry item**
```php
$telemetryClient = new \ApplicationInsights\Telemetry_Client();
$telemetryClient->getContext()->setInstrumentationKey('YOUR INSTRUMENTATION KEY');
$telemetryClient->trackEvent('name of your event');
$telemetryClient->flush();
```

**Sending an event telemetry item with custom properties and measurements**
```php
$telemetryClient = new \ApplicationInsights\Telemetry_Client();
$telemetryClient->getContext()->setInstrumentationKey('YOUR INSTRUMENTATION KEY');
$telemetryClient->trackEvent('name of your event', ['MyCustomProperty' => 42, 'MyCustomProperty2' => 'test'], ['duration', 42]);
$telemetryClient->flush();
```
