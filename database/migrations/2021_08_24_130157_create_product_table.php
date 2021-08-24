[8:00, 24/8/2021] Paula Delgado: <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->double('cost', 10, 2);
            $table->double('price', 10, 2);
            $table->integer('quantity');
            $table->foreignId('brand_id');
            $table->foreignId('categoria_id');
            $table->timestamps();
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}