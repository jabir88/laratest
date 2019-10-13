<?php

use App\Comment;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('token_sub');
            $table->mediumText('token_des')->nullable();
            $table->string('token_priority')->nullable();
            $table->string('token_attach')->nullable();
            $table->string('deposit_amount')->nullable()->default(0);
            $table->string('payment_status')->nullable()->default(0);
            $table->integer('customer_id');
            $table->integer('token_status')->nullable()->default(0);
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
        Schema::dropIfExists('tokens');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
