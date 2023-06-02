<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * @OA\Schema()
 */
class DocTemplate extends Model
{
    use HasFactory;

    public function docs() {
        return $this->hasMany(Document::class);
    }
}
