<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'reviewer_name',
        'reviewer_title',
        'company_name',
        'company_tagline',
        'company_website',
        'reviewer_image',
        'review_text',
        'rating',
        'gradient_color',
        'is_featured',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'rating' => 'integer',
    ];

    /**
     * Scope for active reviews.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for featured reviews.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->where('is_active', true);
    }

    /**
     * Scope for ordering.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('created_at', 'desc');
    }

    /**
     * Scope for search functionality.
     */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('reviewer_name', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('review_text', 'like', "%{$search}%");
            });
        }
        return $query;
    }

    /**
     * Get the reviewer image URL.
     */
    public function getReviewerImageUrlAttribute()
    {
        if ($this->reviewer_image) {
            return asset('storage/' . $this->reviewer_image);
        }
        return asset('home/img/testimonials/default-avatar.png');
    }

    /**
     * Get gradient color options.
     */
    public static function getGradientOptions()
    {
        return [
            'from-cyan-400 to-blue-500' => 'Cyan to Blue',
            'from-purple-400 to-pink-500' => 'Purple to Pink',
            'from-green-400 to-teal-500' => 'Green to Teal',
            'from-orange-400 to-red-500' => 'Orange to Red',
            'from-yellow-400 to-orange-500' => 'Yellow to Orange',
            'from-indigo-400 to-purple-500' => 'Indigo to Purple',
            'from-pink-400 to-rose-500' => 'Pink to Rose',
            'from-teal-400 to-cyan-500' => 'Teal to Cyan',
        ];
    }
}
