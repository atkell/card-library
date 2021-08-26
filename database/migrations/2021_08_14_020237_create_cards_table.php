<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->tinyText('name');
            $table->tinyText('mana_cost')->nullable();;
            $table->integer('mana_cost_converted')->nullable();;
            $table->enum('colors', ['White', 'Blue', 'Black', 'Red', 'Green'])->nullable();
            $table->tinyText('type');
            $table->enum('types', ['Instant', 'Sorcery', 'Artifact', 'Creature', 'Enchantment', 'Land', 'Planeswalker']);
            $table->tinyText('subtypes')->nullable();;
            $table->enum('rarity', ['Mythic Rare', 'Rare', 'Uncommon', 'Common', 'Special', 'Land']);
            $table->tinyText('set');
            $table->tinyText('set_name');
            $table->tinyText('text')->nullable();
            $table->tinyText('flavor')->nullable();
            $table->tinyText('artist');
            $table->tinyText('number');
            $table->tinyText('power')->nullable();;
            $table->tinyText('toughness')->nullable();;
            $table->enum('layout', ['Normal', 'Split', 'Flip', 'Double-faced', 'Token', 'Plane', 'Scheme', 'Phenomenon', 'Leveler', 'Vanguard', 'Aftermath']);
            $table->integer('multiverseid')->nullable();
            $table->tinyText('gatherer_image_url')->nullable();
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
        Schema::dropIfExists('cards');
    }
}
