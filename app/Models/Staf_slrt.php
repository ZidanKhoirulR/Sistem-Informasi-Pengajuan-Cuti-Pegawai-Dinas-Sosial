<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staf_slrt extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_staf_slrt';
    protected $table = "staf_slrt";
    protected $fillable = [
        'nama_staf_slrt',
        'email',
        'password',
    ];
    public $timestamps = false;

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
