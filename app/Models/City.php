<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Filterable, HasFactory;

    protected $fillable = ['name', 'code', 'owid'];

    protected $filterFields = [
        'name',
    ];
}
