<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'val',
        'mortgage',
        'photo',
    ];


    /**
     * @param $photo
     * @return string
     */
    public function getPhotoAttribute($photo)
    {
        return "storage/images/{$photo}";
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tenancies()
    {
        return $this->hasMany(Tenancy::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
