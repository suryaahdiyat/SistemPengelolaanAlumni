<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stase extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function getRouteKeyName(): string
    {
        return 'kode_stase';
    }
}
