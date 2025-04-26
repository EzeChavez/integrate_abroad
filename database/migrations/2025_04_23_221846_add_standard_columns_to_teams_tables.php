<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Agregar columnas estándar a la tabla teams
        Schema::table('teams', function (Blueprint $table) {
            $table->foreignId('edit_user_id')->nullable()->constrained('users')->after('personal_team');
            $table->softDeletes();
        });

        // Agregar columnas estándar a la tabla team_user
        Schema::table('team_user', function (Blueprint $table) {
            $table->foreignId('edit_user_id')->nullable()->constrained('users')->after('role');
            $table->softDeletes();
        });

        // Agregar columnas estándar a la tabla team_invitations
        Schema::table('team_invitations', function (Blueprint $table) {
            $table->foreignId('edit_user_id')->nullable()->constrained('users')->after('role');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir cambios en la tabla teams
        Schema::table('teams', function (Blueprint $table) {
            $table->dropForeign(['edit_user_id']);
            $table->dropColumn(['edit_user_id', 'deleted_at']);
        });

        // Revertir cambios en la tabla team_user
        Schema::table('team_user', function (Blueprint $table) {
            $table->dropForeign(['edit_user_id']);
            $table->dropColumn(['edit_user_id', 'deleted_at']);
        });

        // Revertir cambios en la tabla team_invitations
        Schema::table('team_invitations', function (Blueprint $table) {
            $table->dropForeign(['edit_user_id']);
            $table->dropColumn(['edit_user_id', 'deleted_at']);
        });
    }
}; 