<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    protected $table='jenis';
    protected $fillable=['name'];
    public function task()
    {
        return $this->hasMany(jenis::class);
    }
    public function memo()
    {
        return $this->hasMany(jenis::class);
    }
}
