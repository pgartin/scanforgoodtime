<?php

use App\Models\Code;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique();
            $table->string('name');
            $table->string('content');
            $table->integer('type');
            $table->timestamps();
        });

        Code::create([
            'code' => 8764,
            'name' => 'First',
            'content' => 'https://m.media-amazon.com/images/M/MV5BNDM5MmY0ZDgtYjk2Yy00ZTIxLWI4YWQtNmEyM2NkYjMzY2RhXkEyXkFqcGdeQXVyMTUzNjUyNTcz._V1_.jpg',
            'type' => Code::IMAGE,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codes');
    }
};
