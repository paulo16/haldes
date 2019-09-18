<?php

namespace App\Console\Commands;

use App\Demande;
use App\Mail\EtatDemande;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class SendEmailtendays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Emailtenday:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoi les emails 10 après la demandes de permis';

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
     * @return mixed
     */
    public function handle()
    {
        $demandes = Demande::where('created_at', '>', Carbon::now()->subMinutes(2))
            ->get();
        if ($demandes) {
            $users = Demande::leftJoin('personnes', 'personnes.id', '=', 'demandes.personne_id')
                ->leftJoin('users', 'users.id', '=', 'personnes.user_id')
                ->select('personnes.id', 'personnes.nom', 'users.email')
                ->where('demandes.created_at', '>', Carbon::now()->subMinutes(2))
                ->get();

            foreach ($users as $user) {
                Mail::to($user->email)->send(new EtatDemande);
            }

        }
    }
}
