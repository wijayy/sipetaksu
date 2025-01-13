<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    /** @use HasFactory<\Database\Factories\UmkmFactory> */
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $with = ['foto'];

    public function categories() {
        return $this->belongsTo(Categories::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function foto() {
        return $this->hasMany(Foto::class)->orderBy('order', 'asc');;
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function scopeFilters(Builder $query, array $filters) {
        $query->when($filters["search"] ?? false, function ($query, $search) {
            return $query->where("title", "like", "%$search%")
                ->orWhere("body", "like", "%$search%");
        });

        $query->when($filters["kategori"] ?? false, function ($query, $search) {
            return $query->whereHas("categories", function ($query) use ($search) {
                $query->where("slug", $search);
            });
        });
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
