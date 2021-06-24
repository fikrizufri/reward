<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Task extends Model
{
    use UsesUuid;
    // mengnonaktifkan incrementing
    public $incrementing = false;

    protected $fillable = [];
    protected $guarded = [];

    public function permissions()
    {
        return $this->hasMany(Permission::class, 'task_id')->orderBy('name');
    }
}
