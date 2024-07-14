<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'users';

    // Specify which fields can be mass-assigned
    protected $fillable = [
        'name', 
        'email',  
        'password'
    ];

    // Specify which fields should be hidden when serializing the model
    protected $hidden = ['password'];
}
