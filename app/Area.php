<?php

namespace App;

use Laravel\Scout\Searchable;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use NodeTrait;

    protected $fillable = ['name', 'slug'];

    /**
     * Use slug as default key
     *
     * @return void
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
