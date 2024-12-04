<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExhibitionEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'exhibition_id',
        'email',
    ];

    public function exhibition()
    {
        return $this->belongsTo(Exhibition::class);
    }
}
