<header id="header" class="header-modern fixed top-0 left-0 right-0 z-50 transition-all duration-500">
  <div class="container mx-auto px-4 lg:px-8">
    <div class="flex items-center justify-between">
      <!-- Logo -->
      <a href="{{route('home')}}" class="flex items-center gap-3 group" data-magnetic>
        <div class="relative">
          <img src="{{asset('home/img/logo.png')}}" alt="VTAPP Logo"
            class="h-12 w-auto transition-transform duration-300 group-hover:scale-110">
          <div
            class="absolute -inset-2 bg-cyan-400/20 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
          </div>
        </div>
        <h1 class="text-2xl font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">
          VTAPP
        </h1>
      </a>

      <!-- Desktop Navigation -->
      <nav id="navmenu" class="hidden lg:flex items-center">
        <ul class="flex items-center gap-1">
          <li>
            <a href="#hero"
              class="nav-link relative px-5 py-2 text-sm font-medium text-gray-300 hover:text-white transition-colors duration-300 group">
              <span class="relative z-10">Home</span>
              <span
                class="absolute inset-0 bg-gradient-to-r from-cyan-400/10 to-blue-500/10 rounded-full scale-0 group-hover:scale-100 transition-transform duration-300"></span>
            </a>
          </li>
          <li>
            <a href="#about"
              class="nav-link relative px-5 py-2 text-sm font-medium text-gray-300 hover:text-white transition-colors duration-300 group">
              <span class="relative z-10">About</span>
              <span
                class="absolute inset-0 bg-gradient-to-r from-cyan-400/10 to-blue-500/10 rounded-full scale-0 group-hover:scale-100 transition-transform duration-300"></span>
            </a>
          </li>
          <li>
            <a href="#features"
              class="nav-link relative px-5 py-2 text-sm font-medium text-gray-300 hover:text-white transition-colors duration-300 group">
              <span class="relative z-10">Services</span>
              <span
                class="absolute inset-0 bg-gradient-to-r from-cyan-400/10 to-blue-500/10 rounded-full scale-0 group-hover:scale-100 transition-transform duration-300"></span>
            </a>
          </li>
          <li>
            <a href="#details"
              class="nav-link relative px-5 py-2 text-sm font-medium text-gray-300 hover:text-white transition-colors duration-300 group">
              <span class="relative z-10">Process</span>
              <span
                class="absolute inset-0 bg-gradient-to-r from-cyan-400/10 to-blue-500/10 rounded-full scale-0 group-hover:scale-100 transition-transform duration-300"></span>
            </a>
          </li>
          <li>
            <a href="{{route('portfolio')}}"
              class="nav-link relative px-5 py-2 text-sm font-medium text-gray-300 hover:text-white transition-colors duration-300 group">
              <span class="relative z-10">Portfolio</span>
              <span
                class="absolute inset-0 bg-gradient-to-r from-cyan-400/10 to-blue-500/10 rounded-full scale-0 group-hover:scale-100 transition-transform duration-300"></span>
            </a>
          </li>
          <li>
            <a href="#contact"
              class="ml-4 px-6 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-cyan-500 to-blue-600 rounded-full hover:shadow-lg hover:shadow-cyan-500/25 hover:-translate-y-0.5 transition-all duration-300"
              data-ripple>
              Contact Us
            </a>
          </li>
        </ul>
      </nav>

      <!-- Mobile Menu Toggle -->
      <button
        class="mobile-nav-toggle lg:hidden w-10 h-10 flex items-center justify-center text-white hover:text-cyan-400 transition-colors duration-300">
        <i id="nav-toggle-icon" class="bi bi-list text-2xl"></i>
      </button>
    </div>
  </div>

  <!-- Mobile Navigation -->
  <div class="nav-menu lg:hidden">
    <!-- Close button -->
    <button
      class="close-nav-btn absolute top-6 right-6 w-10 h-10 flex items-center justify-center text-white hover:text-cyan-400 transition-colors duration-300">
      <i class="bi bi-x text-2xl"></i>
    </button>
    <ul class="flex flex-col gap-2 pt-6">
      <li>
        <a href="#hero"
          class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-300">
          Home
        </a>
      </li>
      <li>
        <a href="#about"
          class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-300">
          About
        </a>
      </li>
      <li>
        <a href="#features"
          class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-300">
          Services
        </a>
      </li>
      <li>
        <a href="#details"
          class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-300">
          Process
        </a>
      </li>
      <li>
        <a href="{{route('portfolio')}}"
          class="block px-4 py-3 text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition-all duration-300">
          Portfolio
        </a>
      </li>
      <li class="mt-4">
        <a href="#contact"
          class="block px-4 py-3 text-center text-white bg-gradient-to-r from-cyan-500 to-blue-600 rounded-lg">
          Contact Us
        </a>
      </li>
    </ul>
  </div>
</header>