<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\MaterialFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Material
 *
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $title
 * @property string|null $description
 * @property string|null $author
 * @property int $type_id
 * @property int $category_id
 * @property-read Category $category
 * @property-read Collection|Link[] $links
 * @property-read int|null $links_count
 * @property-read Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read Type $type
 * @method static MaterialFactory factory(...$parameters)
 * @method static Builder|Material newModelQuery()
 * @method static Builder|Material newQuery()
 * @method static Builder|Material query()
 * @method static Builder|Material whereAuthor($value)
 * @method static Builder|Material whereCategoryId($value)
 * @method static Builder|Material whereCreatedAt($value)
 * @method static Builder|Material whereDescription($value)
 * @method static Builder|Material whereId($value)
 * @method static Builder|Material whereTitle($value)
 * @method static Builder|Material whereTypeId($value)
 * @method static Builder|Material whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Material extends Model
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
