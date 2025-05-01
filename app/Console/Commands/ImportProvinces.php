<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Province;

class ImportProvinces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:provinces';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import provinces from open-api.vn into the database';

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
        $this->info("Fetching provinces from API...");

        $response = Http::get('https://provinces.open-api.vn/api/p/');

        if ($response->successful()) {
            $provinces = $response->json();

            foreach ($provinces as $item) {
                Province::updateOrCreate(
                    ['code' => $item['code']],
                    [
                        'name' => $item['name'],
                        'codename' => $item['codename'],
                        'division_type' => $item['division_type'],
                        'phone_code' => $item['phone_code'],
                        'code' => $item['code'], // THÊM DÒNG NÀY
                    ]
                );
                
            }

            $this->info("✅ Done! " . count($provinces) . " provinces imported.");
        } else {
            $this->error("❌ Failed to fetch data from API.");
        }
        return 0;
    }
}
