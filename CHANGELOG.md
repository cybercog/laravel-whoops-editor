# Changelog

All notable changes to `laravel-whoops-editor` will be documented in this file.

## [3.0.0] - 2017-12-15

### Fixed

- Use default config if `whoops-editor.editors` not found
- PHP 7.0 support

### Changed

- `resolveEditor` method not require config argument
- `resolveFilePath` method not require config argument

## [2.0.0] - 2017-12-15

### Added

- `APP_EDITOR` environment variable

### Changed

- `overwriteConfig` method renamed to `overwriteAppConfig` in `WhoopsEditorServiceProvider`

## 1.0.0 - 2017-12-15

### Added

- Linux support for IntelliJ PHPStorm
- Linux support for IntelliJ IDEA
- Linux support for SublimeText

[3.0.0]: https://github.com/cybercog/laravel-whoops-editor/compare/2.0.0...3.0.0
[2.0.0]: https://github.com/cybercog/laravel-whoops-editor/compare/1.0.0...2.0.0
