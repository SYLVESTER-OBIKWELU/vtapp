<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use App\Models\ProjectImage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectEdit extends Component
{
    use WithFileUploads;

    public Project $project;
    
    public $title = '';
    public $slug = '';
    public $short_description = '';
    public $full_description = '';
    public $category = 'web';
    public $technologies = '';
    public $live_url = '';
    public $github_url = '';
    public $video_url = '';
    public $guide_content = '';
    public $featured_image;
    public $new_gallery_images = [];
    public $gradient_color = 'from-cyan-500 to-blue-500';
    public $display_order = 0;
    public $is_active = true;
    public $show_on_homepage = false;
    public $show_on_portfolio = true;

    public $existingImages = [];

    protected function rules()
    {
        return [
            'title' => 'required|min:3|max:255',
            'slug' => 'nullable|unique:projects,slug,' . $this->project->id . '|max:255',
            'short_description' => 'nullable|max:500',
            'full_description' => 'nullable',
            'category' => 'required|in:web,mobile,design,other',
            'technologies' => 'nullable',
            'live_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'video_url' => 'nullable|url|max:255',
            'guide_content' => 'nullable',
            'featured_image' => 'nullable|image|max:2048',
            'new_gallery_images.*' => 'nullable|image|max:2048',
            'gradient_color' => 'required',
            'display_order' => 'integer|min:0',
            'is_active' => 'boolean',
            'show_on_homepage' => 'boolean',
            'show_on_portfolio' => 'boolean',
        ];
    }

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->title = $project->title;
        $this->slug = $project->slug;
        $this->short_description = $project->short_description;
        $this->full_description = $project->full_description;
        $this->category = $project->category;
        $this->technologies = is_array($project->technologies) ? implode(', ', $project->technologies) : '';
        $this->live_url = $project->live_url;
        $this->github_url = $project->github_url;
        $this->video_url = $project->video_url;
        $this->guide_content = $project->guide_content;
        $this->gradient_color = $project->gradient_color;
        $this->display_order = $project->display_order;
        $this->is_active = $project->is_active;
        $this->show_on_homepage = $project->show_on_homepage;
        $this->show_on_portfolio = $project->show_on_portfolio;
        
        $this->loadExistingImages();
    }

    public function loadExistingImages()
    {
        $this->existingImages = $this->project->images()->ordered()->get()->toArray();
    }

    public function placeholder()
    {
        return view('placeholder.spinner');
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function removeFeaturedImage()
    {
        if ($this->project->featured_image && Storage::disk('public')->exists($this->project->featured_image)) {
            Storage::disk('public')->delete($this->project->featured_image);
        }
        $this->project->featured_image = null;
        $this->project->save();
        $this->featured_image = null;
    }

    public function removeExistingImage($imageId)
    {
        $image = ProjectImage::find($imageId);
        if ($image && $image->project_id === $this->project->id) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
            $this->loadExistingImages();
            session()->flash('success', 'Image removed successfully!');
        }
    }

    public function setAsPrimary($imageId)
    {
        // Reset all images to non-primary
        $this->project->images()->update(['is_primary' => false]);
        
        // Set selected image as primary
        $image = ProjectImage::find($imageId);
        if ($image && $image->project_id === $this->project->id) {
            $image->is_primary = true;
            $image->save();
            $this->loadExistingImages();
            session()->flash('success', 'Primary image updated!');
        }
    }

    public function removeNewGalleryImage($index)
    {
        array_splice($this->new_gallery_images, $index, 1);
    }

    public function save()
    {
        $this->validate();

        // Process technologies
        $techArray = [];
        if (!empty($this->technologies)) {
            $techArray = array_map('trim', explode(',', $this->technologies));
            $techArray = array_filter($techArray);
        }

        // Handle featured image upload
        if ($this->featured_image) {
            // Delete old featured image
            if ($this->project->featured_image && Storage::disk('public')->exists($this->project->featured_image)) {
                Storage::disk('public')->delete($this->project->featured_image);
            }
            $this->project->featured_image = $this->featured_image->store('projects/featured', 'public');
        }

        // Update the project
        $this->project->update([
            'title' => $this->title,
            'slug' => $this->slug ?: Str::slug($this->title),
            'short_description' => $this->short_description,
            'full_description' => $this->full_description,
            'category' => $this->category,
            'technologies' => $techArray,
            'live_url' => $this->live_url,
            'github_url' => $this->github_url,
            'video_url' => $this->video_url,
            'guide_content' => $this->guide_content,
            'featured_image' => $this->project->featured_image,
            'gradient_color' => $this->gradient_color,
            'display_order' => $this->display_order,
            'is_active' => $this->is_active,
            'show_on_homepage' => $this->show_on_homepage,
            'show_on_portfolio' => $this->show_on_portfolio,
        ]);

        // Handle new gallery images
        if (!empty($this->new_gallery_images)) {
            $maxOrder = $this->project->images()->max('display_order') ?? -1;
            foreach ($this->new_gallery_images as $index => $image) {
                $path = $image->store('projects/gallery', 'public');
                $this->project->images()->create([
                    'image_path' => $path,
                    'alt_text' => $this->title . ' - Image ' . ($maxOrder + $index + 2),
                    'is_primary' => false,
                    'display_order' => $maxOrder + $index + 1,
                ]);
            }
        }

        session()->flash('success', 'Project updated successfully!');
        return redirect()->route('admin.projects.index');
    }

    public function render()
    {
        $categories = [
            'web' => 'Web Apps',
            'mobile' => 'Mobile',
            'design' => 'Design',
            'other' => 'Other',
        ];

        $gradientOptions = [
            'from-cyan-500 to-blue-500' => 'Cyan to Blue',
            'from-purple-500 to-pink-500' => 'Purple to Pink',
            'from-green-500 to-teal-500' => 'Green to Teal',
            'from-orange-500 to-red-500' => 'Orange to Red',
            'from-yellow-500 to-orange-500' => 'Yellow to Orange',
            'from-indigo-500 to-purple-500' => 'Indigo to Purple',
            'from-pink-500 to-rose-500' => 'Pink to Rose',
            'from-teal-500 to-cyan-500' => 'Teal to Cyan',
            'from-emerald-500 to-teal-500' => 'Emerald to Teal',
            'from-violet-500 to-purple-500' => 'Violet to Purple',
        ];

        return view('livewire.admin.projects.project-edit', compact('categories', 'gradientOptions'));
    }
}
