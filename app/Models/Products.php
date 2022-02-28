<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Categories;

class Products extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id';

    protected $table = 'products';

    protected $fillable = ['code','name','description','category_id','updated_at','created_at','deleted_at'];

    protected $dates = ['updated_at','created_at','deleted_at'];

    protected $hidden = ['deleted_at'];

    public function categories(){
        return $this->belongsTo(Categories::class,'category_id');
    }
}
