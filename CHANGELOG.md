# Changelog

## 0.4.4

- Updated to the latest schemas. Few properties are no longer available.
- Enum `Dependency_Type` and `async` argument of `TrackDependency` were removed. 

## 0.4.3

- Support tracking Throwable and Error, not only Exceptions.
- Support for internal context and override of SDK version.
- Fix duration serialization for `trackPageView` call.
- Do not send `User-Agent` when uploading telemetry to avoid misclassification of server telemetry as client telemetry.

## 0.4.2

- Changelog started after this version.