<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokter extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'poli_id', 'alamat', 'nomor_telepon'];
    protected $hidden = ['created_at', 'updated_at'];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }
}
