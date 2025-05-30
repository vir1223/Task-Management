<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $table='tasks';
    protected $fillable=['judul','isi','jenis','difficulty','condition','tanggal'];
    public function jenis()
    {
        return $this->belongsTo(jenis::class);
    }
}
