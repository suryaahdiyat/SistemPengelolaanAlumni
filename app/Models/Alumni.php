<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['mahasiswa'];

    // protected $hidden = ['created_at', 'updated_at', 'tahun_lulus'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
