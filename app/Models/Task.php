<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class Task extends Model
{
    use LogsActivity;
    use CausesActivity;

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'title',
        'description',
        'isDeleted'
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
        'isDeleted' => 'Durum'
    ];
}
