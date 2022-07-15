<?php

declare(strict_types=1);

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Category.
 *
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $title
 * @property Collection|Material[] $materials
 * @property int|null $materials_count
 * @mixin Eloquent
 */
final class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }
}
