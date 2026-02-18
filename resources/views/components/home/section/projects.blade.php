@php
use App\Models\Project;

// Try to get projects from database, fallback to hardcoded if table doesn't exist yet
try {
$projects = Project::homepage()->active()->ordered()->take(6)->get();
} catch (\Exception $e) {
$projects = collect([]);
}

// Fallback projects if database is empty or not migrated
$fallbackProjects = [
[
'title' => 'E-Commerce Platform',
'short_description' => 'A full-featured online shopping platform with inventory management, payment processing, and
real-time analytics.',
'image' => asset('home/img/projects/project-1.jpg'),
'tags' => ['Laravel', 'Vue.js', 'Stripe'],
'color' => 'from-cyan-500 to-blue-500',
'link' => '#',
],
[
'title' => 'Mobile Banking App',
'short_description' => 'Secure mobile banking solution with biometric authentication, real-time transactions, and budget
tracking.',
'image' => asset('home/img/projects/project-2.jpg'),
'tags' => ['React Native', 'Node.js', 'MongoDB'],
'color' => 'from-purple-500 to-pink-500',
'link' => '#',
],
[
'title' => 'SaaS Dashboard',
'short_description' => 'Analytics dashboard for SaaS products with real-time data visualization and custom reporting
tools.',
'image' => asset('home/img/projects/project-3.jpg'),
'tags' => ['React', 'TypeScript', 'Tailwind'],
'color' => 'from-emerald-500 to-teal-500',
'link' => '#',
],
];

// Use database projects if available, otherwise use fallback
$displayProjects = $projects->count() > 0 ? $projects : collect($fallbackProjects);
@endphp

<!-- Projects Section -->
<section id="projects"
    class="relative py-24 lg:py-32 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 overflow-hidden">
    <!-- Background decorations -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-cyan-500/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
    </div>
    <div
        class="absolute bottom-0 right-0 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2">
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16" data-scroll-reveal>
            <div
                class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-500/10 rounded-full border border-cyan-500/20 mb-6">
                <span class="text-sm font-medium text-cyan-400">Our Work</span>
            </div>
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-6">
                Featured <span
                    class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Projects</span>
            </h2>
            <p class="text-lg text-gray-400">
                Discover how we bring ideas to life through innovative solutions
            </p>
        </div>

        <!-- Projects Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($displayProjects as $index => $project)
            @php
            // Handle both database model and array fallback
            $isModel = $project instanceof \App\Models\Project;
            $title = $isModel ? $project->title : $project['title'];
            $description = $isModel ? $project->short_description : $project['short_description'];
            $image = $isModel
            ? ($project->featured_image ? asset('storage/' . $project->featured_image) :
            asset('home/img/projects/default.jpg'))
            : $project['image'];
            $tags = $isModel ? ($project->technologies ?? []) : $project['tags'];
            $color = $isModel ? $project->gradient_color : $project['color'];
            $link = $isModel ? ($project->live_url ?? '#') : $project['link'];
            @endphp
            <div class="group" data-scroll-reveal style="--delay: {{ $index * 0.1 }}s">
                <div class="card-modern overflow-hidden" data-tilt>
                    <!-- Project Image -->
                    <div class="relative aspect-[16/10] overflow-hidden">
                        <img src="{{ $image }}" alt="{{ $title }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="flex flex-wrap gap-2">
                                    @foreach($tags as $tag)
                                    <span
                                        class="px-2 py-1 text-xs font-medium bg-white/20 text-white rounded-full backdrop-blur-sm">
                                        {{ $tag }}
                                    </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Gradient Badge -->
                        <div class="absolute top-4 right-4">
                            <div class="w-3 h-3 rounded-full bg-gradient-to-r {{ $color }} animate-pulse"></div>
                        </div>
                    </div>

                    <!-- Project Content -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-3 group-hover:text-cyan-400 transition-colors">
                            {{ $title }}
                        </h3>
                        <p class="text-gray-400 text-sm leading-relaxed mb-4 line-clamp-2">
                            {{ $description }}
                        </p>

                        <!-- Action Button -->
                        @if($link && $link !== '#')
                        <a href="{{ $link }}" target="_blank"
                            class="inline-flex items-center gap-2 text-cyan-400 text-sm font-medium hover:text-cyan-300 transition-colors">
                            <span>View Project</span>
                            <i class="bi bi-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        @else
                        <span class="inline-flex items-center gap-2 text-gray-500 text-sm font-medium">
                            <span>Coming Soon</span>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- View All Projects Button -->
        <div class="text-center mt-12" data-scroll-reveal>
            <a href="{{ route('portfolio') }}" class="btn-modern inline-flex items-center gap-3">
                <span>View All Projects</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
<!-- /Projects Section -->