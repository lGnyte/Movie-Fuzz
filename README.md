# Movie Fuzz - PHP Fullstack Development
## Autor: Grasu Ioan

Movie Fuzz este o platforma pe care utilizatorii posteaza recenzii pentru filme, fiind motivati sa foloseasca formulari "quirky", menite sa descrie ecranizarile intr-un mod mai amuzant, sau informal.

## Configurare Dev Server

### Clonare repo:
```
git clone https://github.com/lGnyte/Movie-Fuzz.git
cd Movie-Fuzz
```

### Dependinte si `.env`
Am folosit utilitarul TailwindCSS pentru frontend, astfel fiind necesara rularea comenzii de build, sau `npm run dev` la pornirea serverului.
```
composer install
npm run build
```
Fisierul `.env.example` contine toate variabilele si cheile necesare functionarii.
```
cp .env.example .env
```
In fisierul `.env`, ar trebui verificata doar conexiunea catre baza de date sa aiba parametrii doriti.

### Migrari + Seedere
Proiectul are migrari si seedere populate cu cateva date arbitrare pentru testarea functionalitatilor aplicatiei.
```
php artisan migrate
php artisan db:seed
```

### Pornire server
```
php artisan serve
```

## Functionalitati

### Credentiale
Dupa rularea seederelor, se pot folosi urmatoarele 2 conturi care au cateva recenzii postate.
```
Username: user1 ; Pass: 12345678
Username: user2 ; Pass: 12345678
```
Acestia au recenzii postate pentru filmele din seria `Avengers` (filmele se pot cauta folosind pagina de search dupa keywordul `avengers`)

### Home page
Pagina principala, unde pe langa un mesaj de bun venit, se afiseaza o lista cu cele mai populare filme (conform IMDB, nu dupa recenziile postate pe site) din ziua respectiva. Pentru acest proiect, pozele sunt facute sa apara la calitate redusa pentru a nu solicita prea mult reteaua.

### Autentificare
Autentificarea nu este configurata cu vreun utilitar (Breeze, sau Socialite), dar se foloseste de fatada Auth din Laravel. Toate formularele de autentificare au reguli de validare si afiseaza mesaje de eroare/succes.

#### Login page
Utilizatorul poate sa intre in contul sau, fie cu username-ul, fie cu parola. El poate sa opteze pentru pastrarea sesiunii de autentificare, prin intermediul `Remember Me`. Resetarea parolei este posibila, mail-ul trimis fiind simulat si stocat in `storage/logs`.

#### Register page
Utilizatorul isi creaza cont introducand mai multe date necesare. Este necesara acceptarea termenilor si conditiilor, care in cadrul proiectului doar simuleaza prezenta lor, nu am introdus efectiv astfel de pagini.

### Movies page
Pagina de filme afiseaza utilizatorului o bara de cautari unde acesta poate cauta titluri de filme. Filmele sunt extrase din baza de date oferita de TMDB si se folosesc diferite endpointuri de la ei.

### Individual Movie page
Pe pagina unui film, se afiseaza cateva simple detalii despre film (titlu, tagline, poster, overview). Pentru utilizatorii autentificati, apare apoi un formular in care pot submite recenzia lor pentru filmul respectiv, sau recenzia deja lasata pentru acel film. Ultima sectiune de pe pagina afiseaza toate recenziile oferite de alti utilizatori, sectiunea fiind afisata atat pentru userii autentificati, cat si pentru guests.

### User Profile page
Pe pagina unui utilizator, apare poza acestuia (nu am apucat sa implementez o solutie de schimbare a pozei de profil), impreuna cu numele si data in care s-a alaturat platformei. Pentru utilizatorii cu privilegii de admin pe profil (pagina de profil este a lor), ei isi pot edita cateva dintre detaliile contului.
Tot pe pagina utilizatorului, sunt afisate toate recenziile lasate de acel utilizator la toate filmele.

## Code quality
Am incercat pe cat posibil sa folosesc best practice-uri la ceea ce tine de modularizarea codului, sau separarea de responsabilitati. Chiar daca baza de date nu stocheaza decat doua entitati, am definit in Model relatiile dintre cele doua entitati, de tip one-to-one si one-to-many. Am preferat sa nu scalez numarul de entitati, sau de functionalitati similare din punct de vedere tehnic, alegand sa trec putin si sa folosesc cat mai multe din functionalitatile oferite de Laravel (sunt constient ca are mult mai multe:) ).

## Imbunatatiri
La proiect as fi putut sa mai implementez si alte functionalitati precum poze de profil, introducerea de tag-uri care sa fie alocate filmelor si sa se poata cauta filme de vizionat dupa aceste etichete si cred ca ar fi fost potrivite mai multe metode de a descoperi filme de vizionat, dupa mai multe filtre sau genuri preferate.