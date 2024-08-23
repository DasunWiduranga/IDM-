<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Batch extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'label',
        'intake_start',
        'intake_end',
    ];

    /**
     * Define the relationship with the Student model.
     * Assuming a batch has many students.
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'batch_label', 'label');
    }
}
