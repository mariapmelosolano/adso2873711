<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
   'name',
   'photo',
   'kind',
   'weight',
   'age',
   'breed',
   'location',
   'active',
   'status',
   'description'
    ];

    //Relationship: Pet hasOne Adoption
    public function adoption () {
        return $this->hasOne(Adoption::class);
    }
}