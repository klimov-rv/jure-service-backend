<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema()
 */
class Document extends Model
{
    use HasFactory;

    
    protected $guarded = false;
    protected $fillable = ['name'];
}