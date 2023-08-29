
Teszt feladat - Esedékességi Idő Kalkulátor

A kért metódust a CalculateDueDateAutoTest.php tartalmazza!
A tesztek a ./tests könyvtárban vannak.

--------------------------------------------------------------
Magyarázat a metódus autoteszt-jének használatához!

Ez csinálta meg a composer.json-t az autoteszthez, feltettem a git-re az enyémet de tudtok ezzel a parancsal generálni sajátot
<code>
composer require --dev phpunit/phpunit ^10.3
</code>
feltesszük a phpunit csomagjait
<code>
composer install
</code>
autotesztek futtatása a feladat könyvtárában parancssorból:
<code>
./vendor/bin/phpunit tests/CalculateDueDateAutoTest.php
</code>

------------------------------------------------
Docker:
http://localhost:81/

A böngészöben csak egy teszt oldal jön be de ott van a konténerben
minden mert a feladat könyvtárát használja volume-ként!

A docker-compose.yml használatához szükséged lesz docker-re és docker-compose-ra Linuxon!
(Ha esetleg a disztribuciód mást használ docker-hez értelemszerűen azt a csomagot kell telepíteni.)
<code>
sudo apt -y install docker.io 
sudo apt -y install docker-compose
</code>
zsolt helyett természetesen a saját felhasználód :)
<code>
sudo adduser -a zsolt docker
</code>

Érdemes a telepítés után ki majd újra bejelentkezni ez kell
hogy a csoport információkat újra olvassa és legynek jogaid 
sima felhasználóként a docker-hez!

Használat:
Belépsz a könyvtárba ahol a fájljaink vannak majd
Start: így fut a háttérben
<code>
docker-compose up -d
</code>
Leállítás
<code>
docker-compose down    
</code>
