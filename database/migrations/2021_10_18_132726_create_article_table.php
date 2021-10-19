<?php

use Illuminate\Database\Migrations\Migration;
use App\Database\Schema\Utils;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('slug');
            $table->longText('contents');

            $table
                ->foreignId('user_id')
                ->nullable()
            //    ->constrained('users')
                ->references('id')
                ->on('users')
            ;
            $table
                ->foreignId('topic_id')
                ->nullable()
                ->constrained();

            Utils::addTimestamps($table);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
