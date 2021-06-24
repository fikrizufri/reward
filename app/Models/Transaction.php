<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $fillable = [];
    protected $guarded = [];
}
