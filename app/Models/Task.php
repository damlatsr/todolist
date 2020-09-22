<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{

    use SoftDeletes;
    /**
     * @inheritDoc
     */
    protected $fillable = [
        'title',
        'description',
        'isDone'
    ];

    /**
     * The labels of table columns
     * Generated via php artisan dev:generate:labels Company
     *
     * @var array
     */
    public static $labels = [
        'title' => 'Başlık',
        'description' => 'Açıklama',
        'isDone' => 'Tamamlandı'
    ];
}
