# Code highlighting with Shiki in PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mallardduck/prettier-php-runner.svg?style=flat-square)](https://packagist.org/packages/mallardduck/prettier-php-runner)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/mallardduck/prettier-php-runner/Tests)](https://github.com/mallardduck/prettier-php-runner/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/mallardduck/prettier-php-runner/Check%20&%20fix%20styling?label=code%20style)](https://github.com/mallardduck/prettier-php-runner/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/mallardduck/prettier-php-runner.svg?style=flat-square)](https://packagist.org/packages/mallardduck/prettier-php-runner)

[Prettier](https://github.com/prettier/prettier) is an opinionated code formatter based on NodeJS that supports a variety of languages.
Now you can use the power of Prettier with your PHP projects too!

```php
\MallardDuck\PrettierPhp\PrettierHtml::format(
    code: '<?php echo "Hello World"; ?>',
);
```

## Installation

You can install the package via composer:

```bash
composer require mallardduck/prettier-php
```

In your project, you should have the JavaScript package [`prettier`](https://github.com/prettier/prettier) installed. You can install it via npm...

```bash
npm install prettier
```

... or Yarn.

```bash
yarn add prettier
```

Make sure you have installed Node 10 or higher.

## Usage

Here's an example where we are going to highlight some PHP code.

```php
use Spatie\ShikiPhp\Prettier;

PrettierHtml::format(
    '<html><body><div><h1>Heading</h1></div></body></html>'
);
```

The output is this chunk of HTML which will render beautifully in the browser:

```html
<html>
    <body>
        <div><h1>Heading</h1></div>
    </body>
</html>
```

## Using Node Version Manager

Under the hood, this package will run a node command beautify your HTML input.

If you use NVM during development, then the package will be unlikely to find your version of node as it 
looks for the node executable in `/usr/local/bin` and `/opt/homebrew/bin`. 
If this is the case for you, then you should create a symlink between the node distributable in your NVM folder.

Such a command might look like this:

```bash
sudo ln -s /home/some-user/.nvm/versions/node/v17.3.1/bin/node /usr/local/bin/node
```

Creating this symlink will allow the package to find your NPM executable. Please note, if you change
your NPM version you will have to update your symlinks accordingly.

## Testing

You can run all the tests with this command:

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
