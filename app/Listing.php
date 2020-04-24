<?php

namespace App;

use App\Traits\Eloquent\OrderableTrait;
use App\Traits\Eloquent\PivotOrderableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Listing extends Model implements HasMedia
{
    use SoftDeletes,
        OrderableTrait,
        InteractsWithMedia,
//        Searchable,
        PivotOrderableTrait;

    /**
     * Word count for excerpt
     */
    const EXCERPT_WORD_COUNT = 8;

    /**
     * Use as primary key instead of normal id
     * @var string
     */
//    protected $primaryKey = 'id';

    /**
     * User string for primary key
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Do not increment id
     * @var bool
     */
//    public $incrementing = false;


    protected $fillable = [
        'id',
        'title',
        'key',
        'body',
        'category_id',
        'area_id',
        'area_parent_id',
        'user_id',
        'url',
        'price',
        'created_at',
        'expire_at'
    ];

    protected $casts = [
        'live',
        'created_at',
        'updated_at',
        'expire_at'
    ];

    protected $appends = [
        'province_id'
    ];

    /**
     * Use key as primary key
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'key';
    }


    /**
     * @return int
     */
    public function getProvinceIdAttribute()
    {
        return $this->area->parent_id;
    }


    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsLive($query)
    {
        return $query->whereNotNull('live');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsNotLive($query)
    {
        return $query->whereNull('live');
    }

    /**
     * @param $query
     * @param Category $category
     * @return mixed
     */
    public function scopeFromCategory($query, Category $category)
    {
        return $query->where('category_id', $category->id);
    }


    /**
     * @param $query
     * @param Area $area
     * @return mixed
     */
    public function scopeInArea($query, Area $area)
    {
        return $query->whereIn('area_id', array_merge(
            [$area->id],
            $area->descendants->pluck('id')->toArray()
        ));
    }

    /**
     * @return string
     */
    public function excerpt()
    {
        return Str::words($this->body, self::EXCERPT_WORD_COUNT);
    }

    /**
     * @return mixed
     */
    public function isLive()
    {
        return $this->live;
    }

    /**
     * @return mixed
     */
    public function cost()
    {
        return $this->category->price;
    }


    /**
     * @param User $user
     * @return bool
     */
    public function ownedByUser(User $user)
    {
        return $this->user->id === $user->id;
    }

    /**
     * @return array
     */
    public function toSearchableArray()
    {
        $properties = $this->toArray();

        $properties['created_at_human'] = $this->created_at->diffForHumans();
        $properties['user'] = $this->user;
        $properties['category'] = $this->category;
        $properties['area'] = $this->area;

        return $properties;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function favourites()
    {
        return $this->morphToMany(User::class, 'favouriteable');
    }

    /**
     * @param User $user
     * @return mixed
     */
    public function favouritedBy(User $user)
    {
        return $this->favourites->contains($user);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function viewedUsers()
    {
        return $this->belongsToMany(User::class, 'user_listing_views')->withTimestamps()->withPivot(['count']);
    }

    /**
     * @return mixed
     */
    public function views()
    {
        // return array_sum($this->viewedUsers->pluck('pivot.count')->toArray());
        return $this->viewedUsers()->sum('count');
    }


    /**
     * Media conversions
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('listing')
            ->registerMediaConversions(function (Media $media) {
                foreach (config('farmersfriend.img') as $key => $value) {
                    $this->addMediaConversion($key)
//                        ->fit(Manipulations::FIT_CROP, (int) $value['width'], (int) $value['height'])
                        ->crop(Manipulations::CROP_CENTER, (int) $value['width'], (int) $value['height'])
                        ->sharpen(5)
                        ->optimize()
                        ->width((int) $value['width'])
                        ->height((int)$value['height']);
                }
        });
    }


}
