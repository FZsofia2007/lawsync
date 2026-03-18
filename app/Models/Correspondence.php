<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Correspondence extends Model
{
    /** @use HasFactory<\Database\Factories\CorrespondenceFactory> */
    use HasFactory;
    use SoftDeletes;
}
