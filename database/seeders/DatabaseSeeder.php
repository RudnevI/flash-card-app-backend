<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Collection;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public $capitalsQA = [
        'Russia' => 'Moscow',
        'Kazahstan' => 'Almaty',
        'China' => 'Beijing',
        'USA' => 'Washington',
        'Japan' => 'Tokyo'
    ];

    public function run()
    {
        $collection = Collection::factory()->create();
        foreach ($this->capitalsQA as $question => $answer) {
            Card::create([
                'question' => $question,
                'correct_answer' => $answer,
                'collection_id' => $collection->id,
                'status_id' => 1,
                'repeat_date' => Carbon::now()->toDate()
            ]);
        }
    }
}
