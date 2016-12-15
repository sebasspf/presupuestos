<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CUSTOM: Elimina pedidos, clientes y precios de la BD';

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
        if ($this->confirm('¿Está seguro de borrar todos los registros?')){
            DB::table('precios')->delete();
            DB::table('datos_presupuestos')->delete();
            DB::table('clientes')->delete();
            DB::table('presupuestos')->delete();
        }
    }
}
