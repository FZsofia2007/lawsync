<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseFile extends Model
{
    /** @use HasFactory<\Database\Factories\CaseFileFactory> */
    use HasFactory;
    use SoftDeletes;
}
