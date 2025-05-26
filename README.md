# 🎉 Loterij Trekking Project (CRUD)

Dit project is een interactieve webapplicatie waarmee gebruikers kunnen deelnemen aan een loterij door een formulier in te vullen. De applicatie bevat een afteltimer tot de deadline, en bij het selecteren van een winnaar worden feestelijke effecten getoond, zoals confetti en geluid.

Gebouwd met:

* **HTML, CSS, JavaScript, PHP**
* **Bootstrap** voor styling

---

## 🚀 Functionaliteiten

* 📄 Deelnemers kunnen zich registreren via een formulier
* ⏱️ Live afteltimer tot de trekking
* 🥳 Feestelijke animatie met confetti en geluid bij het selecteren van een winnaar
* 🧑‍💻 Beheerpagina voor deelnemers: zoeken, sorteren, bewerken en verwijderen

---

## 🛠️ Installatie

1.  **Clone** deze repository met:
   ```
   git clone https://github.com/Molham-arch/Loterij.git
   ```
2. **Plaats** de volledige projectmap in de root-directory van je lokale server (bijvoorbeeld: `htdocs` voor XAMPP).
3. **Importeer** het `db.sql` bestand in je database (bijvoorbeeld via phpMyAdmin).
4. **Pas de databaseverbinding aan** in `inc/conn.php` indien nodig (databasehost, gebruikersnaam, wachtwoord en databasenaam).
5. **Navigeer** naar:
   `http://localhost/Loterij/index.php`
6. **Vul het formulier in** om deel te nemen aan de loterij.

---

## 🏆 Winnaar selecteren

1. Klik op de knop **"Check Draw Winner"**.
2. De applicatie voert een query uit via `inc/select.php`, waarbij één willekeurige deelnemer wordt geselecteerd.
3. De volgende acties worden uitgevoerd:

   * ⏳ **Laadanimatie**
   * 🦮 **Pop-upvenster** met de naam van de winnaar
   * 🎊 **Confetti-animatie** met feestelijk geluid

---

## 📋 Deelnemers beheren

* Klik op **"See all participants"** om naar `participants.php` te gaan.
* Daar kun je:

  * 📌 Alle deelnemers bekijken
  * ✏️ Bewerken
  * ❌ Verwijderen
  * 🔍 Zoeken en sorteren

---

## 📁 Mappenstructuur 

```
Loterij/
├── css/
│   ├── bootstrap.min.css
│   └── style.css
├── images/
│   ├── jason-leung-Xaanw0s0pMk-unsplash.jpg
│   └── shamblen-studios-SYfH2bqf1yk-unsplash.jpg
├── inc/
│   ├── conn.php
│   ├── db_close.php
│   ├── form_handle.php
│   └── select.php
├── js/
│   ├── bootstrap.bundle.min.js
│   ├── loader.js
│   └── script.js
├── participants/
│   ├── delete_user.php
│   ├── edit_user.php
│   └── participants.php
├── sounds/
│   ├── positive-notification-new-level.mp3
│   ├── victory.mp3
│   └── videoplayback.m4a
├── db.sql
├── index.php
└── readme.md
```

---

Veel plezier met de loterij-app! 🎟️
