<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = ['id'];
    protected $with = ['user', 'reportable']; // Eager load

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Polymorphic relation (Bisa Post atau Comment)
    public function reportable()
    {
        return $this->morphTo();
    }
}
