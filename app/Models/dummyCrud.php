<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dummyCrud extends Model
{
    use HasFactory;

    protected $table = 'dummy_crud';
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_name', 'contact_name', 'address', 'city'];
}
