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
        Schema::create('plan_tenant', function (Blueprint $table) {
            $table->string('tenant_id'); // Stancl tenancy uses string/uuid for tenant id
            $table->unsignedBigInteger('plan_id');
            $table->primary(['tenant_id', 'plan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_tenant');
    }
};
