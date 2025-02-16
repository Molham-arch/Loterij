Loterij Trekking Project 🎉
Dit project is een webapplicatie waarin gebruikers kunnen deelnemen aan een loterij door een formulier in te vullen. De applicatie toont een afteltimer tot de deadline van de loterij, en bij het selecteren van een winnaar wordt een feestelijke animatie met confetti en geluidseffecten geactiveerd. Het project is gebouwd met HTML, CSS, JavaScript en PHP en bootstrap.

installatie:
1-Plaats de projectmap in de root-directory van je server.
2-Importeer db.sql.
3- je kunt de connectie vinden in inc/conn.php .... pas dit aan je databaseconfiguratie als dat nodig is.
4- navigeer naar http://localhost/Loterij/index.php..
5-Vul het formulier in met je gegevens om deel te nemen aan de loterij.

6-Klik op de Check Draw Winner knop om de winnaar bekend te maken.Dit zal gebeuren met een query uit inc/select.php die 1 random persoon kiest uit database . Dit zal de volgende effecten activeren:
-Een laadanimatie.
-Een pop-upvenster met de naam van de winnaar.
-Een confetti-animatie met een feestelijk geluidseffect.

7-als je klikt op de knop "see all participants...die ga je redirect naar participants.php waar je kunt all participants zien ... je kunt daar edit/delete/search/sorteren...
