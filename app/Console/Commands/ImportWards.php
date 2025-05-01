<?php

namespace App\Console\Commands;

use App\Models\District;
use App\Models\Ward;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportWards extends Command
{
    protected $signature = 'import:wards';
    protected $description = 'Import wards from open-api.vn into the database';

    public function handle()
    {
        $this->info("Importing wards...");

        $districts = District::all();

        foreach ($districts as $district) {
            $this->info("⏳ Importing wards for district: " . $district->name);

            // Gọi API lấy xã/phường của từng quận/huyện
            $response = Http::get("https://provinces.open-api.vn/api/d/{$district->code}?depth=2");

            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['wards'])) {
                    foreach ($data['wards'] as $wardData) {
                        Ward::updateOrCreate(
                            ['code' => $wardData['code']],
                            [
                                'name' => $wardData['name'],
                                'codename' => $wardData['codename'],
                                'division_type' => $wardData['division_type'],
                                'short_codename' => $wardData['short_codename'] ?? null,
                                'district_id' => $district->id,
                                'code' => $wardData['code'],
                            ]
                        );
                    }
                }
            } else {
                $this->error("❌ Failed to fetch wards for district: " . $district->name);
            }
        }

        $this->info("✅ Done importing wards.");
        return 0;
    }
}
