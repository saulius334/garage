<?php

namespace App\Models;

use App\Models\Truck;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Breakdown extends Model
{
    use HasFactory;

    const STATUS = [
        1 => 'Created',
        2 => 'In progress',
        3 => 'Finished'
    ];
    public function getTruck() {
        return $this->belongsTo(Truck::class, 'truck_id', 'id');
    }
}
