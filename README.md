# covid19-tracking

# Für wen ist es gedacht?
Das System ist für Unternehmen entwickelt, welche (z.b. in Österreich) eine Pflicht zur Registrierung von Kundendaten hat, und diese im Infektionsfall an die örtliche Aufsichtsbehörde oder der Gesundheitsbehörde weiterzuleiten.

# Voraussetzung
- Webserver (kein Root zugriff benötigt)
- PHP 7.4.x
- Datenbank
- phpMyAdmin (um die Auswertung durch Virtualisierung zu erleichtern)
# Installation
Um das System reibungslos verwenden zu können folgen Sie diesen Anweisungen:

1. Bringen Sie alle Daten via FTP, oder andere Verfahren auf Ihre Server
2. Führen Sie die install.sql aus, es wird eine Tabelle 'guest' erstellt mit den Spalten 'id','name','adress','phone','date','time','desk' angelegt.
3. Erstellen Sie den Zugang mit dem Benutzernamen welcher in der 'index.php', Zeile 51 konfiguriert werden, diesem User geben Sie auf diese Tabelle alle Rechte.

DIE GEWONNENEN DATEN KÖNNEN SIE IM ANSCHLUSS DER ÖRTLICHEN AUFSICHTSBEHÖRDE ODER DER GESUNDHEITSBEHÖRDE ÜBERGEBEN

Bitte halten Sie sich an die Lizenzbedingungen (siehe LICENSE.md), dies ist nicht als Eigenwerbung gedacht, sondern dient nur dazu andere Personen auf dieses System Aufmerksam zu machen, und dazu zu inspirieren dieses System auch zu benutzen, und so die Corona-Krise schnell und sicher zu überstehen.

# Was ist zu beachten?
Um es Rechtlich korrekt in Ihrem Land nutzen zu können Benötigen Sie noch eine Datenschutzerklärung die auf Ihre Bedürfnisse angepasst ist/wurde, wenden Sie sich bei spezifischen Fragen an einen Rechtsanwalt.

# #STAYSAFE

#### Sie haben einen Fehler gefunden? 
#### Eröffnen Sie doch gerne einen Issue oder einen Pull Request!
