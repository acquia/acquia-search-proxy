# Acquia Search Proxy

This project is a web service proxy to the Acquia Search Service. It allows
developers to expose a RESTful API to end users, build administrative interfaces
for their Acquia Search indexes, etc.

## Installation

Acquia Search Proxy can be installed with [Composer](http://getcomposer.org)
by adding it as a dependency to your project's composer.json file.

```json
{
    "require": {
        "acquia/acquia-search-proxy": "*"
    }
}
```

Please refer to [Composer's documentation](https://github.com/composer/composer/blob/master/doc/00-intro.md#introduction)
for more detailed installation and usage instructions.

## Usage

Copy the `index.php.example` file to `index.php` and modify accordingly.

Acquia Search Proxy is build with the [Silex](http://silex.sensiolabs.org/)
micro framework, so the documentation applies here.
