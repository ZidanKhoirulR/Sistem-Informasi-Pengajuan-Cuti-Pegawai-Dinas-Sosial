<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_admin';
    protected $table = "admin";
    protected $fillable = [
        'email',
        'password',
        'nama_admin',
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
