<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'link',
        'authors',
        'publication',
        'year',
        'user_id',
    ];
    public $timestamps = false;

    // protected $cast = ['authors' => 'array'];  //Conversion to an array

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
