<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Area extends Model
{
    use NodeTrait;

    protected $fillable = ['name', 'slug'];

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
