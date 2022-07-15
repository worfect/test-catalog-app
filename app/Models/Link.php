<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Link.
 *
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $url
 * @property string|null $title
 * @property int $material_id
 * @property Material $material
 * @mixin Eloquent
 */
final class Link extends Model
{
    use HasFactory;

    protected $fillable = ['material_id', 'title', 'url'];

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
}
