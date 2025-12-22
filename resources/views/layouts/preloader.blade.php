<!-- Preloader -->
<div id="preloader" class="preloader">
    <!-- Background Grid Effect -->
    <div class="preloader-grid"></div>

    <!-- Floating Particles -->
    <div class="preloader-particles">
        <div class="p-particle" style="--delay: 0s; --x: 20%; --duration: 3s;"></div>
        <div class="p-particle" style="--delay: 0.5s; --x: 40%; --duration: 4s;"></div>
        <div class="p-particle" style="--delay: 1s; --x: 60%; --duration: 3.5s;"></div>
        <div class="p-particle" style="--delay: 1.5s; --x: 80%; --duration: 4.5s;"></div>
        <div class="p-particle" style="--delay: 0.3s; --x: 10%; --duration: 5s;"></div>
        <div class="p-particle" style="--delay: 0.8s; --x: 90%; --duration: 3.2s;"></div>
        <div class="p-particle" style="--delay: 1.2s; --x: 30%; --duration: 4.2s;"></div>
        <div class="p-particle" style="--delay: 0.6s; --x: 70%; --duration: 3.8s;"></div>
    </div>

    <!-- Main Preloader Content -->
    <div class="preloader-content">
        <!-- Outer Tech Rings -->
        <div class="tech-ring tech-ring-1">
            <div class="ring-segment"></div>
            <div class="ring-segment"></div>
            <div class="ring-segment"></div>
            <div class="ring-segment"></div>
        </div>

        <div class="tech-ring tech-ring-2">
            <div class="ring-dot"></div>
            <div class="ring-dot"></div>
            <div class="ring-dot"></div>
            <div class="ring-dot"></div>
            <div class="ring-dot"></div>
            <div class="ring-dot"></div>
        </div>

        <div class="tech-ring tech-ring-3">
            <div class="ring-line"></div>
            <div class="ring-line"></div>
            <div class="ring-line"></div>
            <div class="ring-line"></div>
            <div class="ring-line"></div>
            <div class="ring-line"></div>
            <div class="ring-line"></div>
            <div class="ring-line"></div>
        </div>

        <!-- Spiral Orbits -->
        <div class="spiral-orbit spiral-orbit-1">
            <div class="orbit-particle"></div>
        </div>
        <div class="spiral-orbit spiral-orbit-2">
            <div class="orbit-particle"></div>
        </div>
        <div class="spiral-orbit spiral-orbit-3">
            <div class="orbit-particle"></div>
        </div>

        <!-- Hexagon Frame -->
        <div class="hex-frame">
            <svg viewBox="0 0 100 100" class="hex-svg">
                <polygon class="hex-stroke" points="50,5 95,27.5 95,72.5 50,95 5,72.5 5,27.5" fill="none"
                    stroke-width="0.5" />
                <polygon class="hex-stroke hex-inner" points="50,15 85,32.5 85,67.5 50,85 15,67.5 15,32.5" fill="none"
                    stroke-width="0.3" />
            </svg>
        </div>

        <!-- Logo Container with 3D Effect -->
        <div class="logo-container">
            <div class="logo-glow"></div>
            <div class="logo-pulse"></div>
            <img src="{{ asset('home/img/logo.png') }}" alt="Logo" class="preloader-logo">
        </div>

        <!-- Loading Text -->
        <div class="loading-text">
            <span class="loading-char" style="--i: 0;">L</span>
            <span class="loading-char" style="--i: 1;">O</span>
            <span class="loading-char" style="--i: 2;">A</span>
            <span class="loading-char" style="--i: 3;">D</span>
            <span class="loading-char" style="--i: 4;">I</span>
            <span class="loading-char" style="--i: 5;">N</span>
            <span class="loading-char" style="--i: 6;">G</span>
            <span class="loading-dots">
                <span class="dot" style="--d: 0;"></span>
                <span class="dot" style="--d: 1;"></span>
                <span class="dot" style="--d: 2;"></span>
            </span>
        </div>

        <!-- Progress Bar -->
        <div class="progress-container">
            <div class="progress-bar">
                <div class="progress-fill"></div>
                <div class="progress-glow"></div>
            </div>
        </div>
    </div>

    <!-- Corner Decorations -->
    <div class="corner-decor corner-tl"></div>
    <div class="corner-decor corner-tr"></div>
    <div class="corner-decor corner-bl"></div>
    <div class="corner-decor corner-br"></div>
