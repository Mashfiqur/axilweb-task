<?php

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
        Schema::create('coupon_assignees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coupon_id')
                ->constrained()
                ->onDelete('cascade');           
            $table->foreignId('department_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');  
            $table->foreignId('course_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');   
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
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
        Schema::dropIfExists('coupons');
    }
};
