<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpdeskTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('helpdesk_tickets', function (Blueprint $table) {
       $table->increments('id');
       $table->integer('user_id');
       $table->enum('type',['it', 'admin']);
      /* $table->timestamps('start_date')->nullable();
      $table->timestamps('end_date')->nullable(); */
      $table->enum('priority',['low','medium','high']); 
      $table->text('description');  
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
      Schema::dropIfExists('helpdesk_tickets');
    }
  }
