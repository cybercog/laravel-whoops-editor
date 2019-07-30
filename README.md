# Laravel Whoops Editor

![cog-laravel-whoops-editor](https://user-images.githubusercontent.com/1849174/34025716-77df6958-e162-11e7-858a-f2196f4e2372.png)

<p align="center">
<a href="https://travis-ci.org/cybercog/laravel-whoops-editor"><img src="https://img.shields.io/travis/cybercog/laravel-whoops-editor/master.svg?style=flat-square" alt="Build Status"></a>
<a href="https://styleci.io/repos/114317434"><img src="https://styleci.io/repos/114317434/shield" alt="StyleCI"></a>
<a href="https://github.com/cybercog/laravel-whoops-editor/releases"><img src="https://img.shields.io/github/release/cybercog/laravel-whoops-editor.svg?style=flat-square" alt="Releases"></a>
<a href="https://github.com/cybercog/laravel-whoops-editor/blob/master/LICENSE"><img src="https://img.shields.io/github/license/cybercog/laravel-whoops-editor.svg?style=flat-square" alt="License"></a>
</p>

## Introduction

Laravel Whoops Editor helps to open your code editor from exception stack trace. Go to code editor in a blink of an eye!

This feature was introduced in Laravel 5.5.25, but unfortunately has issues on Linux machines. Laravel Whoops Editor fixes PHPStorm, IDEA and SublimeText Linux support.

Additionally allows you to open editor when using Homestead.

For Atom support you can use [Mike Bronner's](https://github.com/mikebronner) [laravel-whoops-atom](https://github.com/GeneaLabs/laravel-whoops-atom) package or publish config and specify launch path in editors config section.

## Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
  - [Protocol Handlers](#protocol-handlers)
- [Change log](#change-log)
- [Contributing](#contributing)
- [Testing](#testing)
- [Security](#security)
- [Contributors](#contributors)
- [Alternatives](#alternatives)
- [License](#license)
- [About CyberCog](#about-cybercog)

## Features

- PHPStorm cross-platform support.
- IDEA cross-platform support.
- Sublime cross-platform support.
- Allow opening code editor when using Homestead.
- Following PHP Standard Recommendations:
  - [PSR-1 (Basic Coding Standard)](http://www.php-fig.org/psr/psr-1/).
  - [PSR-2 (Coding Style Guide)](http://www.php-fig.org/psr/psr-2/).
  - [PSR-4 (Autoloading Standard)](http://www.php-fig.org/psr/psr-4/).
- Covered with unit tests.

## Requirements

- PHP >= 7.0.0
- Laravel >= 5.5.25

## Installation

First, pull in the package through Composer:

```sh
$ composer require cybercog/laravel-whoops-editor --dev
```

## Configuration

Package designed to work right out of the box, but you could publish configuration file to tweak settings:

```sh
$ php artisan vendor:publish --provider="Cog\Laravel\WhoopsEditor\Providers\WhoopsEditorServiceProvider" --tag="config"
```

## Usage

Specify your editor by adding `APP_EDITOR=phpstorm` in `.env` file.

Optionally you can specify editor by adding `editor` key to the `./config/app.php` configuration file.

```php
'editor' => 'phpstorm',
```

This package provides extended Linux support for editors: `phpstorm`, `idea`, `sublime`.

Complete list of supported editors could be found in [Whoops documentation](https://github.com/filp/whoops/blob/master/docs/Open%20Files%20In%20An%20Editor.md).

### Protocol Handlers

If your OS trying to open file in web browser instead of code editor you should install Protocol Handler.

| Editor | Protocol | Linux | MacOS | Windows |
| ------ | -------- | ----- | ----- | ------- |
| SublimeText | `subl://` | [thecotne/subl-protocol](https://github.com/thecotne/subl-protocol) | - | - |
| Atom | `atm://` | [eclemens/atom-url-handler](https://github.com/eclemens/atom-url-handler) | [WizardOfOgz/atom-handler](https://github.com/WizardOfOgz/atom-handler) | - |

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Testing

Run the tests with:

```sh
$ vendor/bin/phpunit
```

## Security

If you discover any security related issues, please email open@cybercog.su instead of using the issue tracker.

## Contributors

| <a href="https://github.com/antonkomarev">![@antonkomarev](https://avatars.githubusercontent.com/u/1849174?s=110)<br />Anton Komarev</a> |
| :---: |

[Laravel Whoops Editor contributors list](../../contributors)

## Alternatives

- [GeneaLabs/laravel-whoops-atom](https://github.com/GeneaLabs/laravel-whoops-atom) 

## License

- `Laravel Whoops Editor` package is open-sourced software licensed under the [MIT License](LICENSE) by [Anton Komarev](https://komarev.com).
- `Error In Document` image licensed under [Creative Commons 3.0](https://creativecommons.org/licenses/by/3.0/us/) by Kid A.

## About CyberCog

[CyberCog](https://cybercog.ru) is a Social Unity of enthusiasts. Research best solutions in product & software development is our passion.

- [Follow us on Twitter](https://twitter.com/cybercog)
- [Read our articles on Medium](https://medium.com/cybercog)

<a href="https://cybercog.ru"><img src="https://cloud.githubusercontent.com/assets/1849174/18418932/e9edb390-7860-11e6-8a43-aa3fad524664.png" alt="CyberCog"></a>
