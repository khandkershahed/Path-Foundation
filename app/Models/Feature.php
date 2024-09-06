<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory, HasSlug;
    protected $slugSourceColumn = 'title';
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function rowOne()
    {
        return $this->belongsTo(Row::class, 'row_one_id');
    }

    public function rowTwo()
    {
        return $this->belongsTo(Row::class, 'row_two_id');
    }
}
