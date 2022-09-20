# Laravel Google Sheets API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laraditz/google-sheets.svg?style=flat-square)](https://packagist.org/packages/laraditz/google-sheets)
[![Total Downloads](https://img.shields.io/packagist/dt/laraditz/google-sheets.svg?style=flat-square)](https://packagist.org/packages/laraditz/google-sheets)
![GitHub Actions](https://github.com/laraditz/google-sheets/actions/workflows/main.yml/badge.svg)

A simple wrapper for Google Sheets API V4.

## Installation

You can install the package via composer:

```bash
composer require laraditz/google-sheets
```

## Setup
1. This api uses Authentication with Service Accounts. Follow the instructions to [Create a Service Account](docs/oauth-server.md#creating-a-service-account).
2. Download the JSON credentials.
3. By default the path to the credentials is at storage `app/credentials.json`. You can set your own path by overwrite the value through `GOOGLE_SHEETS_AUTH_CONFIG` env.
4. There are also other `.env` value that you can overwrite to suites your need as below:-
```
GOOGLE_SHEETS_APP_NAME="Google Sheets"
GOOGLE_SHEETS_ACCESS_TYPE=offline
GOOGLE_SHEETS_AUTH_CONFIG="app/credentials.json"
```

## Usage

```php
$spreadsheetId = "XXxXXxXXXXXx_XXxXXxXXXXXx_XXxXXxXXXXXx"; // this will be your spreadsheet ID
$range = "Sheet 1"; // here we use the name of the Sheet to get all the rows

// read all the rows of given sheet, sheet will return a Collection and you may use any of Collection method such as all(), toArray(), etc
$sheets = app('google-sheets')->spreadsheet($spreadsheetId)->sheet($range)->all();
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email raditzfarhan@gmail.com instead of using the issue tracker.

## Credits

-   [Raditz Farhan](https://github.com/laraditz)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Package Dependencies

This package depends on [https://github.com/googleapis/google-api-php-client](https://github.com/googleapis/google-api-php-client)
