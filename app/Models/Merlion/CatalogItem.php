<?php

namespace App\Models\Merlion;

use Illuminate\Database\Eloquent\Model;

class CatalogItem extends Model
{
    const TABLE_NAME = 'merlion_catalog';

    protected $table = self::TABLE_NAME;

    protected $fillable = ['id', 'parent_id', 'description'];

}