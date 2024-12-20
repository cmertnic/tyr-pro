<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestt extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'cost',
        'tour_id',
        'user_id',

    ];
         /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tours()
    {
        return $this->belongsTo(Tours::class); 
    }
    public function settours(Tours $tours)
    {
        $this->tours_id = $tours->id;
        return $this;
    }

    public function gettours()
    {
        return tours::find($this->tours_id);
    }
}