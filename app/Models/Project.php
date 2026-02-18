<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'full_description',
        'category',
        'technologies',
        'live_url',
        'github_url',
        'video_url',
        'guide_content',
        'featured_image',
        'gradient_color',
        'display_order',
        'is_active',
        'show_on_homepage',
        'show_on_portfolio',
    ];

    protected $casts = [
        'technologies' => 'array',
        'is_active' => 'boolean',
        'show_on_homepage' => 'boolean',
        'show_on_portfolio' => 'boolean',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });

        static::updating(function ($project) {
            if ($project->isDirty('title') && empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

    /**
     * Get the images for the project.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)->orderBy('display_order');
    }

    /**
     * Get the videos for the project.
     */
    public function videos(): HasMany
    {
        return $this->hasMany(ProjectVideo::class)->orderBy('display_order');
    }

    /**
     * Get the guides for the project.
     */
    public function guides(): HasMany
    {
        return $this->hasMany(ProjectGuide::class)->orderBy('display_order');
    }

    /**
     * Get the primary image for the project.
     */
    public function primaryImage()
    {
        return $this->images()->where('is_primary', true)->first();
    }

    /**
     * Scope for active projects.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for homepage projects.
     */
    public function scopeHomepage($query)
    {
        return $query->where('show_on_homepage', true)->where('is_active', true);
    }

    /**
     * Scope for portfolio projects.
     */
    public function scopePortfolio($query)
    {
        return $query->where('show_on_portfolio', true)->where('is_active', true);
    }

    /**
     * Scope for ordering by display order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('created_at', 'desc');
    }

    /**
     * Scope for filtering by category.
     */
    public function scopeCategory($query, $category)
    {
        if ($category && $category !== 'all') {
            return $query->where('category', $category);
        }
        return $query;
    }

    /**
     * Scope for search functionality.
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }
        return $query;
    }

    /**
     * Get the featured image URL.
     */
    public function getFeaturedImageUrlAttribute()
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('home/img/placeholder.jpg');
    }

    /**
     * Get technologies as array.
     */
    public function getTechnologiesArrayAttribute()
    {
        return is_array($this->technologies) ? $this->technologies : [];
    }
}
