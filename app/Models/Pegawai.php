<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Pegawai extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pegawai';
    protected $table = "pegawai";
    protected $fillable = [
        'email',
        'password',
        'nama_pegawai',
        'tanggal_lahir',
        'posisi'
    ];

    // Hash password before saving
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->password = md5($model->password);
        });

        static::updating(function ($model) {
            $model->password = md5($model->password);
        });
    }
}
