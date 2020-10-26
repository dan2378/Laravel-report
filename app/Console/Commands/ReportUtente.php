<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Utente;
use Illuminate\Support\Facades\Http;

class ReportUtente extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:view {utente}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Elenco transazioni in Euro';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //recupero customer id
        $idUtente = $this->argument('utente');
        // Header tabella report
        $headers = ['Cliente', 'Valore', 'Valuta'];

        // recupero info utente
        $users = Utente::select(['customer', 'value','valuta'])
            ->where("customer",$idUtente)
            ->get();

        /*recupero l'array del cambio valuta*/
        $responseCambio = Http::get('http://localhost:8000/cambio');
        $arrCambio =json_decode($responseCambio->body());

        //inizializzo array del report
        $data = [];
        $contatore = 0;

        // se ho corrispondenza nella tabella utenti
        if(!$users->isEmpty()){
            // ciclo tutte le transazioni utente
            foreach ($users as $user)
            {
                $totale =$user->value;
                // inizializzo l'array data in euro
                $data[$contatore] = [$user->customer,$totale,"€"];
                // confronto la valuta della transazione con la valuta presente nell'array di cambio
                // se trovo corrispondenza applico il cambio in euro e memorizzo i dati nell'array data
                foreach($arrCambio as $key => $value) {
                    if($user->valuta ==  $key){
                        $totale =$user->value * $value;
                        $totale = round($totale,2);
                        $data[$contatore] = [$user->customer,$totale,"€"];
                    }
                }
                $contatore = $contatore+1;
            }
        }else{
            // customer non trovato
            $data[0] =  ["Utente non presente","",""];
        }

        $this->line('REPORT IN EURO');
        // visualizzo report
        $this->table($headers, $data);
    }
}
