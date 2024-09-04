<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Student extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'name',
        'email',
        'batch_id',
        'batch_label',
    ];
    /**
     * Define the relationship with the Batch model.
     * Assuming a student belongs to a batch.
     */
    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_label', 'label');
    }
}
