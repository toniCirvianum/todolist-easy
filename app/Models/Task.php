<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory; //permet utilitzar factories per omplir

	protected $fillable = ['name','description','category_id']; //unics camps que es poden omplir

    public function category() {
        //Definim la categoria. Una tasca té una uncia categoria
        return $this->belongsTo(Category::class);
    }


   
}
