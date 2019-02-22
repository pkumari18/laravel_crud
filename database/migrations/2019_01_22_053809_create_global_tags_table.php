<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlobalTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('global_tags', function (Blueprint $table) {
       $table->increments('id');
       $table->string('tag');  
       $table->integer('int_val')->nullable();  
       $table->string('varchar_val')->nullable();  
       $table->text('text_val');  
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
      Schema::dropIfExists('global_tags');
    }
  }
