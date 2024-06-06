# Projekt LEMP(dane wrażliwe)

Ten projekt tworzy stos LEMP (Linux, Nginx, MySQL, PHP) z phpMyAdmin, wykorzystując Docker i Docker Compose. Zawiera przykładową aplikację PHP, która łączy się z bazą danych MySQL i wyświetla informacje o użytkownikach Zrobiony nasick na ochrone danych.

## Struktura projektu + kroki
```
/lab12
|-- .gitignore
|-- docker-compose.yml
|-- docker-compose.override.yml
|-- nginx/
| |-- default.conf
|-- app/
| |-- Dockerfile
| |-- index.php
|-- init.sql
|-- secrets/
|-- -----mysql_root_password
|-- -----mysql_user_password
```
## Tworzymy nowe pliki i foldery z danymi wrażliwymi
```
mkdir -p secrets
echo -n "Viacheslav_root" > secrets/mysql_root_password
echo -n "Peleshok_password" > secrets/mysql_user_password
touch docker-compose.override.yml
```
## Zbudujmy obraz i start kontenerów
```
docker-compose up -d --build
```
![Zrzut ekranu 2024-06-6 o 16 14 27](https://github.com/faaacepalm008/lab12/assets/83872764/13e60735-a772-43db-b652-192e3e7a90ad)
![Zrzut ekranu 2024-06-6 o 16 15 17](https://github.com/faaacepalm008/lab12/assets/83872764/8a59270b-d542-495a-875f-1f2825cb12b2)

# Dostęp do aplikacji
# OPIS struktur
## 1. Aplikacja PHP
Otwórz przeglądarkę i przejdź do http://localhost:4001. Powinieneś zobaczyć aplikację PHP wyświetlającą informacje o użytkownikach z bazy danych MySQL.

![Zrzut ekranu 2024-06-6 o 16 19 14](https://github.com/faaacepalm008/lab12/assets/83872764/de00f452-08d7-49d2-b424-c3f52a24cc97)

## 2. phpMyAdmin
Otwórz przeglądarkę i przejdź do http://localhost:6001. Użyj następujących danych logowania:
```
Serwer: mysql
Użytkownik: root
Hasło: Viacheslav_root
```
albo
```
Użytkownik: user
Hasło: Peleshok_password
```
![Zrzut ekranu 2024-06-6 o 16 19 54](https://github.com/faaacepalm008/lab12/assets/83872764/66bfcba9-c0be-46fe-9ec4-0aac964e6b06)
