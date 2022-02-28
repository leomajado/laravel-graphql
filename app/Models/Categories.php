<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Products;

class Categories extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = 'categories';

    protected $fillable = ['name','description','updated_at','created_at','deleted_at'];

    protected $dates = ['updated_at','created_at','deleted_at'];

    protected $hidden = ['description','updated_at','created_at','deleted_at'];

    public function product(){
        return $this->hasMany(Products::class);
    }
}
