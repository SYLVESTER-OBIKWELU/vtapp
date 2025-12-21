<!-- Portfolio Header/Sidebar -->
<header id="header"
    class="fixed top-0 left-0 h-screen w-72 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 z-50 transform -translate-x-full xl:translate-x-0 transition-transform duration-300 border-r border-white/10 flex flex-col"
    id="sidebar">
    <!-- Mobile Toggle -->
    <button
        class="header-toggle fixed top-4 left-4 xl:hidden w-12 h-12 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full flex items-center justify-center z-50 shadow-lg shadow-cyan-500/25"
        onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')">
        <i class="bi bi-list text-white text-xl"></i>
    </button>

    <!-- Profile Section -->
    <div class="flex-shrink-0 p-8 text-center border-b border-white/10">
        <!-- Profile Image -->
        <div class="relative w-28 h-28 mx-auto mb-4">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full animate-pulse"></div>
            <img src="{{asset('portfolio/img/Portfolio_zoom.jpg')}}" alt="Sylvester Obikwelu"
                class="relative w-full h-full object-cover rounded-full border-4 border-slate-800" />
            <!-- Online Status -->
            <span class="absolute bottom-2 right-2 w-4 h-4 bg-green-400 rounded-full border-2 border-slate-800"></span>
        </div>

        <!-- Name -->
        <h1 class="text-xl font-bold text-white mb-1">Sylvester</h1>
        <p class="text-sm text-gray-400">Software Developer</p>

        <!-- Social Links -->
        <div class="flex justify-center gap-2 mt-4">
            <a href="https://x.com/Donvestar" target="_blank" rel="noopener"
                class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-white hover:bg-cyan-500 hover:border-cyan-500 transition-all duration-300">
                <i class="bi bi-twitter-x text-sm"></i>
            </a>
            <a href="https://web.facebook.com/DONVESTER1" target="_blank" rel="noopener"
                class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-600 hover:border-blue-600 transition-all duration-300">
                <i class="bi bi-facebook text-sm"></i>
            </a>
            <a href="https://www.instagram.com/iam_donvest/" target="_blank" rel="noopener"
                class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-white hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500 hover:border-transparent transition-all duration-300">
                <i class="bi bi-instagram text-sm"></i>
            </a>
            <a href="https://www.linkedin.com/in/sylvester-obikwelu-997aa9241/" target="_blank" rel="noopener"
                class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-700 hover:border-blue-700 transition-all duration-300">
                <i class="bi bi-linkedin text-sm"></i>
            </a>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto p-6">
        <ul class="space-y-1">
            <li>
                <a href="#hero"
                    class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-300">
                    <span
                        class="w-10 h-10 rounded-xl bg-gradient-to-r from-cyan-400/20 to-blue-500/20 flex items-center justify-center group-hover:from-cyan-400 group-hover:to-blue-500 transition-all duration-300">
                        <i class="bi bi-house text-cyan-400 group-hover:text-white transition-colors duration-300"></i>
                    </span>
                    <span class="font-medium">Home</span>
                </a>
            </li>
            <li>
                <a href="#about"
                    class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-300">
                    <span
                        class="w-10 h-10 rounded-xl bg-gradient-to-r from-purple-400/20 to-pink-500/20 flex items-center justify-center group-hover:from-purple-400 group-hover:to-pink-500 transition-all duration-300">
                        <i
                            class="bi bi-person text-purple-400 group-hover:text-white transition-colors duration-300"></i>
                    </span>
                    <span class="font-medium">About</span>
                </a>
            </li>
            <li>
                <a href="#skills"
                    class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-300">
                    <span
                        class="w-10 h-10 rounded-xl bg-gradient-to-r from-teal-400/20 to-cyan-500/20 flex items-center justify-center group-hover:from-teal-400 group-hover:to-cyan-500 transition-all duration-300">
                        <i class="bi bi-gear text-teal-400 group-hover:text-white transition-colors duration-300"></i>
                    </span>
                    <span class="font-medium">Skills</span>
                </a>
            </li>
            <li>
                <a href="#resume"
                    class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-300">
                    <span
                        class="w-10 h-10 rounded-xl bg-gradient-to-r from-orange-400/20 to-red-500/20 flex items-center justify-center group-hover:from-orange-400 group-hover:to-red-500 transition-all duration-300">
                        <i
                            class="bi bi-file-earmark-text text-orange-400 group-hover:text-white transition-colors duration-300"></i>
                    </span>
                    <span class="font-medium">Resume</span>
                </a>
            </li>
            <li>
                <a href="#portfolio"
                    class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-300">
                    <span
                        class="w-10 h-10 rounded-xl bg-gradient-to-r from-indigo-400/20 to-purple-500/20 flex items-center justify-center group-hover:from-indigo-400 group-hover:to-purple-500 transition-all duration-300">
                        <i
                            class="bi bi-images text-indigo-400 group-hover:text-white transition-colors duration-300"></i>
                    </span>
                    <span class="font-medium">Portfolio</span>
                </a>
            </li>
            <li>
                <a href="#services"
                    class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-300">
                    <span
                        class="w-10 h-10 rounded-xl bg-gradient-to-r from-pink-400/20 to-rose-500/20 flex items-center justify-center group-hover:from-pink-400 group-hover:to-rose-500 transition-all duration-300">
                        <i
                            class="bi bi-hdd-stack text-pink-400 group-hover:text-white transition-colors duration-300"></i>
                    </span>
                    <span class="font-medium">Services</span>
                </a>
            </li>
            <li>
                <a href="#contact"
                    class="nav-link group flex items-center gap-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white hover:bg-white/5 transition-all duration-300">
                    <span
                        class="w-10 h-10 rounded-xl bg-gradient-to-r from-green-400/20 to-emerald-500/20 flex items-center justify-center group-hover:from-green-400 group-hover:to-emerald-500 transition-all duration-300">
                        <i
                            class="bi bi-envelope text-green-400 group-hover:text-white transition-colors duration-300"></i>
                    </span>
                    <span class="font-medium">Contact</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Footer -->
    <div class="flex-shrink-0 p-6 border-t border-white/10">
        <a href="{{route('home')}}"
            class="flex items-center gap-2 text-gray-400 hover:text-cyan-400 transition-colors duration-300">
            <i class="bi bi-arrow-left"></i>
            <span class="text-sm">Back to VTAPP</span>
        </a>
    </div>
</header>

<!-- Mobile Overlay -->
<div class="fixed inset-0 bg-black/50 z-40 xl:hidden opacity-0 pointer-events-none transition-opacity duration-300"
    id="sidebar-overlay" onclick="document.getElementById('sidebar').classList.add('-translate-x-full')"></div>