<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        $table->foreignId('warehouse_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        $table->foreignId('branch_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        $table->foreignId('product_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        $table->date('purchase_date');
        $table->tinyInteger('purchage_status')->default('0');
        $table->double('purchage_quantity');
        $table->double('purchage_unit_price');
        $table->double('parchage_payable_amount');
        $table->double('purchage_paid_amont')->default(0)->nullable();;
        $table->double('parchage_due_amount');
        $table->text('product_description')->nullable();
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
        Schema::dropIfExists('purchages');
    }
}
