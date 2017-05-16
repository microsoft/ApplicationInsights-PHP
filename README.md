# Application Insights for PHP #

This project extends the Application Insights API surface to support PHP. [Application Insights](http://azure.microsoft.com/en-us/services/application-insights/) is a service that allows developers to keep their application available, performing and succeeding. This PHP module will allow you to send telemetry of various kinds (event, trace, exception, etc.) to the Application Insights service where they can be visualized in the Azure Portal.

## Requirements ##

PHP version >=5.4.2 is supported.

For opening the project in Microsoft Visual Studio you will need [PHP Tools for Visual Studio](http://www.devsense.com/products/php-tools). This is not required however.

## Installation ##

We've published a package you can find on [Packagist](https://packagist.org/packages/microsoft/application-insights). In order to use it, first, you'll need to get [Composer](https://getcomposer.org/).

Once you've setup your project to use Composer, just add a reference to our package with whichever version you'd like to use to your composer.json file.

```json
require: "microsoft/application-insights": "*"
```

Make sure you add the require statement to pull in the library:

```php
require_once 'vendor/autoload.php';
```

## Usage ##

Once installed, you can send telemetry to Application Insights. Here are a few samples.

>**Note**: before you can send data to you will need an instrumentation key. Please see the [Getting an Application Insights Instrumentation Key](https://github.com/Microsoft/AppInsights-Home/wiki#getting-an-application-insights-instrumentation-key) section for more information.


**Initializing the client and setting the instrumentation key**
```php
$telemetryClient = new \ApplicationInsights\Telemetry_Client();
$telemetryClient->getContext()->setInstrumentationKey('YOUR INSTRUMENTATION KEY');
$telemetryClient->trackEvent('name of your event');
$telemetryClient->flush();
```

**Sending a simple event telemetry item with event name**
```php
$telemetryClient->trackEvent('name of your event');
$telemetryClient->flush();
```

**Sending an event telemetry item with custom properties and measurements**
```php
$telemetryClient->trackEvent('name of your event', ['MyCustomProperty' => 42, 'MyCustomProperty2' => 'test'], ['duration', 42]);
$telemetryClient->flush();
```

**Sending more than one telemetry item before sending to the service is also supported; the API will batch everything until you call flush()**
```php
$telemetryClient->trackEvent('name of your event');
$telemetryClient->trackEvent('name of your second event');
$telemetryClient->flush();
```

**Sending a simple page view telemetry item with page name and url**
```php
$telemetryClient->trackPageView('myPageView', 'http://www.foo.com');
$telemetryClient->flush();
```

**Sending a page view telemetry item with duration, custom properties and measurements**
```php
$telemetryClient->trackPageView('myPageView', 'http://www.foo.com', 256, ['InlineProperty' => 'test_value'], ['duration' => 42.0]);
$telemetryClient->flush();
```

**Sending a simple metric telemetry item with metric name and value***
```php
$telemetryClient->trackMetric('myMetric', 42.0);
$telemetryClient->flush();
```

**Sending a metric telemetry item with point type, count, min, max, standard deviation and measurements**
```php
$telemetryClient->trackMetric('myMetric', 42.0, \ApplicationInsights\Channel\Contracts\Data_Point_Type::Aggregation, 5, 0, 1, 0.2, ['InlineProperty' => 'test_value']);
$telemetryClient->flush();
```

**Sending a simple message telemetry item with message***
```php
$telemetryClient->trackMessage('myMessage', \ApplicationInsights\Channel\Contracts\Message_Severity_Level::INFORMATION, ['InlineProperty' => 'test_value']);
$telemetryClient->flush();
```

**Sending a simple request telemetry item with request name, url and start time***
```php
$telemetryClient->trackRequest('myRequest', 'http://foo.bar', time());
$telemetryClient->flush();
```

**Sending a request telemetry item with duration, http status code, whether or not the request succeeded, custom properties and measurements**
```php
$telemetryClient->trackRequest('myRequest', 'http://foo.bar', time(), 3754, 200, true, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);
$telemetryClient->flush();
```

**Sending an exception telemetry, with custom properties and metrics**
```php
try
{
    // Do something to throw an exception
}
catch (\Exception $ex)
{
    $telemetryClient->trackException($ex, ['InlineProperty' => 'test_value'], ['duration_inner' => 42.0]);
	$telemetryClient->flush();
}

```

**Registering an exception handler**
```php
class Handle_Exceptions
{
    private $_telemetryClient;

    public function __construct()
    {
        $this->_telemetryClient = new \ApplicationInsights\Telemetry_Client();
		$this->_telemetryClient->getContext()->setInstrumentationKey('YOUR INSTRUMENTATION KEY');

        set_exception_handler(array($this, 'exceptionHandler'));
    }

    function exceptionHandler(\Exception $exception)
    {
        if ($exception != NULL)
        {
            $this->_telemetryClient->trackException($exception);
            $this->_telemetryClient->flush();
        }
    }
}
```

**Sending a successful SQL dependency telemetry item**
```php
$telemetryClient->trackDependency('MySQL', \ApplicationInsights\Channel\Contracts\Dependency_Type::OTHER, 'SELECT * FROM table;', time(), 122, true);
$telemetryClient->flush();
```

**Sending a failed HTTP dependency telemetry item**
```php
$telemetryClient->trackDependency('http://example.com/api/method', \ApplicationInsights\Channel\Contracts\Dependency_Type::HTTP, null, time(), 324, false, 503);
$telemetryClient->flush();
```

**Sending any other kind dependency telemetry item**
```php
$telemetryClient->trackDependency('Whatever Service', \ApplicationInsights\Channel\Contracts\Dependency_Type::OTHER, 'Service Command', time(), 23, true);
$telemetryClient->flush();
```
