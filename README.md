Docker LAMP Environment
=======================

Docker LAMP Environment – среда для разработки простых приложений на PHP.

В системе должен быть установлен и настроен docker.

Как пользоваться
----------------
1. В папке config находятся файлы конфигурации. 

2. В папку public_html клонируете ваш проект 

3. Запуск системы

`composer lamp-start`

4. Остановка

`composer lamp-stop`

5. Делаем dump базы данных. Файл сформируется в папке mysql-dumps

`composer lamp-mysqldump`

6. В папке mysql будут располагаться файлы mysql

7. Чтобы провести первоначальное заполнение базы, 
удалите папку mysql, поместите файл дампа 
в папку APP_ROOT/docker-db-entrypoint, и перезапустите систему

`composer lamp-restart`

8. Сайт будет доступен на localhost на порту 80

9. Пропишите при необходимости URL в hosts

10. Проверить состояние контейнеров 

`composer lamp-ps`

11. Подключиться к bash консоли

`composer lamp-bash`