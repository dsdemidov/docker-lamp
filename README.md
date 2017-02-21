Docker LAMP Environment
=======================

Docker LAMP Environment – среда для разработки простых приложений на PHP.

В системе должен быть установлен и настроен docker.

Как пользоваться
----------------
1. В папке config находятся файлы конфигурации. 
Основной – parameters.sh В нем настраивается проект, 
но для тестовой среды, можно оставить параметры по умолчанию

2. В папку app или app/public_html клонируете ваш проект 
(в зависимости от структуры. web_root это app/public_html).

3. Запуск системы

`docker/start.sh`

4. Остановка

`docker/stop.sh`

5. Делаем dump базы данных. Файл сформируется в папке mysql-dumps

`docker/mysqldump.sh`

6. В папке mysql будут располагаться файлы mysql

7. Чтобы провести первоначальное заполнение базы, 
удалите папку mysql, поместите файл дампа 
в папку docker-db-entrypoint, и перезапустите систему

`docker/restart.sh`

8. Сайт будет доступен на localhost на порту 80

9. Пропишите при необходимости URL в hosts