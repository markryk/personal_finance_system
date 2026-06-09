<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Income == Receita
class Income extends Model {
    protected $fillable = [
        'description',
        'amount',
        'date',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    protected function casts(): array {
        return [
            'amount' => 'decimal:2',
            'date' => 'date',
        ];
    }
}
