<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Coin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coin:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get all coin price ';

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
              $date = date('Y-m-d');
        $req_url = "https://api.exchangerate.host/{$date}?base=USD";
        
        $response_json = file_get_contents($req_url);
        if (false !== $response_json) {
            try {
                $response = json_decode($response_json);
                if ($response->success === true) {
                    foreach ($response->rates as $coin => $value) {

                        \App\Models\Coin::where('coin_code', '=', $coin)->update(['price' => $value, 'time' => date('H:i:s')]);

                    }
                }
            } catch (\Exception $e) {
                // Handle JSON parse error...
            }
        }
        $this->info('Coin created successfully.');
    }
}
