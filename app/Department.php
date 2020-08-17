<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'department' 
    ];
    
    public function employees() 
    {
        return $this->belongsToMany(Employee::class);
    }
    
}
