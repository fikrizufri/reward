<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $fillable = [];
    protected $guarded = [];
}
