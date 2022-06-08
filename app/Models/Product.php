<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
       'user', 'person', 'name', 'description', 'status', 'tech'
    ];

    public $sortable = [
        'user', 'person', 'name', 'description', 'status', 'tech'
     ];

     public function category()
    {
        return $this->belongsTo('AppCategory');
    }
}
