<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColsToPostsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug')->after('title');
            $table->foreignId('updated_by')->after('user_id')->nullable;
            $table->foreignId('deleted_by')->after('updated_by')->nullable;
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
        Schema::table('posts_tables', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('updated_by');
            $table->dropColumn('deleted_by');
            $table->dropSoftDeletes();
        });
    }
}
