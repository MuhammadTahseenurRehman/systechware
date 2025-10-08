<template>
    <section class="py-8 sm:py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
                <!-- Left Large Card -->
                <div 
                    v-if="cards.left"
                    class="lg:row-span-2 bg-gray-100 rounded-lg p-6 sm:p-8 cursor-pointer hover:shadow-lg transition-shadow"
                    @click="handleCardClick(cards.left)"
                >
                    <div class="flex flex-col h-full">
                        <div class="flex-1">
                            <h3 class="text-sm sm:text-base font-medium text-blue-900 mb-2">{{ cards.left.subtitle }}</h3>
                            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-blue-900 mb-6">{{ cards.left.title }}</h2>
                            
                            <!-- Visual Content -->
                            <div class="relative h-48 sm:h-56 mb-6">
                                <img 
                                    :src="cards.left.image" 
                                    :alt="cards.left.title"
                                    class="w-full h-full object-cover rounded-lg"
                                />
                                <!-- Overlay elements if needed -->
                                <div v-if="cards.left.badge" class="absolute bottom-4 left-4 bg-white px-3 py-1 rounded-full text-xs font-semibold text-blue-900">
                                    {{ cards.left.badge }}
                                </div>
                            </div>
                        </div>
                        
                        <!-- Call to Action -->
                        <button class="w-full sm:w-auto bg-white border-2 border-blue-900 text-blue-900 px-6 py-3 rounded-md font-semibold hover:bg-blue-50 transition-colors cursor-pointer">
                            {{ cards.left.buttonText }}
                        </button>
                    </div>
                </div>

                <!-- Middle Column -->
                <div class="flex flex-col gap-4 sm:gap-6">
                    <!-- Top Middle Card -->
                    <div 
                        v-if="cards.middleTop"
                        class="bg-gray-100 rounded-lg p-4 sm:p-6 cursor-pointer hover:shadow-lg transition-shadow"
                        @click="handleCardClick(cards.middleTop)"
                    >
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <div class="flex-1">
                                <h3 class="text-base sm:text-lg font-bold text-blue-900 mb-2">{{ cards.middleTop.title }}</h3>
                                <p class="text-sm sm:text-base text-blue-900 mb-4">{{ cards.middleTop.description }}</p>
                                <a href="#" class="text-blue-900 underline text-sm sm:text-base hover:text-blue-700 transition-colors cursor-pointer">
                                    {{ cards.middleTop.buttonText }}
                                </a>
                                <p v-if="cards.middleTop.finePrint" class="text-xs text-gray-500 mt-2">{{ cards.middleTop.finePrint }}</p>
                            </div>
                            <div class="w-24 h-24 sm:w-32 sm:h-32 flex-shrink-0">
                                <img 
                                    :src="cards.middleTop.image" 
                                    :alt="cards.middleTop.title"
                                    class="w-full h-full object-cover rounded-lg"
                                />
                            </div>
                        </div>
                    </div>

                    <!-- Bottom Middle Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <!-- Bottom Left Card -->
                        <div 
                            v-if="cards.middleBottomLeft"
                            class="bg-white rounded-lg p-4 sm:p-6 cursor-pointer hover:shadow-lg transition-shadow"
                            @click="handleCardClick(cards.middleBottomLeft)"
                        >
                            <div class="flex flex-col h-full">
                                <h3 class="text-base sm:text-lg font-bold text-blue-900 mb-4">{{ cards.middleBottomLeft.title }}</h3>
                                <div class="flex-1 mb-4">
                                    <img 
                                        :src="cards.middleBottomLeft.image" 
                                        :alt="cards.middleBottomLeft.title"
                                        class="w-full h-32 sm:h-40 object-cover rounded-lg"
                                    />
                                </div>
                                <a href="#" class="text-blue-900 underline text-sm sm:text-base hover:text-blue-700 transition-colors cursor-pointer">
                                    {{ cards.middleBottomLeft.buttonText }}
                                </a>
                            </div>
                        </div>

                        <!-- Bottom Right Card -->
                        <div 
                            v-if="cards.middleBottomRight"
                            class="bg-white rounded-lg p-4 sm:p-6 cursor-pointer hover:shadow-lg transition-shadow"
                            @click="handleCardClick(cards.middleBottomRight)"
                        >
                            <div class="flex flex-col h-full">
                                <h3 class="text-base sm:text-lg font-bold text-blue-900 mb-4">{{ cards.middleBottomRight.title }}</h3>
                                <div class="flex-1 mb-4">
                                    <img 
                                        :src="cards.middleBottomRight.image" 
                                        :alt="cards.middleBottomRight.title"
                                        class="w-full h-32 sm:h-40 object-cover rounded-lg"
                                    />
                                </div>
                                <a href="#" class="text-blue-900 underline text-sm sm:text-base hover:text-blue-700 transition-colors cursor-pointer">
                                    {{ cards.middleBottomRight.buttonText }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Large Card -->
                <div 
                    v-if="cards.right"
                    class="lg:row-span-2 bg-blue-100 rounded-lg p-6 sm:p-8 cursor-pointer hover:shadow-lg transition-shadow"
                    @click="handleCardClick(cards.right)"
                >
                    <div class="flex flex-col h-full">
                        <div class="flex-1">
                            <h3 class="text-sm sm:text-base font-medium text-blue-900 mb-2">{{ cards.right.subtitle }}</h3>
                            <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-blue-900 mb-6">{{ cards.right.title }}</h2>
                            
                            <!-- Visual Content -->
                            <div class="relative h-48 sm:h-56 mb-6">
                                <img 
                                    :src="cards.right.image" 
                                    :alt="cards.right.title"
                                    class="w-full h-full object-cover rounded-lg"
                                />
                                <!-- Badge -->
                                <div v-if="cards.right.badge" class="absolute bottom-4 left-4 bg-white px-3 py-1 rounded-full text-xs font-semibold text-blue-900 flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                                    </svg>
                                    {{ cards.right.badge }}
                                </div>
                            </div>
                        </div>
                        
                        <!-- Call to Action -->
                        <a href="#" class="text-blue-900 underline text-sm sm:text-base hover:text-blue-700 transition-colors cursor-pointer">
                            {{ cards.right.buttonText }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'PromotionalCards',
    props: {
        cards: {
            type: Object,
            required: true,
            default: () => ({
                left: {
                    title: "5% cash back at Multiple Networks",
                    subtitle: "Multiple Networks + Free Shipping + Excellent Customer Service",
                    buttonText: "Learn more",
                    image: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=500&fit=crop&crop=center",
                    badge: null
                },
                middleTop: {
                    title: "Insulin, GLP-1s & more",
                    description: "New! Now delivering refrigerated Rx.",
                    buttonText: "Learn more",
                    image: "https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=200&h=200&fit=crop&crop=center",
                    finePrint: "Delivery not available for all medications. Exclusions apply. Actual delivery package may differ."
                },
                middleBottomLeft: {
                    title: "Fall yard cleanup services",
                    buttonText: "Schedule now",
                    image: "https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=300&h=200&fit=crop&crop=center"
                },
                middleBottomRight: {
                    title: "Book same-day vaccines",
                    buttonText: "Schedule now",
                    image: "https://images.unsplash.com/photo-1629362058314-eaaddfefd618?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                },
                right: {
                    title: "Must-have tech in as fast as 1 hour*",
                    subtitle: "Upgrade on the fly",
                    buttonText: "Shop now",
                    image: "https://images.unsplash.com/photo-1606144042614-b2417e99c4e3?w=400&h=500&fit=crop&crop=center",
                    badge: "Express Delivery"
                }
            })
        }
    },
    methods: {
        handleCardClick(card) {
            console.log('Card clicked:', card);
            // You can emit an event or handle navigation here
            this.$emit('card-clicked', card);
        }
    }
}
</script>
<style scoped>
/* Custom grid layout for the promotional cards */
@media (min-width: 1024px) {
    .lg\:row-span-2 {
        grid-row: span 2;
    }
}
</style>

