
//<!--nav menu-->


const sections = document.querySelectorAll("section[id]");
const navLinks = document.querySelectorAll(".nav-menu a");

function setActiveNav() {
    let scrollY = window.pageYOffset;

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 140; // header offset
        const sectionHeight = section.offsetHeight;
        const sectionId = section.getAttribute("id");

        if (
            scrollY >= sectionTop &&
            scrollY < sectionTop + sectionHeight
        ) {
            navLinks.forEach(link => {
                link.classList.remove("active");
                if (link.getAttribute("href") === `#${sectionId}`) {
                    link.classList.add("active");
                }
            });
        }
    });
}

window.addEventListener("scroll", setActiveNav);
setActiveNav(); // initial load



//hamburger menu

const hamburger = document.getElementById("hamburger");
const navMenu = document.getElementById("navMenu");

hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("open");
});

// Close menu on link click (mobile)
document.querySelectorAll(".nav-menu a").forEach(link => {
    link.addEventListener("click", () => {
        hamburger.classList.remove("active");
        navMenu.classList.remove("open");
    });
});


//about section
  (function () {
    // CHANGE THIS TO YOUR CAREER START DATE
    const startDate = new Date("2023-07-20");

    const today = new Date();

    let years = today.getFullYear() - startDate.getFullYear();
    let months = today.getMonth() - startDate.getMonth();
    let days = today.getDate() - startDate.getDate();

    if (days < 0) {
      months--;
      const prevMonth = new Date(today.getFullYear(), today.getMonth(), 0);
      days += prevMonth.getDate();
    }

    if (months < 0) {
      years--;
      months += 12;
    }

    document.getElementById("exp-years").textContent = years;
    document.getElementById("exp-months").textContent = months;
    document.getElementById("exp-days").textContent = days;
  })();




//<!--skill orbit animation-->

function createOrbit(selector, speed, startAngle = 0) {
    const orbit = document.querySelector(selector);
    if (!orbit) return;

    const holders = orbit.querySelectorAll(".skill-holder");
    const total = holders.length;

    let radius = 0;
    let rotation = 0;

    function positionSkills() {
        radius = orbit.offsetWidth / 2;

        holders.forEach((holder, index) => {
            const angle = startAngle + (360 / total) * index;
            holder.dataset.angle = angle;

            holder.style.transform =
                `translate(-50%, -50%) rotate(${angle}deg) translate(${radius}px) rotate(${-rotation}deg)`;
        });
    }

    function animate() {
        rotation += speed;

        orbit.style.transform =
            `translate(-50%, -50%) rotate(${rotation}deg)`;

        holders.forEach(holder => {
            const angle = holder.dataset.angle;
            holder.style.transform =
                `translate(-50%, -50%) rotate(${angle}deg) translate(${radius}px) rotate(${-rotation}deg)`;
        });

        requestAnimationFrame(animate);
    }

    // Initial setup
    positionSkills();
    animate();

    // 🔥 Recalculate on resize
    window.addEventListener("resize", positionSkills);
}

document.addEventListener("DOMContentLoaded", () => {
    createOrbit(".orbit-1", 0.10, -90);
    createOrbit(".orbit-2", -0.10, -54);
});

document.addEventListener('click', e => {
    if (!e.target.closest('.skill')) {
        document.querySelectorAll('.skill').forEach(s =>
            s.classList.remove('show-tooltip')
        );
    }
});




document.querySelectorAll('.skill').forEach(skill => {
    skill.addEventListener('click', () => {
        skill.classList.toggle('show-tooltip');
    });
});



//<!--section animations-->

document.addEventListener("DOMContentLoaded", () => {
    const reveals = document.querySelectorAll(
        ".reveal, .reveal-left, .reveal-right"
    );

    function handleReveal() {
        const windowHeight = window.innerHeight;
        const revealPoint = 120;

        reveals.forEach(el => {
            const elementTop = el.getBoundingClientRect().top;
            const elementBottom = el.getBoundingClientRect().bottom;

            if (
                elementTop < windowHeight - revealPoint &&
                elementBottom > revealPoint
            ) {
                el.classList.add("active");
            } else {
                el.classList.remove("active"); // 👈 THIS FIXES SCROLL BACK
            }
        });
    }

    window.addEventListener("scroll", handleReveal);
    handleReveal(); // initial check
});



//<!--hero parallax-glow-->

const hero = document.querySelector('.hero');
const heroGlows = document.querySelectorAll('.hero-glow .glow');

let mouseX = 0;
let mouseY = 0;
let scrollY = 0;

// Mouse movement
hero.addEventListener('mousemove', (e) => {
    const rect = hero.getBoundingClientRect();
    mouseX = (e.clientX - rect.left) / rect.width - 0.5;
    mouseY = (e.clientY - rect.top) / rect.height - 0.5;
});

// Scroll movement
window.addEventListener('scroll', () => {
    scrollY = window.scrollY * 0.15;
});

function animateHeroGlow() {
    heroGlows.forEach((glow, i) => {
        const depth = (i + 1) * 30;

        glow.style.transform =
            `translate(${mouseX * depth}px, ${mouseY * depth + scrollY}px)`;
    });

    requestAnimationFrame(animateHeroGlow);
}

animateHeroGlow();




//<!--parallax-glow-->

const glows = document.querySelectorAll('.parallax-glow');

window.addEventListener('scroll', () => {
    glows.forEach((glow, index) => {
        const section = glow.closest('section');
        const rect = section.getBoundingClientRect();
        const windowHeight = window.innerHeight;

        // Only animate when section is in viewport
        if (rect.top < windowHeight && rect.bottom > 0) {
            const progress = (windowHeight - rect.top) / (windowHeight + rect.height);
            const move = (progress - 0.5) * 120; // adjust intensity here
            glow.style.transform = `translateY(${move}px)`;
        }
    });
});


//<!--Project sec tab-->

document.querySelectorAll('.tab-btn').forEach(btn => {
  btn.addEventListener('click', () => {
    document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
    document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

    btn.classList.add('active');
    document.getElementById(btn.dataset.tab).classList.add('active');
  });
});
