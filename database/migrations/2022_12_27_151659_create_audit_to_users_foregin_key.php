<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditToUsersForeginKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_audit', function (Blueprint $table) {
            $table->foreign(['user_id'], 'fk-audit_to_user')
                   ->references(['id'])
                   ->on('users')
                   ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_audit', function (Blueprint $table) {
            $table->dropForeign('fk-audit_to_user');
        });
    }
}
