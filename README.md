## Реализация тестового задания от Ершова Дмитрия Александровича
Используемые технологии:

На бекенде:
PHP 7.4,
Laravel 7.27.0

На фронтенде:
HTML,
VueJs 

#### Установка:

Выполнить в bash консоли

git clone https://github.com/DayzerCode/inn_form ershov_test_task

cd ershov_test_task/

cp .env.example .env

composer install

php artisan key:generate

php artisan optimize

php artisan serve или php artisan serve --port={номер свободного порта}
