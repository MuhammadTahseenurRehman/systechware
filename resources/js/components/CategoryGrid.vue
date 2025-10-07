<template>
    <section class="py-8 sm:py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-website-heading">Shop Deals by category</h2>
                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium text-sm sm:text-base cursor-pointer" style="color: #0053e2;">View all</a>
            </div>
            
            <!-- Categories Grid -->
            <div class="relative">
                <div class="flex justify-between pb-4 scrollbar-hide">
                    <!-- Category Cards -->
                    <div 
                        v-for="(category, index) in categories" 
                        :key="index"
                        @click="navigateTo(`/category/${category.slug}`)"
                        class="flex-shrink-0 cursor-pointer"
                    >
                        <div class="border border-gray-200 w-24 sm:w-30 h-24 sm:h-30 rounded-lg p-3 sm:p-4 text-center">
                            <!-- Category Icon/Image -->
                            <img class="w-full he-full object-contain" src="https://content.thebagitude.com/products_images/jQiOkp3s5E2wAtLvrFa9Hw.c-r.jpg" alt="catagory" />
                        </div>
                        <!-- Category Name -->
                        <p class="text-xs sm:text-sm font-medium text-website-text mt-2 text-center leading-tight">{{ category.name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'CategoryGrid',
    data() {
        return {
            categories: [
                {
                    name: 'Networking',
                    slug: 'networking'
                },
                {
                    name: 'Servers',
                    slug: 'servers'
                },
                {
                    name: 'Data Storage',
                    slug: 'data-storage'
                },
                {
                    name: 'Computers',
                    slug: 'computers'
                },
                {
                    name: 'Monitors',
                    slug: 'monitors'
                },
                {
                    name: 'Batteries',
                    slug: 'batteries'
                },
                {
                    name: 'Printers',
                    slug: 'printers'
                },
                {
                    name: 'Telecom',
                    slug: 'telecom'
                },
                {
                    name: 'Accessories',
                    slug: 'accessories'
                },
                {
                    name: 'Cables',
                    slug: 'cables'
                },
                {
                    name: 'Mobiles',
                    slug: 'mobiles'
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
</style>
