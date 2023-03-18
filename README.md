# Datenbank-Projekt Stammgruppe Kunibert

## Installation

### Systemvoraussetzungen (Windows)

- [Apache, MySQL, PHP^8.0 (XAMPP)](https://www.apachefriends.org/download.html).
- [Composer](https://getcomposer.org/doc/00-intro.md#installation-windows).
- [Git for Windows](https://git-scm.com/download/win).

### Anleitung

1. Dieses Repository in den ordner ``C:\xampp\htdocs`` klonen. 
2. ``C:\xampp\htdocs\school-project`` im Terminal eurer Wahl öffnen.
3. Datenbank [hier](http://127.0.0.1/phpmyadmin) anlegen: \
   - Auf der Linken Seite auf ``Neu`` klicken.
   - ``school-project`` wählen, bei ``Datenbankname`` eintragen und ``Anlegen`` klicken.
4. ``.env.example`` in ``.env`` umbenennen.
5. Folgende Werte anpassen:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=school-project
   DB_USERNAME=root
   DB_PASSWORD=
   ```
6. Composer Pakete installieren:
   ```shell
   composer install
   ```
7. Datenbank-Tabellen anlegen:
   ```shell
   php artisan migrate
   ```
8. Daten anlegen
   ```shell
   php artisan db:seed DepartmentSeeder
   php artisan db:seed MemberSeeder
   ```
   
## Anwendung nutzen
Server starten mit:
```shell
php artisan serve
```
Die Anwendung ist [hier](http://127.0.0.1:8000) zu erreichen.
