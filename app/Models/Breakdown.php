<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model
{
    use HasFactory;

    const STATUS = [
        1 => 'Created',
        2 => 'In progress',
        3 => 'Finished'
    ];
}
