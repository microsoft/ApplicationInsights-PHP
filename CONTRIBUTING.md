# How to Contribute

If you're interested in contributing, take a look at the general [contributor's
guide](https://github.com/Microsoft/ApplicationInsights-Home/blob/master/CONTRIBUTING.md)
first.

## Build and Unit Test

Unit tests uses `phpunit`. You'd need to install dependencies using composer.

From the root folder:

``` sh
brew install composer
composer install
composer selfupdate

brew install phpunit
phpunit -c phpunit.xml Tests/
```

When submitting PR - make sure to include description of a change in
[CHANGELOG.md](CHANGELOG.md). This will help produce release notes.

## Releasing of a new version (for maintainers only)

1. Create a release tag. Make sure tag name is incremented version from the
   previous release. Use [CHANGELOG.md](CHANGELOG.md) for release description.
2. [Packagist.org](https://packagist.org/packages/microsoft/application-insights)
   will pick up the new version from tags.
3. Bump versions in [CHANGELOG.md](CHANGELOG.md) and
   [Telemetry_Context.php](ApplicationInsights/Telemetry_Context.php).

## Code of conduct

This project has adopted the [Microsoft Open Source Code of
Conduct](https://opensource.microsoft.com/codeofconduct/). For more information
see the [Code of Conduct
FAQ](https://opensource.microsoft.com/codeofconduct/faq/) or contact
[opencode@microsoft.com](mailto:opencode@microsoft.com) with any additional
questions or comments.