<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'alamat', 'nomor_telepon', 'keluhan', 'poli_id'];

    protected $hidden = ['created_at', 'updated_at'];


    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
}
