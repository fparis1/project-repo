<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'name', 'email', 'phone'
    ];

    public $sortable = [
        'name', 'email', 'phone'
    ];
}
