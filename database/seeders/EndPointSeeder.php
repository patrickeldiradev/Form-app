<?php

namespace Database\Seeders;

use App\Modules\Analytics\Models\RequestLog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class EndPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->getEndPointsCollection()->each(function ($item) {
            RequestLog::updateOrCreate($item[0], $item[1]);
        });
    }

    /**
     * @return Collection
     */
    protected function getEndPointsCollection(): Collection
    {
        return collect([
            [
                ['name'  =>  'form.store'],
                [
                    'path'  =>  '/form',
                    'method'  =>  'POST',
                ]
            ],
            [
                [ 'name'  =>  'form.get'],
                [
                    'path'  =>  '/form',
                    'method'  =>  'GET',
                ]
            ],
            [
                ['name'  =>  'form.storeQuestionnaire'],
                [
                    'path'  =>  '/questionnaire',
                    'method'  =>  'POST',
                ]
            ],
        ]);
    }
}
