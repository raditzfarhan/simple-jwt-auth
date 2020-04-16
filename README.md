<p align="center"><img src="https://res.cloudinary.com/raditzfarhan/image/upload/v1587007679/simple-jwt-auth_gpo0vd.svg" width="640"></p>

<p align="center">
    <a href="https://github.com/raditzfarhan/simple-jwt-auth"><img src="https://img.shields.io/badge/License-MIT-yellow.svg?style=flat-square" alt="License"></a>
    <a href="https://github.com/raditzfarhan/simple-jwt-auth"><img src="https://github.styleci.io/repos/7548986/shield?style=square" alt="styleci"></img></a>
</p>

# Simple JWT Auth

Just a simple implementation of JWT Auth for Lumen

## Configuration

Edit the `bootstrap/app.php` file and add the following line to register the service provider:

```php
...
$app->register(RaditzFarhan\SimpleJWTAuth\JWTAuthServiceProvider::class);
...
```

Then add jwt to your guards config in `auth.php` config file:
```php
'guards' => [
    ...    
    'jwt' => [
        'driver' => 'simple-jwt-auth',
        'provider' => 'users',
    ],
],
```

Then add users provider if you haven't:
```php
'providers' => [
    'users' => [
        'driver' => 'eloquent',
        'model' => App\User::class,
    ],
],
```

## Credits

- [Raditz Farhan](https://github.com/raditzfarhan)

## License

MIT. Please see the [license file](LICENSE) for more information.