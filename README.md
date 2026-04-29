# Laravel HTMLMin

Laravel HTMLMin, developed by [Kenan Gündoğan](https://github.com/kenangundogan), is a simple **HTML minifier** package for [Laravel](http://laravel.com). This package uses **Mr Clay's [Minify](https://github.com/mrclay/minify)** library to minify entire HTTP responses. It can also minify **Blade** views at compile time.

<p align="center">
<a href="LICENSE"><img src="https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square" alt="Software License"></a>
</p>

---

## Installation

Laravel HTMLMin requires **PHP 7.3+** and is compatible with **Laravel 7.x, 8.x, 9.x, 10.x, 11.x**, and 13.x. You can install the package using Composer:

```bash
composer require kenangundogan/htmlmin
```

### Automatic Loading

The package is automatically loaded using Laravel's `extra` configuration. There is no need to manually register the Service Provider.

---

## Configuration

Laravel HTMLMin configuration is optional. You can publish the configuration file using the following command:

```bash
php artisan vendor:publish
```

This will create a `config/htmlmin.php` file, which you can modify to suit your project's needs.

### Configuration Options

1. **Automatic Blade Optimizations** (`blade`)  
   Enables automatic minification of Blade views during compilation.  
   Default: `false`

2. **Force Blade Optimizations** (`force`)  
   Forces minification even on risky Blade views. Use with caution.  
   Default: `false`

3. **Ignore Blade Files** (`ignore`)  
   Specify file paths to exclude from minification.  
   Example:
   ```php
   'ignore' => [
       'resources/views/emails',
       'resources/views/markdown',
   ],
   ```

---

## Usage

### HTMLMin Class
The `HTMLMin` class is bound to the IOC container as `htmlmin` and provides the following methods:

- **`blade($value)`**: Quickly minifies a Blade string.
- **`css($value)`**: Minifies CSS content.
- **`js($value)`**: Minifies JavaScript content.
- **`html($value)`**: Minifies HTML content, including inline CSS and JS.

#### Example Usage:
```php
use HTMLMin\HTMLMin\Facades\HTMLMin;

echo HTMLMin::html('<div>   <p> Hello World! </p>   </div>');
```

---

### Middleware Usage

You can use middleware to minify HTML responses live. Add the middleware to your routes:

```php
use HTMLMin\HTMLMin\Http\Middleware\MinifyMiddleware;

Route::middleware([MinifyMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
```

**Note:** Middleware runs on every request and may have a performance cost. For better performance, consider using Blade minification.

---

### Skipping Minification

If you want to exclude certain files or views from minification:

- **Using Config**:  
  Add file paths to the `ignore` setting in `config/htmlmin.php`.
- **Using HTML Comments**:  
  Add the following comment within the file:
  ```html
  <!-- skip.minification -->
  ```

---

## Clearing Cache

To apply changes, you may need to clear Laravel's view cache:

```bash
php artisan view:clear
```

---

## License

Laravel HTMLMin is licensed under the [MIT License](LICENSE).
