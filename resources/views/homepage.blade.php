<x-layout>
     <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out',
                        'fade-in-down': 'fadeInDown 0.8s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        fadeInDown: {
                            '0%': { opacity: '0', transform: 'translateY(-30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        }
                    }
                }
            }
        }
    </script>
     <!-- Hero Section -->
    <section class="relative overflow-hidden py-20 lg:py-32" x-data="{ 
        stats: { jobs: 0, companies: 0, candidates: 0 },
        init() {
            this.animateStats();
        },
        animateStats() {
            const targets = { jobs: 12847, companies: 2156, candidates: 45823 };
            const duration = 2000;
            const steps = 60;
            const stepDuration = duration / steps;
            
            let currentStep = 0;
            const interval = setInterval(() => {
                currentStep++;
                const progress = currentStep / steps;
                
                this.stats = {
                    jobs: Math.floor(targets.jobs * progress),
                    companies: Math.floor(targets.companies * progress),
                    candidates: Math.floor(targets.candidates * progress)
                };

                if (currentStep >= steps) {
                    clearInterval(interval);
                    this.stats = targets;
                }
            }, stepDuration);
        }
    }">
        <!-- Background Elements -->
        {{-- <div class="absolute inset-0 bg-gradient-to-r from-blue-600/10 to-teal-600/10"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-teal-400/20 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div> --}}
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center max-w-4xl mx-auto">
                <!-- Main Heading -->
                <h1 class="text-5xl lg:text-7xl font-bold text-gray-900 mb-8 leading-tight animate-fade-in-down">
                    Find Your Dream
                    <span class="bg-gradient-to-r from-blue-600 to-teal-600 bg-clip-text text-transparent block animate-float">
                        Career Today
                    </span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-xl lg:text-2xl text-gray-600 mb-12 leading-relaxed animate-fade-in-up" style="animation-delay: 0.2s;">
                    Connect with top employers and discover opportunities that match your skills, 
                    ambitions, and lifestyle. Your perfect job is waiting.
                </p>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16 animate-fade-in-up" style="animation-delay: 0.4s;">
                    <a href="{{ route('jobs.index') }}" 
                       class="group bg-gradient-to-r from-blue-600 to-teal-600 hover:from-blue-700 hover:to-teal-700 text-white px-8 py-4 rounded-xl text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center">
                        Join Now
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                    <button class="border-2 border-gray-300 hover:border-blue-600 text-gray-700 hover:text-blue-600 px-8 py-4 rounded-xl text-lg font-semibold transition-all duration-300 hover:bg-blue-50 transform hover:scale-105">
                        Learn More
                    </button>
                </div>

                <!-- Stats Section -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.6s;">
                    <div class="text-center group">
                        <div class="bg-gradient-to-r from-blue-500 to-teal-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold text-gray-900 mb-2" x-text="stats.jobs.toLocaleString() + '+'">0+</div>
                        <div class="text-gray-600 text-lg">Active Jobs</div>
                    </div>
                    
                    <div class="text-center group">
                        <div class="bg-gradient-to-r from-purple-500 to-pink-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold text-gray-900 mb-2" x-text="stats.companies.toLocaleString() + '+'">0+</div>
                        <div class="text-gray-600 text-lg">Companies</div>
                    </div>
                    
                    <div class="text-center group">
                        <div class="bg-gradient-to-r from-green-500 to-teal-500 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <div class="text-4xl font-bold text-gray-900 mb-2" x-text="stats.candidates.toLocaleString() + '+'">0+</div>
                        <div class="text-gray-600 text-lg">Success Stories</div>
                    </div>
                </div>
</x-layout>