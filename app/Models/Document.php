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

    public function doc_template()
    {
        return $this->belongsTo(DocTemplate::class);
    }

    protected $guarded = false;
    protected $fillable = ['name'];
}