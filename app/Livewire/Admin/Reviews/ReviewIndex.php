<?php

namespace App\Livewire\Admin\Reviews;

use App\Models\Review;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Url;

class ReviewIndex extends Component
{
    use WithPagination, WithFileUploads;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $status = '';

    #[Url(history: true)]
    public $perPage = 10;

    public $showDeleteModal = false;
    public $reviewToDelete = null;

    // Edit modal properties
    public $showEditModal = false;
    public $editingReview = null;
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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function placeholder()
    {
        return view('placeholder.spinner');
    }

    public function confirmDelete($reviewId)
    {
        $this->reviewToDelete = $reviewId;
        $this->showDeleteModal = true;
    }

    public function deleteReview()
    {
        if ($this->reviewToDelete) {
            $review = Review::find($this->reviewToDelete);
            if ($review) {
                // Delete reviewer image from storage
                if ($review->reviewer_image && Storage::disk('public')->exists($review->reviewer_image)) {
                    Storage::disk('public')->delete($review->reviewer_image);
                }
                
                $review->delete();
                session()->flash('success', 'Review deleted successfully!');
            }
        }
        
        $this->showDeleteModal = false;
        $this->reviewToDelete = null;
    }

    public function toggleActive($reviewId)
    {
        $review = Review::find($reviewId);
        if ($review) {
            $review->is_active = !$review->is_active;
            $review->save();
            session()->flash('success', 'Review status updated!');
        }
    }

    public function toggleFeatured($reviewId)
    {
        $review = Review::find($reviewId);
        if ($review) {
            $review->is_featured = !$review->is_featured;
            $review->save();
            session()->flash('success', 'Featured status updated!');
        }
    }

    public function updateOrder($reviewId, $direction)
    {
        $review = Review::find($reviewId);
        if ($review) {
            if ($direction === 'up' && $review->display_order > 0) {
                $review->display_order--;
            } elseif ($direction === 'down') {
                $review->display_order++;
            }
            $review->save();
        }
    }

    public function editReview($reviewId)
    {
        $review = Review::find($reviewId);
        if ($review) {
            $this->editingReview = $review;
            $this->reviewer_name = $review->reviewer_name;
            $this->reviewer_title = $review->reviewer_title ?? '';
            $this->company_name = $review->company_name ?? '';
            $this->company_tagline = $review->company_tagline ?? '';
            $this->company_website = $review->company_website ?? '';
            $this->review_text = $review->review_text;
            $this->rating = $review->rating;
            $this->gradient_color = $review->gradient_color;
            $this->is_featured = $review->is_featured;
            $this->is_active = $review->is_active;
            $this->display_order = $review->display_order;
            $this->showEditModal = true;
        }
    }

    public function updateReview()
    {
        $this->validate([
            'reviewer_name' => 'required|min:2|max:255',
            'reviewer_title' => 'nullable|max:255',
            'company_name' => 'nullable|max:255',
            'company_tagline' => 'nullable|max:255',
            'company_website' => 'nullable|url|max:255',
            'reviewer_image' => 'nullable|image|max:2048',
            'review_text' => 'required|min:10',
            'rating' => 'required|integer|min:1|max:5',
            'gradient_color' => 'required',
            'display_order' => 'integer|min:0',
        ]);

        // Handle reviewer image upload
        $reviewerImagePath = $this->editingReview->reviewer_image;
        if ($this->reviewer_image) {
            // Delete old image if exists
            if ($reviewerImagePath && Storage::disk('public')->exists($reviewerImagePath)) {
                Storage::disk('public')->delete($reviewerImagePath);
            }
            $reviewerImagePath = $this->reviewer_image->store('reviews', 'public');
        }

        // Update review
        $this->editingReview->update([
            'reviewer_name' => $this->reviewer_name,
            'reviewer_title' => $this->reviewer_title,
            'company_name' => $this->company_name,
            'company_tagline' => $this->company_tagline,
            'company_website' => $this->company_website,
            'reviewer_image' => $reviewerImagePath,
            'review_text' => $this->review_text,
            'rating' => $this->rating,
            'gradient_color' => $this->gradient_color,
            'is_featured' => $this->is_featured,
            'is_active' => $this->is_active,
            'display_order' => $this->display_order,
        ]);

        session()->flash('success', 'Review updated successfully!');
        $this->closeEditModal();
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
        $this->editingReview = null;
        $this->reset([
            'reviewer_name', 'reviewer_title', 'company_name', 'company_tagline',
            'company_website', 'reviewer_image', 'review_text', 'rating',
            'gradient_color', 'is_featured', 'is_active', 'display_order'
        ]);
    }

    public function render()
    {
        $reviews = Review::query()
            ->search($this->search)
            ->when($this->status === 'active', fn($q) => $q->where('is_active', true))
            ->when($this->status === 'inactive', fn($q) => $q->where('is_active', false))
            ->when($this->status === 'featured', fn($q) => $q->where('is_featured', true))
            ->ordered()
            ->paginate($this->perPage);

        return view('livewire.admin.reviews.review-index', compact('reviews'));
    }
}
