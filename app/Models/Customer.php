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
        'first_name', 'surname', 'email', 'phone'
    ];

    public $sortable = [
        'first_name', 'surname', 'email', 'phone'
    ];
}
