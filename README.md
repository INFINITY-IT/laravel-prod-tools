# Laravel Prod Tools

[![](http://poser.pugx.org/infinity-it/laravel-prod-tools/v)](https://packagist.org/packages/infinity-it/laravel-prod-tools)
[![Total Downloads](http://poser.pugx.org/infinity-it/laravel-prod-tools/downloads)](https://packagist.org/packages/infinity-it/laravel-prod-tools)
[![Latest Unstable Version](http://poser.pugx.org/infinity-it/laravel-prod-tools/v/unstable)](https://packagist.org/packages/infinity-it/laravel-prod-tools)
[![License](http://poser.pugx.org/infinity-it/laravel-prod-tools/license)](https://packagist.org/packages/infinity-it/laravel-prod-tools)

## Packages

|                                                                                                         |                                                                                                                                         |
|---------------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------|
| [anhskohbo/no-captcha](https://packagist.org/packages/anhskohbo/no-captcha)                             | ![](http://poser.pugx.org/anhskohbo/no-captcha/v) ![](http://poser.pugx.org/anhskohbo/no-captcha/downloads)                             |
| [cviebrock/eloquent-sluggable](https://packagist.org/packages/cviebrock/eloquent-sluggable)             | ![](http://poser.pugx.org/cviebrock/eloquent-sluggable/v) ![](http://poser.pugx.org/cviebrock/eloquent-sluggable/downloads)             |
| [diglactic/laravel-breadcrumbs](https://packagist.org/packages/diglactic/laravel-breadcrumbs)           | ![](http://poser.pugx.org/diglactic/laravel-breadcrumbs/v) ![](http://poser.pugx.org/diglactic/laravel-breadcrumbs/downloads)           |
| [ecrmnn/laravel-https](https://packagist.org/packages/ecrmnn/laravel-https)                             | ![](http://poser.pugx.org/ecrmnn/laravel-https/v) ![](http://poser.pugx.org/ecrmnn/laravel-https/downloads)                             |
| [intervention/image](https://packagist.org/packages/intervention/image)                                 | ![](http://poser.pugx.org/intervention/image/v) ![](http://poser.pugx.org/intervention/image/downloads)                                 |
| [jorenvanhocht/laravel-share](https://packagist.org/packages/jorenvanhocht/laravel-share)               | ![](http://poser.pugx.org/jorenvanhocht/laravel-share/v) ![](http://poser.pugx.org/jorenvanhocht/laravel-share/downloads)               |
| [laravel/ui](https://packagist.org/packages/laravel/ui)                                                 | ![](http://poser.pugx.org/laravel/ui/v) ![](http://poser.pugx.org/laravel/ui/downloads)                                                 |
| [mcamara/laravel-localization](https://packagist.org/packages/mcamara/laravel-localization)             | ![](http://poser.pugx.org/mcamara/laravel-localization/v) ![](http://poser.pugx.org/mcamara/laravel-localization/downloads)             |
| [redcenter/laravel-non-www-redirect](https://packagist.org/packages/redcenter/laravel-non-www-redirect) | ![](http://poser.pugx.org/redcenter/laravel-non-www-redirect/v) ![](http://poser.pugx.org/redcenter/laravel-non-www-redirect/downloads) |
| [spatie/laravel-medialibrary](https://packagist.org/packages/spatie/laravel-medialibrary)               | ![](http://poser.pugx.org/spatie/laravel-medialibrary/v) ![](http://poser.pugx.org/spatie/laravel-medialibrary/downloads)               |
| [spatie/laravel-translatable](https://packagist.org/packages/spatie/laravel-translatable)               | ![](http://poser.pugx.org/spatie/laravel-translatable/v) ![](http://poser.pugx.org/spatie/laravel-translatable/downloads)               |

## Install

The recommended way to install this is through composer:

```bash
composer require "infinity-it/laravel-prod-tools:1.0.0"
```

## Laravel Force SSL

<details>
<summary><b>using <code>ecrmnn/laravel-https</code></b></summary>

- Add under `providers` in `config/app.php`
    ```php
    /*
     * Package Service Providers...
     */
    \Ecrmnn\LaravelHttps\Providers\ServiceProvider::class,
    ```

- **Register the middleware as a global middleware in :**
    - **Laravel 10** and below: `App\Http\Kernel.php`
        ```php
          protected $middleware = [
              ...
              \Ecrmnn\LaravelHttps\Http\Middleware\ForceHttps::class,
          ];
        ```
    - **Laravel 11** and above : `bootstrap/app.php`
        ```php
        ->withMiddleware(function (Middleware $middleware) {
          $middleware->use([
              ...
              \Ecrmnn\LaravelHttps\Http\Middleware\ForceHttps::class,
          ])
        ```

- **Update** the following in your `.env`:  
  :warning: *HTTPS will only be forced when `env('HTTPS')` is set to `true`* :warning:
  ```dotenv
  # used by ecrmnn/laravel-https
  HTTPS=true
  ```

</details>

## Laravel non-WWW Redirect

- **Deploy** the config file:

  ``` bash
  php artisan vendor:publish --provider="Mohamedhk2\LaravelProdTools\Providers\NonWwwRedirectServiceProvider"
  # OR
  php artisan vendor:publish --tag=hk2-www
  ``` 

- Add the middleware class:
    - **Laravel 10** and below: `App\Http\Kernel.php`
      ```php
      protected $middlewareGroups = [
          'web' => [
              ...
              \Mohamedhk2\LaravelProdTools\Middlewares\LaravelNonWwwRedirectMiddleware::class,
          ],
      ];
      ```
    - **Laravel 11** and above : `bootstrap/app.php`
      ```php
      ->withMiddleware(function (Middleware $middleware) {
        $middleware->web([
            ...
            \Mohamedhk2\LaravelProdTools\Middlewares\LaravelNonWwwRedirectMiddleware::class,
        ]);
      })
      ```

- **Update** the following in your `.env`:

    ```dotenv
    REDIRECT_TO_WWW=true
    ```

## License

The Laravel Prod Tools is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
