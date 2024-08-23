<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benificary extends Model
{
    use HasFactory;
    protected $table = 'benificarys';
    public $role = "benificary";
    protected $fillable = [
        'name',
        'phone',
         'password',
         'special',

    ];
    /**
     * Get the Benficaryprofile associated with the Benificary
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Benficaryprofile(): HasOne
    {
        return $this->hasOne(Benficaryprofile::class);
    }

}
