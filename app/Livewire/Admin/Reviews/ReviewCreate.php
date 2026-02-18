<?php

namespace App\Livewire\Admin\Reviews;

use App\Models\Review;
use Livewire\Component;
use Livewire\WithFileUploads;

class ReviewCreate extends Component
{
    use WithFileUploads;

    public $reviewer_name = '';
    public $reviewer_title = '';
    public $company_name = '';
    public $company_tagline = '';
    public $company_website = '';
    public $reviewer_image;
    public $review_text = '';
    public $rating = 5;
    public $gradient_color = 'from-cyan-400 to-blue-500';
    public $is_featured = false;
    public $is_active = true;
    public $display_order = 0;

    protected $rules = [
        'reviewer_name' => 'required|min:2|max:255',
        'reviewer_title' => 'nullable|max:255',
        'company_name' => 'nullable|max:255',
        'company_tagline' => 'nullable|max:255',
        'company_website' => 'nullable|url|max:255',
        'reviewer_image' => 'nullable|image|max:2048',
        'review_text' => 'required|min:10',
        'rating' => 'required|integer|min:1|max:5',
        'gradient_color' => 'required',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'display_order' => 'integer|min:0',
    ];

    public function placeholder()
    {
        return view('placeholder.spinner');
    }

    public function removeImage()
    {
        $this->reviewer_image = null;
    }

    public function save()
    {
        $this->validate();

        // Handle image upload
        $imagePath = null;
        if ($this->reviewer_image) {
            $imagePath = $this->reviewer_image->store('reviews', 'public');
        }

        // Create the review
        Review::create([
            'reviewer_name' => $this->reviewer_name,
            'reviewer_title' => $this->reviewer_title,
            'company_name' => $this->company_name,
            'company_tagline' => $this->company_tagline,
            'company_website' => $this->company_website,
            'reviewer_image' => $imagePath,
            'review_text' => $this->review_text,
            'rating' => $this->rating,
            'gradient_color' => $this->gradient_color,
            'is_featured' => $this->is_featured,
            'is_active' => $this->is_active,
            'display_order' => $this->display_order,
        ]);

        session()->flash('success', 'Review created successfully!');
        return redirect()->route('admin.reviews.index');
    }

    public function render()
    {
        $gradientOptions = Review::getGradientOptions();

        return view('livewire.admin.reviews.review-create', compact('gradientOptions'));
    }
}
