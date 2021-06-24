<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Storage;

class Customer extends Model
{
    use UsesUuid;
    protected $table = "customer";
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $fillable = [];
    protected $guarded = [];

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getUsernameAttribute()
    {
        if ($this->hasUser) {
            return $this->hasUser->username;
        }
    }

    public function getEmailAttribute()
    {
        if ($this->hasUser) {
            return $this->hasUser->email;
        }
    }

    public function getIconAttribute()
    {
        if ($this->hasUser) {
            return
                "<img height='100' class='text-center' src='" . asset('storage/File/' . $this->hasUser->icon) . "'>";
        }
    }

    public function setNamaAttribute($value)
    {
        $this->attributes['nama'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
