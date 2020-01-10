<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public $guarded = [];

    public function marca()
    {
      return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function categoria()
    {
      return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
