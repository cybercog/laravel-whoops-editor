# Laravel Whoops Editor

![cog-laravel-whoops-editor](https://user-images.githubusercontent.com/1849174/34024771-22500272-e15d-11e7-8694-37fce84c5c44.png)

<p align="center">
<a href="https://travis-ci.org/cybercog/laravel-whoops-editor"><img src="https://img.shields.io/travis/cybercog/laravel-whoops-editor/master.svg?style=flat-square" alt="Build Status"></a>
<a href="https://styleci.io/repos/114317434"><img src="https://styleci.io/repos/114317434/shield" alt="StyleCI"></a>
<a href="https://github.com/cybercog/laravel-whoops-editor/releases"><img src="https://img.shields.io/github/release/cybercog/laravel-whoops-editor.svg?style=flat-square" alt="Releases"></a>
<a href="https://github.com/cybercog/laravel-whoops-editor/blob/master/LICENSE"><img src="https://img.shields.io/github/license/cybercog/laravel-whoops-editor.svg?style=flat-square" alt="License"></a>
</p>

## Introduction

Laravel Whoops Editor helps to open your code editor from exception stack trace. Go to code editor in a blink of an eye!

This feature was introduced in Laravel 5.5.25, but unfortunately has issues on Linux machines.

Laravel Whoops Editor fixes PHPStorm, IDEA and SublimeText support.

For Atom support you can use [Mike Bronner's](https://github.com/mikebronner) [laravel-whoops-atom](https://github.com/GeneaLabs/laravel-whoops-atom) package.

## Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
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
- Following PHP Standard Recommendations:
  - [PSR-1 (Basic Coding Standard)](http://www.php-fig.org/psr/psr-1/).
  - [PSR-2 (Coding Style Guide)](http://www.php-fig.org/psr/psr-2/).
  - [PSR-4 (Autoloading Standard)](http://www.php-fig.org/psr/psr-4/).
- Covered with unit tests.

## Requirements

- PHP >= 7.0.0
- Laravel >= 5.5.25

#### Sublime editor

If you are using Sublime you should install [Sublime Protocol Handler](https://github.com/thecotne/subl-protocol).

## Installation

First, pull in the package through Composer:

```sh
$ composer require cybercog/laravel-whoops-editor --dev
```

## Usage

Specify your editor by adding `editor` key to the `./config/app.php` configuration file.

```php
'editor' => 'phpstorm',
```

This package provides updated editors support for: `phpstorm`, `idea`, `sublime`.

Complete list of supported editors could be found in [Whoops documentation](https://github.com/filp/whoops/blob/master/docs/Open%20Files%20In%20An%20Editor.md).

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

| <a href="https://github.com/a-komarev">![@a-komarev](https://avatars.githubusercontent.com/u/1849174?s=110)<br />Anton Komarev</a> |
| :---: |

[Laravel Whoops Editor contributors list](../../contributors)

## Alternatives

- [GeneaLabs/laravel-whoops-atom](https://github.com/GeneaLabs/laravel-whoops-atom) 

## License

- `Laravel Whoops Editor` package is open-sourced software licensed under the [MIT License](LICENSE).

## About CyberCog

[CyberCog](http://www.cybercog.ru) is a Social Unity of enthusiasts. Research best solutions in product & software development is our passion.

- [Follow us on Twitter](https://twitter.com/cybercog)
- [Read our articles on Medium](https://medium.com/cybercog)

<a href="http://cybercog.ru"><img src="https://cloud.githubusercontent.com/assets/1849174/18418932/e9edb390-7860-11e6-8a43-aa3fad524664.png" alt="CyberCog"></a>
