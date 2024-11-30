<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExhibitionContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'exhibition_id',
        'name',
        'telephone',
    ];

    public function exhibition()
    {
        return $this->belongsTo(Exhibition::class);
    }
}
