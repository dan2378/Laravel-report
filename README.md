2020-10-25
Progetto di reportistica sviluppato in Laravel 8

Scaricare il progetto in locale, avviare il server locale  es.http://127.0.0.1:8000
  
Configurazione
- configurare la connessione al database modificando i valori nel file .env 
- Creare il database report
- lanciare la migrazione "php artisan migrate --path=/database/migrations/2020_10_25_184204_create_utenti_table.php"
- popolare la tabella, lanciare il seeder UtentiSeeder "php artisan db:seed --class=UtentiSeeder"
- se l'url del progetto è diverso da http://127.0.0.1:8000 aggiornare tale valore nel file app\Console\Commands\ReportUtente.php alla riga 50


Utilizzo
- lanciare da terminale il comando "report:view" seguito dal valore del customer    es."php artisan report:view 1"
