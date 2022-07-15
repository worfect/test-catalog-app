<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Material.
 *
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $title
 * @property string|null $description
 * @property string|null $author
 * @property int $type_id
 * @property int $category_id
 * @property Category $category
 * @property Collection|Link[] $links
 * @property int|null $links_count
 * @property Collection|Tag[] $tags
 * @property int|null $tags_count
 * @property Type $type
 * @mixin Eloquent
 */
final class Material extends Model
{
    use HasFactory;

    public $relations = ['tags'];

    protected $fillable = ['title', 'description', 'author', 'type_id', 'category_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
