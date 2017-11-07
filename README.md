AVEFileBundle
===================

Тестовое задание AVE Systems

```
Создать минимальное консольное приложение использующее Symfony 2, 3, которое способно распечатать иерархию файлов, показывая только файлы с расширением php начиная с папки в которой расположен проект, отсортированных по дате создания в убывающем порядке ( самые новые - самые первые)
```

## Installation and configuration:

Pretty simple with [Composer](http://packagist.org), run:

```sh
composer require pvanag/avefile-bundle
```

### Add AVEFileBundle to your application kernel

```php
// app/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new AVEFileBundle\AVEFileBundle(),
        // ...
    );
}
```

## Usage:

```sh
./app/console ave:file:list
```
