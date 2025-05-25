<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight animate-fadeIn">
            Tentang Pembuat Website
        </h2>
    </x-slot>

    <div class="relative container mx-auto p-6 z-10">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 flex flex-col md:flex-row gap-8 items-center animate-slideUp relative z-10">
            <img src="https://avatars.githubusercontent.com/u/583231?v=4" alt="Foto Profil"
                class="w-40 h-40 rounded-full border-4 border-blue-500 dark:border-blue-400 shadow-lg hover:scale-105 transition-transform duration-300">

            <div>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-1">Muhammad Yunus Anshari</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">NIM: 230401010191</p>

                <p class="text-gray-700 dark:text-gray-300 mb-4 leading-relaxed">
                    Saya adalah mahasiswa yang memiliki minat dalam pengembangan aplikasi web modern menggunakan Laravel dan Tailwind CSS.
                </p>

                <div class="flex gap-4">
                    <a href="https://github.com/yunstech" target="_blank"
                        class="flex items-center gap-2 bg-gray-900 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12 0C5.37 0 0 5.373 0 12c0 5.303 3.438 9.8 8.205 11.387.6.113.82-.258.82-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.757-1.333-1.757-1.09-.745.083-.729.083-.729 1.205.085 1.84 1.236 1.84 1.236 1.07 1.834 2.807 1.304 3.495.997.107-.776.42-1.305.762-1.605-2.665-.305-5.467-1.332-5.467-5.93 0-1.31.467-2.382 1.236-3.222-.124-.304-.536-1.527.117-3.176 0 0 1.008-.322 3.3 1.23a11.513 11.513 0 013.003-.404c1.02.005 2.045.138 3.003.404 2.29-1.552 3.297-1.23 3.297-1.23.655 1.649.243 2.872.12 3.176.77.84 1.236 1.912 1.236 3.222 0 4.61-2.807 5.623-5.48 5.92.43.37.823 1.102.823 2.222v3.293c0 .322.218.694.825.576C20.565 21.797 24 17.302 24 12c0-6.627-5.373-12-12-12z"
                                clip-rule="evenodd" />
                        </svg>
                        GitHub
                    </a>

                    <a href="mailto:myunus021224@gmail.com"
                        class="flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500 transition">
                        ✉️ Email
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Fireworks Canvas -->
    <canvas id="fireworks" class="fixed inset-0 pointer-events-none z-0"></canvas>

    <script>
        const canvas = document.getElementById('fireworks');
        const ctx = canvas.getContext('2d');
        let particles = [];

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        function random(min, max) {
            return Math.random() * (max - min) + min;
        }

        function createFirework() {
            const x = random(0, canvas.width);
            const y = random(0, canvas.height / 2);
            const count = 80;
            for (let i = 0; i < count; i++) {
                const angle = Math.random() * 2 * Math.PI;
                const speed = Math.random() * 5 + 2;
                const color = `hsl(${Math.random() * 360}, 100%, 70%)`;
                particles.push({
                    x, y,
                    vx: Math.cos(angle) * speed,
                    vy: Math.sin(angle) * speed,
                    alpha: 1,
                    color
                });
            }
        }

        function animate() {
            ctx.fillStyle = "rgba(0, 0, 0, 0.1)";
            ctx.fillRect(0, 0, canvas.width, canvas.height);
            particles.forEach((p, i) => {
                p.x += p.vx;
                p.y += p.vy;
                p.alpha -= 0.01;
                if (p.alpha <= 0) particles.splice(i, 1);
                else {
                    ctx.globalAlpha = p.alpha;
                    ctx.fillStyle = p.color;
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, 2, 0, Math.PI * 2);
                    ctx.fill();
                }
            });
            ctx.globalAlpha = 1;
            requestAnimationFrame(animate);
        }

        setInterval(createFirework, 1500);
        animate();
    </script>
</x-app-layout>
