## Реализация тестового задания по ТЗ
Используемые технологии:

На бекенде:
PHP 7.4,
Laravel 7.27.0

На фронтенде:
HTML,
VueJs 


## ТЗ
Требуется разработать небольшую веб-форму, на которой будет расположено:
Текстовое поле для ввода ИНН физического лица
Кнопка “Отправить”
При отправке веб-формы происходит проверка принадлежности введённого ИНН
плательщику налога на профессиональный доход (самозанятый фрилансер). После
отправки пользователь получает информацию:
является ли ИНН самозанятым (в случае успешной проверки)
код и сообщение об ошибке (если произошла ошибка)
Проверку производить с помощью открытого сервиса ФНС:
https://npd.nalog.ru/html/sites/www.npd.nalog.ru/api_statusnpd_nalog_ru.pdf
Один и тот же ИНН может отправляться на проверку в открытый сервис только один
раз в сутки (все повторные запросы брать из базы данных).
Перед отправкой данных в открытый сервис ИНН валидируется в соответствии с
алгоритмом:
https://www.egrul.ru/test_inn.html
Т.е. введенный пользователем текст является действительным ИНН физического
лица.

Условия выполнения
каких-то критериев по оформлению (дизайн) веб-страницы не существует
на бекенде - PHP любой версии
на фронтенде - HTML, JavaScript (при необходимости)
в качестве базы данных можно использовать любое решение (в том числе и
memcached)
можно использовать любые открытые фреймворки, плагины, пакеты или
расширения
можно использовать любые подходы к разработке
Оформление результата
оформить в виде Docker-контейнера
разместить небольшое описание README как развернуть контейнер и
проверить выполнение задания


#### Установка:

Выполнить в bash консоли

git clone https://github.com/DayzerCode/inn_form ershov_test_task

cd ershov_test_task/

cp .env.example .env

composer install

php artisan key:generate

php artisan optimize

php artisan serve или php artisan serve --port={номер свободного порта}
