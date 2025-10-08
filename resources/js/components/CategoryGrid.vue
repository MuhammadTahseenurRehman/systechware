<template>
    <section class="py-8 sm:py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-website-heading">{{ title }}</h2>
                <a href="#" class="text-black underline hover:text-gray-700 font-medium text-sm sm:text-base cursor-pointer">{{ viewAllText }}</a>
            </div>
            
            <!-- Categories Grid -->
            <div class="relative">
                <!-- Mobile: Grid Layout -->
                <div class="grid grid-cols-4 sm:hidden gap-3 pb-4">
                    <div 
                        v-for="(category, index) in categories.slice(0, 8)" 
                        :key="index"
                        @click="navigateTo(category.link)"
                        class="cursor-pointer group"
                    >
                        <!-- Category Image Container -->
                        <div class="w-full aspect-square bg-gray-100 rounded-lg mb-2 relative overflow-hidden">
                            <img 
                                :src="category.image" 
                                :alt="category.name"
                                class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-200"
                            />
                        </div>
                        <!-- Category Name -->
                        <p class="text-xs font-medium text-website-text text-center leading-tight line-clamp-2">{{ category.name }}</p>
                    </div>
                </div>

                <!-- Desktop: Horizontal Scroll -->
                <div class="hidden sm:flex overflow-x-auto gap-4 justify-between pb-4 scrollbar-hide">
                    <!-- Category Cards -->
                    <div 
                        v-for="(category, index) in categories" 
                        :key="index"
                        @click="navigateTo(category.link)"
                        class="flex-shrink-0 cursor-pointer group"
                        :class="{ 'relative': index === categories.length - 1 }"
                    >
                        <!-- Category Image Container -->
                        <div class="w-24 h-24 bg-gray-100 rounded-lg mb-2 relative overflow-hidden">
                            <img 
                                :src="category.image" 
                                :alt="category.name"
                                class="w-full h-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-200"
                            />
                        </div>
                        <!-- Category Name -->
                        <p class="text-sm font-medium text-website-text text-center leading-tight">{{ category.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'CategoryGrid',
    props: {
        title: {
            type: String,
            default: "Get it all right here"
        },
        viewAllText: {
            type: String,
            default: "View all"
        },
        categories: {
            type: Array,
            default: () => [
                {
                    name: 'Grocery',
                    link: '/category/grocery',
                    image: 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=200&h=200&fit=crop&crop=center'
                },
                {
                    name: 'Home',
                    link: '/category/home',
                    image: 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=200&h=200&fit=crop&crop=center'
                },
                {
                    name: 'Patio & Garden',
                    link: '/category/patio-garden',
                    image: 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=200&h=200&fit=crop&crop=center'
                },
                {
                    name: 'Fashion',
                    link: '/category/fashion',
                    image: 'https://images.unsplash.com/photo-1544966503-7cc3bb5891d5?w=200&h=200&fit=crop&crop=center'
                },
                {
                    name: 'Tech',
                    link: '/category/tech',
                    image: 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=200&h=200&fit=crop&crop=center'
                },
                {
                    name: 'Baby',
                    link: '/category/baby',
                    image: 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=200&h=200&fit=crop&crop=center'
                },
                {
                    name: 'Toys',
                    link: '/category/toys',
                    image: 'https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=200&h=200&fit=crop&crop=center'
                },
                {
                    name: 'Health & wellness',
                    link: '/category/health-wellness',
                    image: 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?w=200&h=200&fit=crop&crop=center'
                },
                {
                    name: 'Personal Care',
                    link: '/category/personal-care',
                    image: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=200&h=200&fit=crop&crop=center'
                },
                {
                    name: 'Beauty',
                    link: '/category/beauty',
                    image: 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=200&h=200&fit=crop&crop=center'
                },
                {
                    name: 'Auto & tires',
                    link: '/category/auto-tires',
                    image: 'https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=200&h=200&fit=crop&crop=center'
                }
            ]
        }
    },
    methods: {
        navigateTo(route) {
            console.log('Navigating to:', route);
            window.location.href = route;
        }
    }
}
</script>

<style scoped>
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
