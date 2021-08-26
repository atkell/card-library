<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mana_cost',
        'mana_cost_converted',
        'colors',
        'type',
        'types',
        'subtypes',
        'rarity',
        'set',
        'set_name',
        'text',
        'flavor',
        'artist',
        'number',
        'power',
        'toughness',
        'layout',
        'multiverseid',
        'gatherer_image_url'
    ];
}
