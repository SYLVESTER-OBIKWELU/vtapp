<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectGuide extends Model
{
    protected $fillable = [
        'project_id',
        'title',
        'content',
        'guide_type',
        'display_order',
    ];

    /**
     * Get the project that owns the guide.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Scope for filtering by type.
     */
    public function scopeType($query, $type)
    {
        return $query->where('guide_type', $type);
    }

    /**
     * Scope for ordering.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }

    /**
     * Get guide type options.
     */
    public static function getTypeOptions()
    {
        return [
            'documentation' => 'Documentation',
            'tutorial' => 'Tutorial',
            'setup' => 'Setup Guide',
            'api' => 'API Reference',
        ];
    }
}
