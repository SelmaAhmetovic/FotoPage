Spirala 4
a) Napravite MySQL bazu sa min tri povezane tabele (1 bod) 
+ Dodajte nove forme po potrebi

Napravljena je MySQL baza sa tri tabele, registracija, login i poruka_adminu. Baza se zove spirala4.sql
Tabela registracija sadrzi kolone username (primarni kljuc), ime, prezime, email i datum rodjenja.
Tabela login sadrzi kolone username(strani kljuc na tabelu registracija i njenu kolonu username) i password.
Tabela poruka adminu sadrzi tri kolone, username(strani kljuc na tabelu registracija i njenu kolonu username), email i password.
Da bi uspostavila vezu tri tabele, morala sam promjeniti da sada poruku mogu poslati jedino oni koji se registruju (jer je polje sada
username a ne ime i prezime) kako bih napravila vezu ove tabele sa tabelom registracija.
Dodani su i neki novi podaci (tesni). 

b) Napraviti PHP skriptu koja æe sve podatke iz XML prebaciti u bazu podataka, 
neka se ova skripta poziva na klik dugmeta kojeg može vidjeti samo administrator,
ova skripta treba da ubaci samo podatke iz XML-a koji se ne nalaze u bazi (2 boda)

Napravljena je php skripta dodajUBazu.php i promjenjen je loginAdministrator.php.
Dodana je nova linija koda, link na dodajUBazu.php koji omoguæava da se baza napuni postojeæim xml fajlovima iz
foldera users i contactMessages

c) Prepravite vaše PHP skripte tako da se podaci èuvaju i kupe iz baze podataka umjesto iz XML-a (3 boda)

Kontakt.php je prepravljen tako sto je dodan php kod koji je povezan sa bazom i xml-om i kada se pritisne na 
predaj upit tada se azuriraju baze.
Login.php je prepravljen tako sto je ubacen dio koda (linije 35-48) gdje se novi login podaci smjestaju u MYSQL bazu
a ne u XML bazu.
LoginAdministrator.php je takodjer prepravljen php dio koda.
Registration.php je promjenjen tako da se novi korisnici ubacuju u tabelu registracija i tabelu login.
