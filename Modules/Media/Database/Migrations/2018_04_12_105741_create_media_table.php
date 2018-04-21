<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create( (new \Media)->getTable(), function (Blueprint $table) 
        {
            $table->increments('id');
            $table->nullableMorphs('model');
            $table->string('collection_name')->nullable();
            $table->string('name')->nullable();
            $table->string('file_name')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('disk')->nullable();
            $table->unsignedInteger('size')->nullable();
            $table->json('manipulations')->nullable();
            $table->json('custom_properties')->nullable();
            $table->json('responsive_images')->nullable();
            $table->unsignedInteger('order_column')->nullable();
            $table->nullableTimestamps();
            /*
            $table->string('filename');
            $table->string('path');
            $table->string('extension');
            $table->string('mimetype');
            $table->string('filesize');
            $table->integer('folder_id')->unsigned();
            */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists( (new \Media)->getTable() );
    }
}
