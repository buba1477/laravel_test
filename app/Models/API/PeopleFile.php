<?php

namespace App\Models\API;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleFile extends Model
{
    use HasFactory;

    protected $guarded = false;


    public function people()
    {
        return $this->belongsTo(Person::class, 'id_people', 'id');
    }

}
