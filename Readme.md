# Laravel 5 package for generating route classes.

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

Helps cleaning up those long route files.

## Contents

- [Installation](#installation)
- [Usage](#usage)

<a name="installation" />

## Installation

## For Laravel ~5

    composer require sasin91/laravel-routes



Add the following service provider in your `providers` array, in your `config/app.php`

    \Sasin91\LaravelRoutes\LaravelRouteServiceProvider::class,

**And you are ready to go.**

<a name="usage" />

## Usage
    ```php artisan make:route {name}```