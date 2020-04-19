<?php

namespace App;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

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
