<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class memo extends Model
{
    protected $table='memos';
    protected $fillable=['judul','isi','jenis','difficulty','condition','tanggal'];
    public function jenis()
    {
        return $this->belongsTo(jenis::class);
    }
}
