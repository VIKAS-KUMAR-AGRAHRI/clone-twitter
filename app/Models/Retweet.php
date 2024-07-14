<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retweet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tweet_id'];
    public function tweet()
{
    return $this->belongsTo(Tweet::class);
}


}
