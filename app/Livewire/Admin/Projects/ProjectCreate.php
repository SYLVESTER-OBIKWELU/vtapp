<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ProjectCreate extends Component
{
    use WithFileUploads;

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
    public $gallery_images = [];
    public $gradient_color = 'from-cyan-500 to-blue-500';
    public $display_order = 0;
    public $is_active = true;
    public $show_on_homepage = false;
    public $show_on_portfolio = true;

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'slug' => 'nullable|unique:projects,slug|max:255',
        'short_description' => 'nullable|max:500',
        'full_description' => 'nullable',
        'category' => 'required|in:web,mobile,design,other',
        'technologies' => 'nullable',
        'live_url' => 'nullable|url|max:255',
        'github_url' => 'nullable|url|max:255',
        'video_url' => 'nullable|url|max:255',
        'guide_content' => 'nullable',
        'featured_image' => 'nullable|image|max:2048',
        'gallery_images.*' => 'nullable|image|max:2048',
        'gradient_color' => 'required',
        'display_order' => 'integer|min:0',
        'is_active' => 'boolean',
        'show_on_homepage' => 'boolean',
        'show_on_portfolio' => 'boolean',
    ];

    public function updatedTitle()
    {
        if (empty($this->slug)) {
            $this->slug = Str::slug($this->title);
        }
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function placeholder()
    {
        return view('placeholder.spinner');
    }

    public function removeFeaturedImage()
    {
        $this->featured_image = null;
    }

    public function removeGalleryImage($index)
    {
        array_splice($this->gallery_images, $index, 1);
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
        $featuredImagePath = null;
        if ($this->featured_image) {
            $featuredImagePath = $this->featured_image->store('projects/featured', 'public');
        }

        // Create the project
        $project = Project::create([
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
            'featured_image' => $featuredImagePath,
            'gradient_color' => $this->gradient_color,
            'display_order' => $this->display_order,
            'is_active' => $this->is_active,
            'show_on_homepage' => $this->show_on_homepage,
            'show_on_portfolio' => $this->show_on_portfolio,
        ]);

        // Handle gallery images
        if (!empty($this->gallery_images)) {
            foreach ($this->gallery_images as $index => $image) {
                $path = $image->store('projects/gallery', 'public');
                $project->images()->create([
                    'image_path' => $path,
                    'alt_text' => $this->title . ' - Image ' . ($index + 1),
                    'is_primary' => $index === 0 && !$featuredImagePath,
                    'display_order' => $index,
                ]);
            }
        }

        session()->flash('success', 'Project created successfully!');
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

        return view('livewire.admin.projects.project-create', compact('categories', 'gradientOptions'));
    }
}
