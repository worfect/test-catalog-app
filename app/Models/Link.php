<?php

namespace App\Models;

use Database\Factories\LinkFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Link
 *
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $url
 * @property string|null $title
 * @property int $material_id
 * @property-read Material $material
 * @method static LinkFactory factory(...$parameters)
 * @method static Builder|Link newModelQuery()
 * @method static Builder|Link newQuery()
 * @method static Builder|Link query()
 * @method static Builder|Link whereCreatedAt($value)
 * @method static Builder|Link whereId($value)
 * @method static Builder|Link whereMaterialId($value)
 * @method static Builder|Link whereTitle($value)
 * @method static Builder|Link whereUpdatedAt($value)
 * @method static Builder|Link whereUrl($value)
 * @mixin Eloquent
 */
class Link extends Model
{
    use HasFactory;

    protected $fillable = ['material_id', 'title', 'url'];

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }
}
