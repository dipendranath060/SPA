<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'title',
        'service_slug',
        'description',
        'image',
        'price1',
        'price2',
        'price3',
        'price4'
    ];
}
