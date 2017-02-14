#Generate Javascript and CSS files via Laravel 4 Command line

[![Build Status](https://travis-ci.org/LaravelLegends/assets-generator.svg?branch=master)](https://travis-ci.org/LaravelLegends/assets-generator)

**Instalation**

Run `composer require laravellegends/assets-generator`

Add in `app/config.php`:

```php
   'providers' => [
       // another providers
       'LaravelLegends\AssetsGenerator\Provider'
   ]
```


**Usage**

Now, the command is avaliable in `php artisan`. Run `php artisan generate:assets {path}` for create css and Javascript files.

By default, the files are created in 'public/css' and 'public/js' folders.

For example:


```bash
php artisan generate:assets users/index
```

The files `public/css/users/index.css` and `public/js/users/index.js` will be created.



**Stub**

For costumization, use `assets-generator::config.stubs` with keys `js` or `css` and add a file for create default template for your assets files.
