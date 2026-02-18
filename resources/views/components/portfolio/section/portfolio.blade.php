@php
use App\Models\Project;

// Try to get projects from database, fallback to hardcoded if table doesn't exist yet
try {
$dbProjects = Project::portfolio()->active()->ordered()->get();
$categories = Project::portfolio()->active()->distinct()->pluck('category')->toArray();
} catch (\Exception $e) {
$dbProjects = collect([]);
$categories = [];
}

// Fallback projects if database is empty or not migrated
$fallbackProjects = [
[
'title' => 'E-Commerce Platform',
'category' => 'web',
'image' => 'portfolio/assets/img/portfolio/app-1.jpg',
'tags' => ['Laravel', 'Vue.js', 'Stripe'],
'color' => 'from-cyan-500 to-blue-500',
'link' => '#',
'github' => '#'
],
[
'title' => 'Mobile Banking App',
'category' => 'mobile',
'image' => 'portfolio/assets/img/portfolio/app-2.jpg',
'tags' => ['React Native', 'Node.js'],
'color' => 'from-purple-500 to-pink-500',
'link' => '#',
'github' => '#'
],
[
'title' => 'Brand Identity Design',
'category' => 'design',
'image' => 'portfolio/assets/img/portfolio/branding-1.jpg',
'tags' => ['Figma', 'Illustrator'],
'color' => 'from-orange-500 to-red-500',
'link' => '#',
'github' => '#'
],
[
'title' => 'SaaS Dashboard',
'category' => 'web',
'image' => 'portfolio/assets/img/portfolio/web-1.jpg',
'tags' => ['React', 'TypeScript', 'Tailwind'],
'color' => 'from-emerald-500 to-teal-500',
'link' => '#',
'github' => '#'
],
[
'title' => 'Fitness Tracker App',
'category' => 'mobile',
'image' => 'portfolio/assets/img/portfolio/app-3.jpg',
'tags' => ['Flutter', 'Firebase'],
'color' => 'from-pink-500 to-rose-500',
'link' => '#',
'github' => '#'
],
[
'title' => 'UI Kit Design',
'category' => 'design',
'image' => 'portfolio/assets/img/portfolio/branding-2.jpg',
'tags' => ['Figma', 'Design System'],
'color' => 'from-violet-500 to-purple-500',
'link' => '#',
'github' => '#'
],
];

// Use database projects if available, otherwise use fallback
$displayProjects = $dbProjects->count() > 0 ? $dbProjects : collect($fallbackProjects);

// Get unique categories for filter buttons
if (empty($categories)) {
$categories = ['web', 'mobile', 'design'];
} else {
$categories = array_unique($categories);
}
@endphp

