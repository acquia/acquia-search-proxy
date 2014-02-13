# Acquia Search Proxy

[![Build Status](https://travis-ci.org/acquia/acquia-search-proxy.png)](https://travis-ci.org/acquia/acquia-search-proxy)
[![Coverage Status](https://coveralls.io/repos/acquia/acquia-search-proxy/badge.png?branch=master)](https://coveralls.io/r/acquia/acquia-search-proxy?branch=master)
[![Total Downloads](https://poser.pugx.org/acquia/acquia-search-proxy/downloads.png)](https://packagist.org/packages/acquia/acquia-search-proxy)
[![Latest Stable Version](https://poser.pugx.org/acquia/acquia-search-proxy/v/stable.png)](https://packagist.org/packages/acquia/acquia-search-proxy)

This project is a web services proxy to the Acquia Search Service. It allows
developers to expose a RESTful API to end users, build administrative interfaces,
etc.

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