</div>

<style>
    /* ==========================================
   PRELOADER MAIN CONTAINER
   ========================================== */
    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 99999;
        overflow: hidden;
        transition: opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1),
            visibility 0.8s cubic-bezier(0.4, 0, 0.2, 1),
            transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .preloader.fade-out {
        opacity: 0;
        visibility: hidden;
        transform: scale(1.1);
    }

    .preloader.fade-out .preloader-content {
        transform: scale(0.8) rotateY(90deg);
        opacity: 0;
    }

    /* ==========================================
   BACKGROUND GRID
   ========================================== */
    .preloader-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(6, 182, 212, 0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(6, 182, 212, 0.03) 1px, transparent 1px);
        background-size: 50px 50px;
        animation: gridPulse 4s ease-in-out infinite;
    }

    @keyframes gridPulse {

        0%,
        100% {
            opacity: 0.5;
        }

        50% {
            opacity: 1;
        }
    }

    /* ==========================================
   FLOATING PARTICLES
   ========================================== */
    .preloader-particles {
        position: absolute;
        inset: 0;
        pointer-events: none;
    }

    .p-particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: linear-gradient(135deg, #06b6d4, #8b5cf6);
        border-radius: 50%;
        left: var(--x);
        bottom: -10px;
        animation: floatUp var(--duration) ease-in-out infinite;
        animation-delay: var(--delay);
        box-shadow: 0 0 10px rgba(6, 182, 212, 0.5);
    }

    @keyframes floatUp {
        0% {
            transform: translateY(0) translateX(0) scale(1);
            opacity: 0;
        }

        10% {
            opacity: 1;
        }

        90% {
            opacity: 1;
        }

        100% {
            transform: translateY(-100vh) translateX(50px) scale(0.5);
            opacity: 0;
        }
    }

    /* ==========================================
   MAIN CONTENT CONTAINER
   ========================================== */
    .preloader-content {
        position: relative;
        width: 300px;
        height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        perspective: 1000px;
        transform-style: preserve-3d;
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1),
            opacity 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* ==========================================
   TECH RINGS
   ========================================== */
    .tech-ring {
        position: absolute;
        border-radius: 50%;
        border: 1px solid transparent;
    }

    .tech-ring-1 {
        width: 280px;
        height: 280px;
        border-color: rgba(6, 182, 212, 0.3);
        animation: ringRotate 8s linear infinite;
    }

    .tech-ring-1 .ring-segment {
        position: absolute;
        width: 30px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #06b6d4, transparent);
        border-radius: 2px;
    }

    .tech-ring-1 .ring-segment:nth-child(1) {
        top: -1.5px;
        left: 50%;
        transform: translateX(-50%);
    }

    .tech-ring-1 .ring-segment:nth-child(2) {
        bottom: -1.5px;
        left: 50%;
        transform: translateX(-50%);
    }

    .tech-ring-1 .ring-segment:nth-child(3) {
        left: -1.5px;
        top: 50%;
        transform: translateY(-50%) rotate(90deg);
    }

    .tech-ring-1 .ring-segment:nth-child(4) {
        right: -1.5px;
        top: 50%;
        transform: translateY(-50%) rotate(90deg);
    }

    .tech-ring-2 {
        width: 240px;
        height: 240px;
        border-color: rgba(139, 92, 246, 0.2);
        animation: ringRotate 12s linear infinite reverse;
    }

    .tech-ring-2 .ring-dot {
        position: absolute;
        width: 8px;
        height: 8px;
        background: #8b5cf6;
        border-radius: 50%;
        box-shadow: 0 0 15px rgba(139, 92, 246, 0.8);
        animation: dotPulse 2s ease-in-out infinite;
    }

    .tech-ring-2 .ring-dot:nth-child(1) {
        top: -4px;
        left: 50%;
        transform: translateX(-50%);
        animation-delay: 0s;
    }

    .tech-ring-2 .ring-dot:nth-child(2) {
        top: 15%;
        right: 5%;
        animation-delay: 0.3s;
    }

    .tech-ring-2 .ring-dot:nth-child(3) {
        bottom: 15%;
        right: 5%;
        animation-delay: 0.6s;
    }

    .tech-ring-2 .ring-dot:nth-child(4) {
        bottom: -4px;
        left: 50%;
        transform: translateX(-50%);
        animation-delay: 0.9s;
    }

    .tech-ring-2 .ring-dot:nth-child(5) {
        bottom: 15%;
        left: 5%;
        animation-delay: 1.2s;
    }

    .tech-ring-2 .ring-dot:nth-child(6) {
        top: 15%;
        left: 5%;
        animation-delay: 1.5s;
    }

    .tech-ring-3 {
        width: 200px;
        height: 200px;
        border-color: rgba(6, 182, 212, 0.15);
        animation: ringRotate 6s linear infinite;
    }

    .tech-ring-3 .ring-line {
        position: absolute;
        width: 2px;
        height: 15px;
        background: linear-gradient(to bottom, #06b6d4, transparent);
        top: -7.5px;
        left: 50%;
        transform-origin: 50% 107.5px;
    }

    .tech-ring-3 .ring-line:nth-child(1) {
        transform: translateX(-50%) rotate(0deg);
    }

    .tech-ring-3 .ring-line:nth-child(2) {
        transform: translateX(-50%) rotate(45deg);
    }

    .tech-ring-3 .ring-line:nth-child(3) {
        transform: translateX(-50%) rotate(90deg);
    }

    .tech-ring-3 .ring-line:nth-child(4) {
        transform: translateX(-50%) rotate(135deg);
    }

    .tech-ring-3 .ring-line:nth-child(5) {
        transform: translateX(-50%) rotate(180deg);
    }

    .tech-ring-3 .ring-line:nth-child(6) {
        transform: translateX(-50%) rotate(225deg);
    }

    .tech-ring-3 .ring-line:nth-child(7) {
        transform: translateX(-50%) rotate(270deg);
    }

    .tech-ring-3 .ring-line:nth-child(8) {
        transform: translateX(-50%) rotate(315deg);
    }

    @keyframes ringRotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @keyframes dotPulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 0.6;
        }

        50% {
            transform: scale(1.5);
            opacity: 1;
        }
    }

    /* ==========================================
   SPIRAL ORBITS
   ========================================== */
    .spiral-orbit {
        position: absolute;
        border-radius: 50%;
        border: 1px dashed rgba(6, 182, 212, 0.2);
    }

    .spiral-orbit-1 {
        width: 160px;
        height: 160px;
        animation: orbitSpin 4s linear infinite;
        transform: rotateX(60deg);
    }

    .spiral-orbit-2 {
        width: 140px;
        height: 140px;
        animation: orbitSpin 3s linear infinite reverse;
        transform: rotateX(60deg) rotateZ(60deg);
    }

    .spiral-orbit-3 {
        width: 180px;
        height: 180px;
        animation: orbitSpin 5s linear infinite;
        transform: rotateX(60deg) rotateZ(-60deg);
    }

    .orbit-particle {
        position: absolute;
        width: 10px;
        height: 10px;
        background: linear-gradient(135deg, #06b6d4, #3b82f6);
        border-radius: 50%;
        top: -5px;
        left: 50%;
        transform: translateX(-50%);
        box-shadow: 0 0 20px rgba(6, 182, 212, 0.8),
            0 0 40px rgba(6, 182, 212, 0.4);
    }

    .spiral-orbit-2 .orbit-particle {
        background: linear-gradient(135deg, #8b5cf6, #ec4899);
        box-shadow: 0 0 20px rgba(139, 92, 246, 0.8),
            0 0 40px rgba(139, 92, 246, 0.4);
    }

    .spiral-orbit-3 .orbit-particle {
        background: linear-gradient(135deg, #f97316, #eab308);
        box-shadow: 0 0 20px rgba(249, 115, 22, 0.8),
            0 0 40px rgba(249, 115, 22, 0.4);
        width: 8px;
        height: 8px;
        top: -4px;
    }

    @keyframes orbitSpin {
        from {
            transform: rotateX(60deg) rotateZ(0deg);
        }

        to {
            transform: rotateX(60deg) rotateZ(360deg);
        }
    }

    /* ==========================================
   HEXAGON FRAME
   ========================================== */
    .hex-frame {
        position: absolute;
        width: 150px;
        height: 150px;
        animation: hexRotate 20s linear infinite;
    }

    .hex-svg {
        width: 100%;
        height: 100%;
    }

    .hex-stroke {
        stroke: rgba(6, 182, 212, 0.3);
        stroke-dasharray: 300;
        stroke-dashoffset: 300;
        animation: hexDraw 3s ease-in-out infinite;
    }

    .hex-inner {
        stroke: rgba(139, 92, 246, 0.3);
        animation-delay: 0.5s;
    }

    @keyframes hexDraw {

        0%,
        100% {
            stroke-dashoffset: 300;
        }

        50% {
            stroke-dashoffset: 0;
        }
    }

    @keyframes hexRotate {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /* ==========================================
   LOGO CONTAINER
   ========================================== */
    .logo-container {
        position: relative;
        width: 100px;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 10;
    }

    .logo-glow {
        position: absolute;
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, rgba(6, 182, 212, 0.3), transparent 70%);
        border-radius: 50%;
        animation: glowPulse 2s ease-in-out infinite;
    }

    .logo-pulse {
        position: absolute;
        width: 100px;
        height: 100px;
        border: 2px solid rgba(6, 182, 212, 0.5);
        border-radius: 50%;
        animation: pulsate 2s ease-out infinite;
    }

    .preloader-logo {
        width: 70px;
        height: auto;
        position: relative;
        z-index: 5;
        filter: drop-shadow(0 0 20px rgba(6, 182, 212, 0.5));
        animation: logoFloat 3s ease-in-out infinite, logoGlow 2s ease-in-out infinite;
    }

    @keyframes glowPulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 0.5;
        }

        50% {
            transform: scale(1.2);
            opacity: 0.8;
        }
    }

    @keyframes pulsate {
        0% {
            transform: scale(1);
            opacity: 1;
        }

        100% {
            transform: scale(1.8);
            opacity: 0;
        }
    }

    @keyframes logoFloat {

        0%,
        100% {
            transform: translateY(0) rotateY(0deg);
        }

        25% {
            transform: translateY(-5px) rotateY(5deg);
        }

        50% {
            transform: translateY(0) rotateY(0deg);
        }

        75% {
            transform: translateY(5px) rotateY(-5deg);
        }
    }

    @keyframes logoGlow {

        0%,
        100% {
            filter: drop-shadow(0 0 20px rgba(6, 182, 212, 0.5));
        }

        50% {
            filter: drop-shadow(0 0 40px rgba(6, 182, 212, 0.8)) drop-shadow(0 0 60px rgba(139, 92, 246, 0.4));
        }
    }

    /* ==========================================
   LOADING TEXT
   ========================================== */
    .loading-text {
        position: absolute;
        bottom: -60px;
        display: flex;
        align-items: center;
        gap: 2px;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 4px;
        color: rgba(255, 255, 255, 0.8);
    }

    .loading-char {
        display: inline-block;
        animation: charWave 1.5s ease-in-out infinite;
        animation-delay: calc(var(--i) * 0.1s);
    }

    @keyframes charWave {

        0%,
        100% {
            transform: translateY(0);
            color: rgba(255, 255, 255, 0.8);
        }

        50% {
            transform: translateY(-5px);
            color: #06b6d4;
            text-shadow: 0 0 10px rgba(6, 182, 212, 0.8);
        }
    }

    .loading-dots {
        display: flex;
        gap: 3px;
        margin-left: 5px;
    }

    .dot {
        width: 4px;
        height: 4px;
        background: #06b6d4;
        border-radius: 50%;
        animation: dotBounce 1.2s ease-in-out infinite;
        animation-delay: calc(var(--d) * 0.2s);
    }

    @keyframes dotBounce {

        0%,
        100% {
            transform: scale(1);
            opacity: 0.5;
        }

        50% {
            transform: scale(1.5);
            opacity: 1;
        }
    }

    /* ==========================================
   PROGRESS BAR
   ========================================== */
    .progress-container {
        position: absolute;
        bottom: -90px;
        width: 200px;
    }

    .progress-bar {
        position: relative;
        height: 3px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 3px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #06b6d4, #3b82f6, #8b5cf6, #ec4899);
        background-size: 200% 100%;
        border-radius: 3px;
        width: 0%;
        animation: progressFill 2.5s ease-in-out forwards, gradientMove 2s linear infinite;
    }

    .progress-glow {
        position: absolute;
        top: -2px;
        left: 0;
        width: 30px;
        height: 7px;
        background: linear-gradient(90deg, transparent, rgba(6, 182, 212, 0.8), transparent);
        border-radius: 3px;
        animation: glowSweep 1.5s ease-in-out infinite;
    }

    @keyframes progressFill {
        0% {
            width: 0%;
        }

        100% {
            width: 100%;
        }
    }

    @keyframes gradientMove {
        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 200% 50%;
        }
    }

    @keyframes glowSweep {
        0% {
            left: -30px;
        }

        100% {
            left: 100%;
        }
    }

    /* ==========================================
   CORNER DECORATIONS
   ========================================== */
    .corner-decor {
        position: absolute;
        width: 80px;
        height: 80px;
        pointer-events: none;
    }

    .corner-decor::before,
    .corner-decor::after {
        content: '';
        position: absolute;
        background: linear-gradient(135deg, rgba(6, 182, 212, 0.5), transparent);
    }

    .corner-decor::before {
        width: 2px;
        height: 40px;
    }

    .corner-decor::after {
        width: 40px;
        height: 2px;
    }

    .corner-tl {
        top: 20px;
        left: 20px;
    }

    .corner-tl::before {
        top: 0;
        left: 0;
    }

    .corner-tl::after {
        top: 0;
        left: 0;
    }

    .corner-tr {
        top: 20px;
        right: 20px;
    }

    .corner-tr::before {
        top: 0;
        right: 0;
    }

    .corner-tr::after {
        top: 0;
        right: 0;
        background: linear-gradient(-135deg, rgba(6, 182, 212, 0.5), transparent);
    }

    .corner-bl {
        bottom: 20px;
        left: 20px;
    }

    .corner-bl::before {
        bottom: 0;
        left: 0;
        background: linear-gradient(45deg, rgba(139, 92, 246, 0.5), transparent);
    }

    .corner-bl::after {
        bottom: 0;
        left: 0;
        background: linear-gradient(45deg, rgba(139, 92, 246, 0.5), transparent);
    }

    .corner-br {
        bottom: 20px;
        right: 20px;
    }

    .corner-br::before {
        bottom: 0;
        right: 0;
        background: linear-gradient(-45deg, rgba(139, 92, 246, 0.5), transparent);
    }

    .corner-br::after {
        bottom: 0;
        right: 0;
        background: linear-gradient(-45deg, rgba(139, 92, 246, 0.5), transparent);
    }

    /* ==========================================
   RESPONSIVE
   ========================================== */
    @media (max-width: 480px) {
        .preloader-content {
            transform: scale(0.8);
        }

        .loading-text {
            font-size: 12px;
            letter-spacing: 3px;
        }

        .progress-container {
            width: 160px;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const preloader = document.getElementById('preloader');
    
    // Function to hide preloader with smooth fade
    function hidePreloader() {
        preloader.classList.add('fade-out');
        
        // Remove from DOM after transition
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 800);
    }
    
    // Hide preloader when page is fully loaded
    window.addEventListener('load', function() {
        // Add slight delay for better UX
        setTimeout(hidePreloader, 500);
    });
    
    // Fallback: hide after max 5 seconds
    setTimeout(hidePreloader, 5000);
});
</script>