<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
            $table->id();                     
            $table->string("operatorId");        
            $table->string("name");             
            $table->string("bundle");            
            $table->string("data");              
            $table->string("pin");                  
            $table->string("supportsLocalAmounts");        
            $table->string("denominationType");           
            $table->string("senderCurrencyCode");            
            $table->string("senderCurrencySymbol");                         
            $table->string("destinationCurrencyCode");       
            $table->string("destinationCurrencySymbol");     
            $table->string("commission");                        
            $table->string("internationalDiscount");         
            $table->string("localDiscount");               
            $table->string("mostPopularAmount");         
            $table->string("minAmount");              
            $table->string("maxAmount");              
            $table->string("localMinAmount");            
            $table->string("localMaxAmount");             
            $table->string("country"); 
            $table->string("fx");
            $table->string("logoUrls");
            $table->string("fixedAmounts");
            $table->string("fixedAmountsDescriptions");
            $table->string("localFixedAmounts");
            $table->string("localFixedAmountsDescriptions");
            $table->string("suggestedAmounts");
            $table->string("suggestedAmountsMap");
            $table->string("promotions");
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
        Schema::dropIfExists('operators');
    }
}
