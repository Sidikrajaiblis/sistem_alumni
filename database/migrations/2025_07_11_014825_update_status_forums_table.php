<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("ALTER TABLE forums MODIFY COLUMN status ENUM('pending', 'published', 'rejected') DEFAULT 'pending'");
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
