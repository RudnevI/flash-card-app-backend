<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */

    private array $textFields = ['question', 'correct_answer'];


    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            foreach ($this->textFields as $field) {
                $table->text($field);
            }
            $table->date("repeat_date")->nullable(true);
            $table->foreignId("collection_id")->references("id")->on("collections")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("status_id")->references("id")->on("statuses")->onUpdate("cascade")->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
