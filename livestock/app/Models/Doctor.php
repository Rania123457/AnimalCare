<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    public $role = "doctor";
    protected $fillable = [
        'name',
        'phone',
         'password',
         'special',

    ];

      /**
     * Get the Doctorprofile associated with the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Doctorprofile(): HasOne
    {
        return $this->hasOne(Doctorprofile::class);
    }

}
