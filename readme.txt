По какой-то причине дропается ide при создании md файла,
только на новую систему пересел, так что в виде txt файла

Для запуска:
1. В корне запускаем sudo docker compose up -d
2. sudo docker compose exec app ./bin/console doctrine:migrations:migrate
3. Открываем в браузере localhost/
