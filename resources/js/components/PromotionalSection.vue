<template>
    <section class="py-8 sm:py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                <!-- Left Column - Promotional Banner -->
                <div class="bg-gradient-to-br from-orange-100 to-pink-100 rounded-lg p-6 sm:p-8 relative overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="w-full h-full bg-stripes bg-repeat"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Brand Text -->
                        <p class="text-blue-800 text-sm sm:text-base font-medium mb-2">{{ brandText }}</p>
                        
                        <!-- Main Headline -->
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-blue-900 mb-6">{{ mainHeadline }}</h2>
                        
                        <!-- Call to Action Button -->
                        <button class="bg-white text-blue-900 px-6 py-3 rounded-md font-semibold border border-blue-900 hover:bg-blue-50 transition-colors cursor-pointer">
                            {{ buttonText }}
                        </button>
                    </div>
                    
                    <!-- Product Images -->
                    <div class="absolute bottom-4 right-4 flex space-x-2 opacity-80">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white/30 rounded-lg flex items-center justify-center">
                            <div class="w-12 h-12 bg-orange-200 rounded"></div>
                        </div>
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white/30 rounded-lg flex items-center justify-center">
                            <div class="w-12 h-12 bg-red-200 rounded"></div>
                        </div>
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white/30 rounded-lg flex items-center justify-center">
                            <div class="w-12 h-12 bg-yellow-200 rounded"></div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Product Display -->
                <div class="bg-white rounded-lg p-6 sm:p-8">
                    <!-- Section Header -->
                    <div class="mb-6">
                        <h3 class="text-xl sm:text-2xl font-bold text-website-heading mb-2">{{ sectionTitle }}</h3>
                        <p class="text-gray-600 text-sm sm:text-base">{{ sectionSubtitle }}</p>
                    </div>
                    
                    <!-- Products Grid -->
                    <div class="relative">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <!-- Product Cards -->
                            <div 
                                v-for="(product, index) in products" 
                                :key="index"
                                class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow relative"
                            >
                                <!-- Heart Icon -->
                                <div class="absolute top-3 right-3 w-6 h-6 bg-white/90 rounded-full flex items-center justify-center shadow-sm cursor-pointer">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                
                                <!-- Product Image -->
                                <div class="w-full h-32 bg-gray-100 rounded-lg mb-3 flex items-center justify-center">
                                    <div class="w-20 h-20 bg-gray-200 rounded-lg"></div>
                                </div>
                                
                                <!-- Product Info -->
                                <div class="mb-3">
                                    <p class="font-bold text-website-heading text-lg">{{ product.price }}</p>
                                    <p class="text-sm text-website-text leading-tight">{{ product.name }}</p>
                                </div>
                                
                                <!-- Add Button -->
                                <button class="w-full py-2 border border-gray-800 rounded-md text-sm bg-white text-gray-800 hover:bg-gray-50 transition-colors cursor-pointer">
                                    {{ product.buttonText }}
                                </button>
                            </div>
                        </div>
                        
                        <!-- Navigation Arrow -->
                        <div class="absolute right-0 top-1/2 transform -translate-y-1/2 -translate-x-4">
                            <button class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors cursor-pointer shadow-lg">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                <!-- Left Column - Promotional Banner -->
                <div class="bg-white rounded-lg p-6 sm:p-8">
                    <!-- Section Header -->
                    <div class="mb-6">
                        <h3 class="text-xl sm:text-2xl font-bold text-website-heading mb-2">{{ sectionTitle }}</h3>
                        <p class="text-gray-600 text-sm sm:text-base">{{ sectionSubtitle }}</p>
                    </div>
                    
                    <!-- Products Grid -->
                    <div class="relative">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <!-- Product Cards -->
                            <div 
                                v-for="(product, index) in products" 
                                :key="index"
                                class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow relative"
                            >
                                <!-- Heart Icon -->
                                <div class="absolute top-3 right-3 w-6 h-6 bg-white/90 rounded-full flex items-center justify-center shadow-sm cursor-pointer">
                                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </div>
                                
                                <!-- Product Image -->
                                <div class="w-full h-32 bg-gray-100 rounded-lg mb-3 flex items-center justify-center">
                                    <div class="w-20 h-20 bg-gray-200 rounded-lg"></div>
                                </div>
                                
                                <!-- Product Info -->
                                <div class="mb-3">
                                    <p class="font-bold text-website-heading text-lg">{{ product.price }}</p>
                                    <p class="text-sm text-website-text leading-tight">{{ product.name }}</p>
                                </div>
                                
                                <!-- Add Button -->
                                <button class="w-full py-2 border border-gray-800 rounded-md text-sm bg-white text-gray-800 hover:bg-gray-50 transition-colors cursor-pointer">
                                    {{ product.buttonText }}
                                </button>
                            </div>
                        </div>
                        
                        <!-- Navigation Arrow -->
                        <div class="absolute right-0 top-1/2 transform -translate-y-1/2 -translate-x-4">
                            <button class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition-colors cursor-pointer shadow-lg">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-orange-100 to-pink-100 rounded-lg p-6 sm:p-8 relative overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="w-full h-full bg-stripes bg-repeat"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="relative z-10">
                        <!-- Brand Text -->
                        <p class="text-blue-800 text-sm sm:text-base font-medium mb-2">{{ brandText }}</p>
                        
                        <!-- Main Headline -->
                        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-blue-900 mb-6">{{ mainHeadline }}</h2>
                        
                        <!-- Call to Action Button -->
                        <button class="bg-white text-blue-900 px-6 py-3 rounded-md font-semibold border border-blue-900 hover:bg-blue-50 transition-colors cursor-pointer">
                            {{ buttonText }}
                        </button>
                    </div>
                    
                    <!-- Product Images -->
                    <div class="absolute bottom-4 right-4 flex space-x-2 opacity-80">
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white/30 rounded-lg flex items-center justify-center">
                            <div class="w-12 h-12 bg-orange-200 rounded"></div>
                        </div>
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white/30 rounded-lg flex items-center justify-center">
                            <div class="w-12 h-12 bg-red-200 rounded"></div>
                        </div>
                        <div class="w-16 h-16 sm:w-20 sm:h-20 bg-white/30 rounded-lg flex items-center justify-center">
                            <div class="w-12 h-12 bg-yellow-200 rounded"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'PromotionalSection',
    props: {
        brandText: {
            type: String,
            default: "Premium Tech Brands & More"
        },
        mainHeadline: {
            type: String,
            default: "Discover tech's best deals"
        },
        buttonText: {
            type: String,
            default: "Shop now"
        },
        sectionTitle: {
            type: String,
            default: "Featured Products"
        },
        sectionSubtitle: {
            type: String,
            default: "Top-rated tech products at great prices."
        },
        products: {
            type: Array,
            default: () => [
                {
                    name: "High-Performance Laptop",
                    price: "$899.99",
                    buttonText: "+ Add"
                },
                {
                    name: "Professional Monitor",
                    price: "$299.99",
                    buttonText: "Options"
                },
                {
                    name: "Wireless Headphones",
                    price: "$149.99",
                    buttonText: "+ Add"
                }
            ]
        }
    }
}
</script>

<style scoped>
.bg-stripes {
    background-image: repeating-linear-gradient(
        90deg,
        transparent,
        transparent 10px,
        rgba(0,0,0,0.1) 10px,
        rgba(0,0,0,0.1) 11px
    );
}
</style>
