<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Rick and Morty API

## Install

* Copy env.example to .env
* Modify your database settings in .env

```bash
php artisan key:generate
php artisan migrate
php artisan rickandmorty:fetch
php artisan test
```

## Routes

```bash
/v1/characters
/v1/characters?name=Rick&status=Alive&gender=Male&species=Human
/v1/characters/{id}
```


## Resources

- [Laravel](https://laravel.com)
- [Rick and Morty API](https://rickandmortyapi.com)
- [Rick And Morty PHP API](https://github.com/nickbeen/rick-and-morty-api-php)


## Credits

- [Lucas Silva](https://webzow.com)
