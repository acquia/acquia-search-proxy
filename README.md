# Acquia Search Proxy

This project is a web service proxy to the Acquia Search Service. It allows
developers to expose a RESTful API to end users, build administrative interfaces
for their Acquia Search indexes, etc.

## Installation

*NOTE:* This project requires PHP >= 5.3.3

* Run `php composer.phar install` in the project's root directory
  * Refer to [Composer's documentation](https://github.com/composer/composer/blob/master/doc/00-intro.md#introduction) for more details.
* Choose a configuration file directory (referred to as `CONF_DIR` below)
  * The `./conf` directory in the project's root can be used
* Run the command line tool to authenticate the indexes you want to use
  * `./bin/acquia-search-proxy indexes:auth CONF_DIR/indexes.json`
* Copy `./conf/conf.yml.dist` to `CONF_DIR/conf.yml` and modify accordingly
  * Set `acquia.search.proxy.auth_file` to `CONF_DIR/indexes.json`
* Copy `index.php.example` file to `index.php` and modify accordingly

Acquia Search Proxy is build with the [Silex](http://silex.sensiolabs.org/)
micro framework, so the documentation applies here.

Refer to the [Acquia SDK for PHP](http://github.com/cpliakas/acquia-sdk-php) and
[PSolr](http://github.com/cpliakas/psolr) projects for code examples.
