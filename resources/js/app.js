// Mouse cursor effect
document.addEventListener("DOMContentLoaded", () => {
    // Create custom cursor elements
    const cursor = document.createElement("div");
    cursor.className = "custom-cursor";
    cursor.id = "custom-cursor";
    document.body.appendChild(cursor);

    const cursorFollower = document.createElement("div");
    cursorFollower.className = "cursor-follower";
    cursorFollower.id = "cursor-follower";
    document.body.appendChild(cursorFollower);

    let mouseX = 0,
        mouseY = 0;
    let cursorX = 0,
        cursorY = 0;
    let followerX = 0,
        followerY = 0;

    document.addEventListener("mousemove", (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });

    // Smooth cursor animation
    function animateCursor() {
        // Main cursor
        cursorX += (mouseX - cursorX) * 0.2;
        cursorY += (mouseY - cursorY) * 0.2;
        cursor.style.left = cursorX + "px";
        cursor.style.top = cursorY + "px";

        // Follower cursor
        followerX += (mouseX - followerX) * 0.1;
        followerY += (mouseY - followerY) * 0.1;
        cursorFollower.style.left = followerX + "px";
        cursorFollower.style.top = followerY + "px";

        requestAnimationFrame(animateCursor);
    }
    animateCursor();

    // Cursor hover effects
    const interactiveElements = document.querySelectorAll(
        "a, button, input, textarea, .interactive"
    );
    interactiveElements.forEach((el) => {
        el.addEventListener("mouseenter", () => {
            cursor.classList.add("cursor-hover");
            cursorFollower.classList.add("follower-hover");
        });
        el.addEventListener("mouseleave", () => {
            cursor.classList.remove("cursor-hover");
            cursorFollower.classList.remove("follower-hover");
        });
    });

    // 3D Parallax scroll effect
    function handleParallax() {
        const scrolled = window.pageYOffset;

        document.querySelectorAll("[data-parallax]").forEach((el) => {
            const speed = el.dataset.parallax || 0.5;
            const yPos = -(scrolled * speed);
            el.style.transform = `translate3d(0, ${yPos}px, 0)`;
        });

        document.querySelectorAll("[data-parallax-3d]").forEach((el) => {
            const speed = el.dataset.parallax3d || 0.3;
            const rect = el.getBoundingClientRect();
            const centerY = rect.top + rect.height / 2;
            const viewportCenter = window.innerHeight / 2;
            const distance = (centerY - viewportCenter) / viewportCenter;

            el.style.transform = `perspective(1000px) rotateX(${
                distance * 5 * speed
            }deg) translateZ(${-Math.abs(distance) * 50}px)`;
        });
    }

    // Scroll reveal animations
    function handleScrollReveal() {
        document.querySelectorAll("[data-scroll-reveal]").forEach((el) => {
            const rect = el.getBoundingClientRect();
            const windowHeight = window.innerHeight;

            if (rect.top < windowHeight * 0.85) {
                el.classList.add("revealed");
            }
        });
    }

    // 3D tilt effect on hover
    document.querySelectorAll("[data-tilt]").forEach((el) => {
        el.addEventListener("mousemove", (e) => {
            const rect = el.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = (y - centerY) / 10;
            const rotateY = (centerX - x) / 10;

            el.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.02, 1.02, 1.02)`;
        });

        el.addEventListener("mouseleave", () => {
            el.style.transform =
                "perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)";
        });
    });

    // Magnetic button effect
    document.querySelectorAll("[data-magnetic]").forEach((btn) => {
        btn.addEventListener("mousemove", (e) => {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;

            btn.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px)`;
        });

        btn.addEventListener("mouseleave", () => {
            btn.style.transform = "translate(0, 0)";
        });
    });

    // Initialize scroll listeners
    window.addEventListener("scroll", () => {
        handleParallax();
        handleScrollReveal();
    });

    // Initial call
    handleScrollReveal();

    // Spiral animation for floating elements
    let angle = 0;
    function animateSpirals() {
        angle += 0.02;
        document.querySelectorAll("[data-spiral]").forEach((el, i) => {
            const radius = parseFloat(el.dataset.spiral) || 20;
            const speed = parseFloat(el.dataset.spiralSpeed) || 1;
            const x = Math.sin(angle * speed + i) * radius;
            const y = Math.cos(angle * speed + i) * radius;
            el.style.transform = `translate(${x}px, ${y}px)`;
        });
        requestAnimationFrame(animateSpirals);
    }
    animateSpirals();

    // Text scramble effect
    class TextScramble {
        constructor(el) {
            this.el = el;
            this.chars = "!<>-_\\/[]{}—=+*^?#________";
            this.update = this.update.bind(this);
        }

        setText(newText) {
            const oldText = this.el.innerText;
            const length = Math.max(oldText.length, newText.length);
            const promise = new Promise((resolve) => (this.resolve = resolve));
            this.queue = [];

            for (let i = 0; i < length; i++) {
                const from = oldText[i] || "";
                const to = newText[i] || "";
                const start = Math.floor(Math.random() * 40);
                const end = start + Math.floor(Math.random() * 40);
                this.queue.push({ from, to, start, end });
            }

            cancelAnimationFrame(this.frameRequest);
            this.frame = 0;
            this.update();
            return promise;
        }

        update() {
            let output = "";
            let complete = 0;

            for (let i = 0, n = this.queue.length; i < n; i++) {
                let { from, to, start, end, char } = this.queue[i];

                if (this.frame >= end) {
                    complete++;
                    output += to;
                } else if (this.frame >= start) {
                    if (!char || Math.random() < 0.28) {
                        char =
                            this.chars[
                                Math.floor(Math.random() * this.chars.length)
                            ];
                        this.queue[i].char = char;
                    }
                    output += `<span class="text-cyan-400">${char}</span>`;
                } else {
                    output += from;
                }
            }

            this.el.innerHTML = output;

            if (complete === this.queue.length) {
                this.resolve();
            } else {
                this.frameRequest = requestAnimationFrame(this.update);
                this.frame++;
            }
        }
    }

    // Initialize text scramble
    document.querySelectorAll("[data-scramble]").forEach((el) => {
        const fx = new TextScramble(el);
        const originalText = el.innerText;

        el.addEventListener("mouseenter", () => {
            fx.setText(originalText);
        });
    });

    // Counter animation
    function animateCounter(el) {
        const target = parseInt(el.dataset.counter);
        const duration = parseInt(el.dataset.counterDuration) || 2000;
        const start = 0;
        const startTime = performance.now();

        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const current = Math.floor(easeOutQuart * target);

            el.textContent = current + (el.dataset.counterSuffix || "");

            if (progress < 1) {
                requestAnimationFrame(update);
            }
        }

        requestAnimationFrame(update);
    }

    // Intersection observer for counters
    const counterObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting && !entry.target.dataset.counted) {
                    entry.target.dataset.counted = "true";
                    animateCounter(entry.target);
                }
            });
        },
        { threshold: 0.5 }
    );

    document.querySelectorAll("[data-counter]").forEach((el) => {
        counterObserver.observe(el);
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                target.scrollIntoView({
                    behavior: "smooth",
                    block: "start",
                });
            }
        });
    });

    // Ripple effect on buttons
    document.querySelectorAll("[data-ripple]").forEach((btn) => {
        btn.addEventListener("click", function (e) {
            const rect = btn.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const ripple = document.createElement("span");
            ripple.className = "ripple-effect";
            ripple.style.left = x + "px";
            ripple.style.top = y + "px";

            btn.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Typing effect
    document.querySelectorAll("[data-typing]").forEach((el) => {
        const texts = el.dataset.typing.split(",");
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function type() {
            const currentText = texts[textIndex];

            if (isDeleting) {
                el.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
            } else {
                el.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
            }

            let delay = isDeleting ? 50 : 100;

            if (!isDeleting && charIndex === currentText.length) {
                delay = 2000;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % texts.length;
            }

            setTimeout(type, delay);
        }

        type();
    });

    // Mobile navigation toggle
    const mobileNavToggle = document.querySelector(".mobile-nav-toggle");
    const navMenu = document.querySelector("#navmenu");

    if (mobileNavToggle && navMenu) {
        mobileNavToggle.addEventListener("click", () => {
            navMenu.classList.toggle("nav-open");
            mobileNavToggle.classList.toggle("bi-list");
            mobileNavToggle.classList.toggle("bi-x");
        });
    }

    // Header scroll effect
    const header = document.querySelector("#header");
    if (header) {
        window.addEventListener("scroll", () => {
            if (window.scrollY > 100) {
                header.classList.add("header-scrolled");
            } else {
                header.classList.remove("header-scrolled");
            }
        });
    }
});
