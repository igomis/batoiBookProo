<?php

namespace App\Console\Commands;

use App\Mail\RegardMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendRegards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:regards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $usuarisAmbVendesUltimAny = User::whereHas('sales', function ($query) {
            $unAnyEnrere = Carbon::now()->subYear()->format('Y/m/d');
            $query->where('date', '>=', $unAnyEnrere);
        })->get();

        foreach ($usuarisAmbVendesUltimAny as $user) {
            Mail::to($user->email)->send(new RegardMail($user));
        }

        $this->info('Correus de recordatori enviats correctament!');
    }
}
