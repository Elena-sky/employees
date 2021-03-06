
## Описание

Онлайн каталог сотрудников для компании ​с ​более ​чем ​50,000 ​сотрудников и 5 уровней иерархий. Реализованна авторизация. Авторезированный пользователь может редактировать и удалять сотрудников.
 
## Главная страница

Отображает иерархию сотрудников в древовидной ​форме.

## Таблица сотрудников

В таблице 
- вся информация о сотрудниках из базы данных.
- возможность сортировать ​по ​любому ​полю (Ajax).
- поиск по любому полю (Ajax).

## Использовала
- Laravel 5.5;
- Php;
- Js (Ajax, JQ);
- Bootstrap;
- MySQL;

## Instalation

- Create database

- Create and config .env file

- Install packages:
```bash
$ composer install

```
- Generate unique key:
```bash
$ php artisan key:generate

```

- Create tables:

```bash
$ php artisan migrate

```

- Fill the base

```bash
$ php artisan db:seed --class=EmployeesTableSeeder

```
