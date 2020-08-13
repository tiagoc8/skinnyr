<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
     }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'weight', 'created_at', 'user_id',
    ];
}
