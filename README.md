# LatLongAPI
Aby wszystko działało poprawnie 
Należy zainstalować xamppa według tego linku
https://www.howtoforge.com/how-to-install-xampp-on-ubuntu-20-04/
następnie odpalić xamppa. W zakladce manąge servers odpalic MYSQL database i apache web server. nastepnie otworzyc przegladarke odpalic link
http://localhost/phpmyadmin/
tam wejsc w konta uzytkownikow lub privileges. Stworzyc nowego uzytkownika bez hasła. I dac mu najprosciej bedzie - wszystkie uprawnienia. Zapisac.
Po tym wejsc w zakladke bazy danych, dodac nowa baze i zapamietac jej nazwe.
Nastepnie przejsc do pobranego repozytorium rozpakowanego jakims archiwizatorem
i zmienić w pliku
.env (katalog główny repozytorium) zmienną APP_GEOLOCATIONAPIKEY na klucz do api geolokalizacyjnego google jak to zrobic odsylam tutaj https://developers.google.com/maps/documentation/geocoding/overview 
      oraz zmienną DATABASE_URL według wzoru który jest w pliku. loginUżytkownikaDoBazy to ta nazwa ktorej uzylismy do stworzenia konta, jako implementacjaSQL wpisujemy mysql, jako port domyslny - 3306, nazwa bazy jako ta sama jak nazywalismy baze przy jej tworzeniu wyzej.
Potem w terminalu odpalić to i zaczekać. Najlepiej przed kazda komenda wpisac komende sudo su i wpisac swoje haslo bo czesto sa problemy z uprawnieniami.
sudo apt install curl
oraz
sudo apt install php-xml
oraz 
sudo apt-get install -y phpunit
Następnie postępować według kroków 1 i 2 z linku tego
https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04
po tych krokach należy wykonać 1 komendę z terminala, z kroku 5 z linku wyżej, lecz będąc w katalogu głównym repozytorium. (tam gdzie plik .env między innymi).
Pomiędzy katalogami przechodzi się używając komendy "cd sciezka_katalogu".
Terminal w katalogu w ktorym chcemy mozemy odpalic tez wchodzac do folderu z eksploratora, prawym na puste pole w folderze i "otwórz terminal tutaj" lub "open in terminal"
następnie komenda, php bin/console doctrine:schema:update --force
dalej pozostając w tym katalogu co byliśmy.Potem aplikacja komenda symfony serve z folderu głównego aplikacji, i aplikacja jest już gotowa do testów.

