<?php

namespace App\Console\Commands;

use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportDistrictsAndWards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:districts-wards';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import districts and wards from open-api.vn into the database';

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
        $this->info("Importing districts and wards...");

        // Lấy tất cả các tỉnh đã lưu trong database
        $provinces = Province::all();

        // Duyệt qua từng tỉnh
        foreach ($provinces as $province) {
            $this->info("⏳ Importing districts for " . $province->name);

            // Gọi API lấy thông tin quận/huyện và xã/phường
            $response = Http::get("https://provinces.open-api.vn/api/p/{$province->code}?depth=2");

            if ($response->successful()) {
                // Lấy dữ liệu từ API
                $data = $response->json();

                // Duyệt qua các quận/huyện
                foreach ($data['districts'] as $districtData) {
                    // Kiểm tra nếu trường short_codename tồn tại trong dữ liệu
                    $shortCodename = isset($districtData['short_codename']) ? $districtData['short_codename'] : null;

                    // Lưu quận/huyện vào database
                    $district = District::updateOrCreate(
                        ['code' => $districtData['code']],
                        [
                            'name' => $districtData['name'],
                            'codename' => $districtData['codename'],
                            'division_type' => $districtData['division_type'],
                            'short_codename' => $shortCodename,  // Dùng giá trị nếu có, nếu không thì là null
                            'province_id' => $province->id,
                            'code' => $districtData['code'],
                        ]
                    );

                    // Duyệt qua các xã/phường
                    foreach ($districtData['wards'] as $wardData) {
                        Ward::updateOrCreate(
                            ['code' => $wardData['code']],
                            [
                                'name' => $wardData['name'],
                                'codename' => $wardData['codename'],
                                'division_type' => $wardData['division_type'],
                                'short_codename' => isset($wardData['short_codename']) ? $wardData['short_codename'] : null,
                                'district_id' => $district->id,
                                'code' => $wardData['code'],
                            ]
                        );
                    }
                }
            }
        }

        $this->info("✅ Done importing districts and wards.");
        return 0;
    }
}
