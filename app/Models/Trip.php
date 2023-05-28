<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
    protected $fillable = [
        'nbr_jour',
        'image1',
        'image2',
        'image3',
        'image4',
        'localisation',
        'title',
        'description',
        'date',
        'prix',
    ];
}
