<?php

namespace App\Models;

use App\Models\API\PeopleFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = false;

    public function peopleFiles()
    {
        return $this->hasMany(PeopleFile::class, 'id_people', 'id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($person) {
            $person->peopleFiles()->delete();
        });
    }

}
