<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'bio', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return mixed
     */
    public function favouriteListings()
    {
        return $this->morphedByMany(Listing::class, 'favouriteable')
            ->withPivot(['created_at'])
            ->orderByPivot('created_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function viewedListings()
    {
        return $this->belongsToMany(Listing::class, 'user_listing_views')->withTimestamps()->withPivot(['count', 'id']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    /**
     * @param int $size
     * @return string
     * @description return gravatar url
     */
    public function avatar($size = 100) : String
    {
        return "https://secure.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d/=mp&s={$size}";
    }

    /**
     * @return String
     */
    public function getAvatarAttribute($vaule) : String
    {
        return $vaule ?: $this->avatar();
    }

}
