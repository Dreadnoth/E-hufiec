Instrukcja wdrożenia na potrzeby prac deweloperskich
==========

## Założenia przedwstępne
Instrukcja zakłada że na komputerze docelowym jest zainstalowany i skonfigurowany:
 * serwer http (przydatny [link](http://symfony.com/doc/current/setup/web_server_configuration.html))
 * parser php w wersji 7
 * serwer mysql/mariadb
 * klient [git](https://git-scm.com/)
 * [composer](https://getcomposer.org/)

## Instalacja
1. Pobieramy kopię repozytorium na dysk:
    ```bash
    $ git clone https://github.com/Dreadnoth/E-hufiec.git
    ```
2. Kopiujemy katalog do katalogu ze stronami www serwera
3. W katalogu aplikacji wykonujemy komendę
    ```bash
    $ composer install
    ```
    w wyniku czego w katalogu *E-hufiec/app/config* powstanie plik *parameters.yml*. Można go również utworzyć ręcznie - poniżej przykład:
    ```yml
    parameters:
        database_host: localhost #host bazodanowy
        database_port: 3306 #port bazy danych
        database_name: dbname #nazwa bazy danych
        database_user: dbuser #użytkownik bazodanowy
        database_password: dbpass #hasło do bazy danych
        mailer_transport: smtp #sposób trsnaportu e-maili
        mailer_host: 127.0.0.1 #adres serwera pocztowego
        mailer_user: null #użytkownik serwera pocztowego
        mailer_password: null #hasło serwera pocztowego
        secret: myRandomAlphaChars123456 #sól wykorzystywana w hashowaniu haseł
    ```
4. Wykonujemy poniższą komendę aby załadować schemat bazodanowy:
    ```bash
    $ php bin/console doctrine:schema:update --force
    ```
5. Ładujemy dane testowe:
    ```bash
    $ php bin/console doctrine:fixtures:load
    ```
    Definicja danych testowych znajduje się w *src/Zhp/BackendBundle/DataFixtures/ORM/LoadAdminData.php*
6. Jeżeli wszystko przebiegło pomyślnie po przejściu w przeglądarce pod adres *http://localhost/[Sciezka_do_E-hufiec]/web/app_dev.php* powinna pokazać się strona logowania. Domyślne dane do logowania to: login - admin@example.com, hasło: admin
7. W przypadku systemów Linux wymagane mogą być dodatkowe kroki opisane [tutaj](https://symfony.com/doc/current/setup/file_permissions.html)

# Tworzenie poprawek
Jeżeli chcemy aby nasza poprawka znalazła się w repozytorium głównym postępujemy wg następujących kroków:
1. Zakładamy darmowe konto na [github.com](https://github.com/)
2. Przechodzimy pod [https://github.com/Dreadnoth/E-hufiec](https://github.com/Dreadnoth/E-hufiec)
3. Klikamy przycisk "fork" w prawym górnym rogu - w tym momencie zostanie utworzona kopia repozytorium głównego
4. Kopiujemy utworzone repozytorium na dysk komendą **git clone**
5. Wprowadzamy poprawki, zatwierdzamy je (**git commit**) i wypychamy je do kopii repozytorium głównego komendą **git push**
6. Z poziomu interfejsu github.com tworzymy Pull Request klikając przycisk **Create pull request**
7. Jeżeli wszystko będzie w porządku poprawka zostanie wciągnięta do repozytorium głównego. W przeciwnym przypadku mogą być wymagane dodatkowe prace oraz zgłoszenie Pull Requesta na nowo.