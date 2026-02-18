<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Url;

class ProjectIndex extends Component
{
    use WithPagination, WithFileUploads;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $category = '';

    #[Url(history: true)]
    public $status = '';

    #[Url(history: true)]
    public $perPage = 10;

    public $showDeleteModal = false;
    public $projectToDelete = null;

    // Edit modal properties
    public $showEditModal = false;
    public $editingProject = null;
    public $title = '';
    public $slug = '';
    public $short_description = '';
    public $full_description = '';
    public $editCategory = 'web';
    public $technologies = '';
    public $live_url = '';
    public $github_url = '';
    public $video_url = '';
    public $featured_image;
    public $gradient_color = 'from-cyan-500 to-blue-500';
    public $display_order = 0;
    public $is_active = true;
    public $show_on_homepage = false;
    public $show_on_portfolio = true;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
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

    public function confirmDelete($projectId)
    {
        $this->projectToDelete = $projectId;
        $this->showDeleteModal = true;
    }

    public function deleteProject()
    {
        if ($this->projectToDelete) {
            $project = Project::find($this->projectToDelete);
            if ($project) {
                // Delete associated images from storage
                foreach ($project->images as $image) {
                    if (Storage::disk('public')->exists($image->image_path)) {
                        Storage::disk('public')->delete($image->image_path);
                    }
                }
                
                // Delete featured image
                if ($project->featured_image && Storage::disk('public')->exists($project->featured_image)) {
                    Storage::disk('public')->delete($project->featured_image);
                }
                
                $project->delete();
                session()->flash('success', 'Project deleted successfully!');
            }
        }
        
        $this->showDeleteModal = false;
        $this->projectToDelete = null;
    }

    public function toggleActive($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->is_active = !$project->is_active;
            $project->save();
            session()->flash('success', 'Project status updated!');
        }
    }

    public function toggleHomepage($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->show_on_homepage = !$project->show_on_homepage;
            $project->save();
            session()->flash('success', 'Homepage visibility updated!');
        }
    }

    public function togglePortfolio($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->show_on_portfolio = !$project->show_on_portfolio;
            $project->save();
            session()->flash('success', 'Portfolio visibility updated!');
        }
    }

    public function copyToHomepage($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->show_on_homepage = true;
            $project->save();
            session()->flash('success', 'Project added to homepage!');
        }
    }

    public function copyToPortfolio($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->show_on_portfolio = true;
            $project->save();
            session()->flash('success', 'Project added to portfolio!');
        }
    }

    public function showOnBoth($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $project->show_on_homepage = true;
            $project->show_on_portfolio = true;
            $project->save();
            session()->flash('success', 'Project added to both homepage and portfolio!');
        }
    }

    public function editProject($projectId)
    {
        $project = Project::find($projectId);
        if ($project) {
            $this->editingProject = $project;
            $this->title = $project->title;
            $this->slug = $project->slug;
            $this->short_description = $project->short_description;
            $this->full_description = $project->full_description;
            $this->editCategory = $project->category;
            $this->technologies = is_array($project->technologies) ? implode(', ', $project->technologies) : '';
            $this->live_url = $project->live_url ?? '';
            $this->github_url = $project->github_url ?? '';
            $this->video_url = $project->video_url ?? '';
            $this->gradient_color = $project->gradient_color;
            $this->display_order = $project->display_order;
            $this->is_active = $project->is_active;
            $this->show_on_homepage = $project->show_on_homepage;
            $this->show_on_portfolio = $project->show_on_portfolio;
            $this->showEditModal = true;
        }
    }

    public function updateProject()
    {
        $this->validate([
            'title' => 'required|min:3|max:255',
            'slug' => 'nullable|unique:projects,slug,' . $this->editingProject->id . '|max:255',
            'short_description' => 'nullable|max:500',
            'full_description' => 'nullable',
            'editCategory' => 'required|in:web,mobile,design,other',
            'technologies' => 'nullable',
            'live_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'video_url' => 'nullable|url|max:255',
            'featured_image' => 'nullable|image|max:2048',
            'gradient_color' => 'required',
            'display_order' => 'integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($this->slug)) {
            $this->slug = Str::slug($this->title);
        }

        // Handle featured image upload
        $featuredImagePath = $this->editingProject->featured_image;
        if ($this->featured_image) {
            // Delete old image if exists
            if ($featuredImagePath && Storage::disk('public')->exists($featuredImagePath)) {
                Storage::disk('public')->delete($featuredImagePath);
            }
            $featuredImagePath = $this->featured_image->store('projects/featured', 'public');
        }

        // Parse technologies
        $technologiesArray = array_filter(array_map('trim', explode(',', $this->technologies)));

        // Update project
        $this->editingProject->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'full_description' => $this->full_description,
            'category' => $this->editCategory,
            'technologies' => $technologiesArray,
            'live_url' => $this->live_url,
            'github_url' => $this->github_url,
            'video_url' => $this->video_url,
            'featured_image' => $featuredImagePath,
            'gradient_color' => $this->gradient_color,
            'display_order' => $this->display_order,
            'is_active' => $this->is_active,
            'show_on_homepage' => $this->show_on_homepage,
            'show_on_portfolio' => $this->show_on_portfolio,
        ]);

        session()->flash('success', 'Project updated successfully!');
        $this->closeEditModal();
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
        $this->editingProject = null;
        $this->reset([
            'title', 'slug', 'short_description', 'full_description', 'editCategory',
            'technologies', 'live_url', 'github_url', 'video_url', 'featured_image',
            'gradient_color', 'display_order', 'is_active', 'show_on_homepage', 'show_on_portfolio'
        ]);
    }

    public function render()
    {
        $projects = Project::query()
            ->search($this->search)
            ->category($this->category)
            ->when($this->status === 'active', fn($q) => $q->where('is_active', true))
            ->when($this->status === 'inactive', fn($q) => $q->where('is_active', false))
            ->when($this->status === 'homepage', fn($q) => $q->where('show_on_homepage', true))
            ->when($this->status === 'portfolio', fn($q) => $q->where('show_on_portfolio', true))
            ->ordered()
            ->paginate($this->perPage);

        $categories = [
            'web' => 'Web Apps',
            'mobile' => 'Mobile',
            'design' => 'Design',
            'other' => 'Other',
        ];

        return view('livewire.admin.projects.project-index', compact('projects', 'categories'));
    }
}
