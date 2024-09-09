<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['mahasiswa', 'stase'];

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
    public function stase(){
        return $this->belongsTo(Stase::class);
    }
}
