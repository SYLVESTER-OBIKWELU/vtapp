<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectVideo extends Model
{
    protected $fillable = [
        'project_id',
        'video_url',
        'video_type',
        'title',
        'description',
        'thumbnail',
        'display_order',
    ];

    /**
     * Get the project that owns the video.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the thumbnail URL.
     */
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }
        
        // Generate YouTube thumbnail if available
        if ($this->video_type === 'youtube') {
            $videoId = $this->getYoutubeId();
            if ($videoId) {
                return "https://img.youtube.com/vi/{$videoId}/maxresdefault.jpg";
            }
        }
        
        return asset('home/img/video-placeholder.jpg');
    }

    /**
     * Get YouTube video ID from URL.
     */
    public function getYoutubeId()
    {
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $this->video_url, $matches);
        return $matches[1] ?? null;
    }

    /**
     * Get embed URL for the video.
     */
    public function getEmbedUrlAttribute()
    {
        if ($this->video_type === 'youtube') {
            $videoId = $this->getYoutubeId();
            return $videoId ? "https://www.youtube.com/embed/{$videoId}" : $this->video_url;
        }
        
        if ($this->video_type === 'vimeo') {
            preg_match('/vimeo\.com\/(\d+)/', $this->video_url, $matches);
            $videoId = $matches[1] ?? null;
            return $videoId ? "https://player.vimeo.com/video/{$videoId}" : $this->video_url;
        }
        
        return $this->video_url;
    }

    /**
     * Scope for ordering.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }
}
