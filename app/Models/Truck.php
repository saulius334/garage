<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mechanic;

class Truck extends Model
{
    use HasFactory;

    public function getMechanic() {
        return $this->belongsTo(Mechanic::class, 'mechanic_id', 'id');
    }
}
