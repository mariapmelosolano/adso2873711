<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'description',
        'active',
        'status'
    ];

    // Relationship: Pet hasOne Adoption
    public function adoption() {
        return $this->hasOne(Adoption::class);
    }

    // Scope for search
    public function scopeNames($query, $q) {
        if (trim($q)) {
            return $query->where('name', 'LIKE', "%$q%")
                ->orWhere('breed', 'LIKE', "%$q%")
                ->orWhere('location', 'LIKE', "%$q%");
        }
        return $query;
    }
}