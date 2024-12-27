<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    /** @use HasFactory<\Database\Factories\FotoFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function umkm() {
        return $this->belongsTo(Umkm::class);
    }


}