<!-- Portfolio Section -->
<section id="portfolio" class="relative py-24 xl:ml-72 overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-800 via-slate-900 to-slate-800"></div>

    <!-- Decorative Orbs -->
    <div
        class="absolute top-20 right-10 w-72 h-72 bg-gradient-to-br from-pink-500/10 to-rose-500/10 rounded-full blur-3xl">
    </div>
    <div
        class="absolute bottom-20 left-10 w-64 h-64 bg-gradient-to-tr from-violet-500/10 to-purple-500/10 rounded-full blur-3xl">
    </div>

    <div class="container relative mx-auto px-6 lg:px-12">
        <!-- Section Header -->
        <div class="text-center mb-16" data-scroll-reveal>
            <span
                class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-pink-500/20 to-rose-500/20 text-pink-400 text-sm font-semibold tracking-wider uppercase mb-4">
                My Work
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Featured <span
                    class="bg-gradient-to-r from-pink-400 to-rose-500 bg-clip-text text-transparent">Projects</span>
            </h2>
            <p class="text-gray-400 max-w-2xl mx-auto">A showcase of my best work and creative projects</p>
            <div class="w-24 h-1 bg-gradient-to-r from-pink-500 to-rose-500 mx-auto rounded-full mt-4"></div>
        </div>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mb-12" data-scroll-reveal>
            <button
                class="portfolio-filter active px-6 py-2 rounded-full glass text-white font-medium hover:bg-white/20 transition-all duration-300"
                data-filter="all">
                All Projects
            </button>
            @foreach($categories as $cat)
            <button
                class="portfolio-filter px-6 py-2 rounded-full glass text-gray-400 font-medium hover:bg-white/20 hover:text-white transition-all duration-300"
                data-filter="{{ $cat }}">
                {{ ucfirst($cat) }}
            </button>
            @endforeach
        </div>

        <!-- Portfolio Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="portfolio-grid">
            @foreach($displayProjects as $index => $project)
            @php
            // Handle both database model and array fallback
            $isModel = $project instanceof \App\Models\Project;
            $title = $isModel ? $project->title : $project['title'];
            $category = $isModel ? $project->category : $project['category'];
            $image = $isModel
            ? ($project->featured_image ? asset('storage/' . $project->featured_image) :
            asset('portfolio/assets/img/portfolio/default.jpg'))
            : asset($project['image']);
            $tags = $isModel ? ($project->technologies ?? []) : $project['tags'];
            $color = $isModel ? $project->gradient_color : $project['color'];
            $liveUrl = $isModel ? ($project->live_url ?? '#') : $project['link'];
            $githubUrl = $isModel ? ($project->github_url ?? '#') : $project['github'];
            @endphp
            <div class="portfolio-item" data-category="{{ $category }}" data-scroll-reveal
                style="--delay: {{ $index * 0.1 }}s">
                <div class="group relative overflow-hidden rounded-2xl glass" data-tilt>
                    <!-- Image -->
                    <div class="aspect-[4/3] overflow-hidden">
                        <img src="{{ $image }}" alt="{{ $title }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    </div>

                    <!-- Overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <div class="absolute inset-0 flex flex-col justify-end p-6">
                            <!-- Tags -->
                            <div
                                class="flex flex-wrap gap-2 mb-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                @foreach($tags as $tag)
                                <span
                                    class="px-2 py-1 text-xs font-medium bg-white/20 text-white rounded-full backdrop-blur-sm">
                                    {{ $tag }}
                                </span>
                                @endforeach
                            </div>

                            <!-- Title -->
                            <h3
                                class="text-xl font-bold text-white mb-2 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-75">
                                {{ $title }}
                            </h3>

                            <!-- Actions -->
                            <div
                                class="flex gap-3 transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-100">
                                <a href="{{ $liveUrl }}"
                                    class="w-10 h-10 rounded-full bg-gradient-to-r {{ $color }} flex items-center justify-center text-white hover:scale-110 transition-transform"
                                    data-glightbox title="View Project">
                                    <i class="bi bi-eye"></i>
                                </a>
                                @if($githubUrl && $githubUrl !== '#')
                                <a href="{{ $githubUrl }}"
                                    class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white hover:bg-white/30 hover:scale-110 transition-all"
                                    target="_blank">
                                    <i class="bi bi-github"></i>
                                </a>
                                @endif
                                @if($liveUrl && $liveUrl !== '#')
                                <a href="{{ $liveUrl }}"
                                    class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-white hover:bg-white/30 hover:scale-110 transition-all"
                                    target="_blank">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Category Badge -->
                    <div class="absolute top-4 left-4">
                        <span
                            class="px-3 py-1 rounded-full bg-gradient-to-r {{ $color }} text-white text-xs font-semibold uppercase tracking-wider">
                            {{ $category }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- View More Button -->
        <div class="text-center mt-12" data-scroll-reveal>
            <a href="#" class="btn-outline-modern magnetic-btn inline-flex items-center gap-3">
                <span>View All Projects</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<style>
    .portfolio-filter.active {
        background: linear-gradient(135deg, rgba(236, 72, 153, 0.3), rgba(244, 63, 94, 0.3));
        color: white;
    }

    .portfolio-item {
        animation-delay: var(--delay);
    }

    .portfolio-item.hidden {
        display: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filters = document.querySelectorAll('.portfolio-filter');
        const items = document.querySelectorAll('.portfolio-item');

        filters.forEach(filter => {
            filter.addEventListener('click', function() {
                // Update active state
                filters.forEach(f => f.classList.remove('active'));
                this.classList.add('active');

                const category = this.getAttribute('data-filter');

                items.forEach(item => {
                    if (category === 'all' || item.getAttribute('data-category') === category) {
                        item.classList.remove('hidden');
                        item.style.animation = 'fadeInUp 0.5s ease forwards';
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });
    });

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</script>