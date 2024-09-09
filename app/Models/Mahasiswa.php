<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $hidden = [
        'angkatan',
        'created_at',
        'updated_at'
    ];

    public function alumni(){
        return $this->hasOne(Alumni::class);
    }

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }

    public function getRouteKeyName() : string
    {
        return 'nim';
    }
}
