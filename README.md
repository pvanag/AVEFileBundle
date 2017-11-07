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

OR add cofiguration to composer.json:

```json
"repositories": [
    {
        "type": "vcs",
        "url":  "https://github.com/pvanag/AVEFileBundle"
    }
],
"require": {
    "pvanag/avefile-bundle": "dev-master",
    <...>
```

### Import configuration to config.yml

```yaml
- { resource: "@AVEFileBundle/Resources/config/services.yml" }
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
./bin/console ave:file:list
```
