<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contract;

class ContractSeeder extends Seeder
{
    public function run()
    {
        $contracts = [
            [
                'contract_code' => 'CT001',
                'ContractType' => 'Full-time',
                'StartDate' => '2025-01-01',
                'EndDate' => '2026-01-01',
                'Note' => 'Hợp đồng 1 năm',
            ],
            [
                'contract_code' => 'CT002',
                'ContractType' => 'Part-time',
                'StartDate' => '2025-03-01',
                'EndDate' => '2025-09-01',
                'Note' => 'Hợp đồng 6 tháng',
            ],
        ];

        foreach ($contracts as $contract) {
            Contract::create($contract);
        }
    }
}
