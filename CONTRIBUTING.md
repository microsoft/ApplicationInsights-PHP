# How to Contribute

If you're interested in contributing, take a look at the general [contributor's guide](https://github.com/Microsoft/ApplicationInsights-Home/blob/master/CONTRIBUTING.md) first.

## Build and Unit Test

Unit tests uses `phpunit`. You'd need to install dependencies using composer.

From the root folder:

```
brew install composer
composer install
composer selfupdate

brew install phpunit
phpunit -c phpunit.xml Tests/
```

## Code of conduct

This project has adopted the [Microsoft Open Source Code of Conduct](https://opensource.microsoft.com/codeofconduct/). For more information see the [Code of Conduct FAQ](https://opensource.microsoft.com/codeofconduct/faq/) or contact [opencode@microsoft.com](mailto:opencode@microsoft.com) with any additional questions or comments.