<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlbumsPhotosRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        /*
        if(Schema::hasColumn('photos', 'email')){
            Schema::table('photos', function(Blueprint $table){
                $table->dropColumn('email');


            });
        }


        Schema::table('photos', function(Blueprint $table){
            $table->dropForeign('photos_album_id_foreign');
        });
        */

    }
}
