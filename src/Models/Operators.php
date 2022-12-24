<?php

namespace Towoju5\Reloadly\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operators extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
}
