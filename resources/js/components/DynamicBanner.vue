<template>
    <section class="relative bg-white py-4">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-blue-600 rounded-lg p-6 sm:p-8 relative overflow-hidden max-h-[300px]" style="background-color: #0053e2; border-radius: 8px;">
                <!-- Left Content -->
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                    <div class="text-white flex-1">
                        <p class="text-sm sm:text-base mb-2">{{ subtitle }}</p>
                        <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-4 sm:mb-6">{{ title }}</h1>
                        <button class="bg-white px-6 sm:px-8 py-2 sm:py-3 rounded-full text-sm sm:text-base font-semibold hover:bg-gray-100 transition-colors cursor-pointer" style="color: #0053e2;">
                            {{ buttonText }}
                        </button>
                    </div>
                    
                    <!-- Product Slider -->
                    <div class="flex-1 lg:flex-none lg:w-2/3">
                        <div class="relative">
                            <!-- Slider Container -->
                            <div class="overflow-hidden rounded-lg">
                                <div 
                                    class="flex transition-transform duration-500 ease-in-out"
                                    :style="{ transform: `translateX(-${currentSlide * 100}%)` }"
                                >
                                    <div 
                                        v-for="(product, index) in products" 
                                        :key="index"
                                        class="w-full flex-shrink-0"
                                    >
                                        <div class="bg-white rounded-lg p-4 mx-2">
                                            <div class="bg-gray-100 rounded-lg mb-3 flex items-center justify-center">
                                                <!-- Product Image Placeholder -->
                                                <div class="w-full h-[140px] bg-gray-200 rounded-lg"></div>
                                            </div>
                                            <h3 class="text-sm font-semibold text-gray-800 mb-1">{{ product.name }}</h3>
                                            <p class="text-xs text-gray-600">{{ product.description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Promotional Badge -->
                    <div class="bg-white/20 rounded-lg px-4 py-3 text-white text-center">
                        <div class="font-bold text-sm">{{ brandName }}</div>
                        <div class="font-bold text-lg">{{ dealText }}</div>
                        <div class="text-xs">{{ timeText }}</div>
                    </div>
                </div>
                
                <!-- Slider Controls -->
                <div class="absolute top-4 right-4 flex space-x-2">
                            <button 
                                @click="previousSlide"
                                class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-black hover:bg-gray-100 transition-colors cursor-pointer"
                            >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button 
                        @click="toggleAutoplay"
                        class="w-12 h-8 rounded-full bg-white flex items-center justify-center transition-colors hover:bg-gray-100 cursor-pointer"
                    >
                        <svg v-if="!isAutoplay" class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                        <svg v-else class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
                        </svg>
                    </button>
                    <button 
                        @click="nextSlide"
                        class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-black hover:bg-gray-100 transition-colors cursor-pointer"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'DynamicBanner',
    props: {
        title: {
            type: String,
            default: "Top 100+ Deals everyone's eyeing"
        },
        subtitle: {
            type: String,
            default: "Hotter-than-hot savings"
        },
        buttonText: {
            type: String,
            default: "Shop Deals"
        },
        brandName: {
            type: String,
            default: "Systechware"
        },
        dealText: {
            type: String,
            default: "DEALS"
        },
        timeText: {
            type: String,
            default: "OCT. 7-12 ONLY!"
        },
        products: {
            type: Array,
            default: () => [
                {
                    name: "Gaming Laptop",
                    description: "High-performance gaming laptop with advanced graphics"
                },
                {
                    name: "Handheld Console",
                    description: "Portable gaming device with premium features"
                },
                {
                    name: "Gaming Headset",
                    description: "Professional gaming headset with noise cancellation"
                }
            ]
        },
        autoplayInterval: {
            type: Number,
            default: 3000
        }
    },
    data() {
        return {
            currentSlide: 0,
            isAutoplay: false,
            autoplayTimer: null
        }
    },
    mounted() {
        this.startAutoplay()
    },
    beforeUnmount() {
        this.stopAutoplay()
    },
    methods: {
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.products.length
        },
        previousSlide() {
            this.currentSlide = this.currentSlide === 0 ? this.products.length - 1 : this.currentSlide - 1
        },
        toggleAutoplay() {
            if (this.isAutoplay) {
                this.stopAutoplay()
            } else {
                this.startAutoplay()
            }
        },
        startAutoplay() {
            this.isAutoplay = true
            this.autoplayTimer = setInterval(() => {
                this.nextSlide()
            }, this.autoplayInterval)
        },
        stopAutoplay() {
            this.isAutoplay = false
            if (this.autoplayTimer) {
                clearInterval(this.autoplayTimer)
                this.autoplayTimer = null
            }
        }
    }
}
</script>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
