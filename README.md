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

1. **Plaats** de volledige projectmap in de root-directory van je lokale server (bijvoorbeeld: `htdocs` voor XAMPP).
2. **Importeer** het `db.sql` bestand in je database (bijvoorbeeld via phpMyAdmin).
3. **Pas de databaseverbinding aan** in `inc/conn.php` indien nodig (databasehost, gebruikersnaam, wachtwoord en databasenaam).
4. **Navigeer** naar:
   `http://localhost/Loterij/index.php`
5. **Vul het formulier in** om deel te nemen aan de loterij.

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

## 📁 Mappenstructuur (optioneel voorbeeld)

```
Loterij/
├── inc/
│   ├── conn.php
│   └── select.php
├── index.php
├── participants.php
├── db.sql
├── assets/
│   ├── css/
│   ├── js/
│   └── sounds/
```

---

Veel plezier met de loterij-app! 🎟️
