<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//Expense = despesa
class Expense extends Model {
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
