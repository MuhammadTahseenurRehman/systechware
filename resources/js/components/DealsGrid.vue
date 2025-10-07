<template>
    <section class="py-8 sm:py-12">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <!-- Large Home Deals Section (Left) -->
                <div 
                    @click="navigateTo('/home-deals')"
                    class="lg:row-span-2 bg-blue-600 rounded-lg p-4 sm:p-6 text-white cursor-pointer hover:bg-blue-700 transition-colors"
                    style="background-color: #0053e2;"
                >
                    <div class="flex flex-col h-full">
                        <div class="flex-1">
                            <h3 class="text-lg sm:text-xl md:text-2xl font-bold mb-4">Up to 50% off home</h3>
                            <div class="flex items-center justify-center h-32 sm:h-40">
                                <!-- KitchenAid Stand Mixer Placeholder -->
                                <div class="w-24 h-24 sm:w-32 sm:h-32 bg-white/20 rounded-lg flex items-center justify-center">
                                    <div class="w-16 h-16 bg-white/30 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                        <button class="bg-white text-blue-600 px-6 py-2 rounded-md font-medium hover:bg-gray-100 transition-colors cursor-pointer mt-4">
                            Shop Deals
                        </button>
                    </div>
                </div>

                <!-- Shoes Deals Section (Top Middle) -->
                <div 
                    @click="navigateTo('/shoes-deals')"
                    class="bg-blue-600 rounded-lg p-4 sm:p-6 text-white cursor-pointer hover:bg-blue-700 transition-colors"
                    style="background-color: #0053e2;"
                >
                    <div class="flex flex-col h-full">
                        <h3 class="text-sm sm:text-base md:text-lg font-bold mb-3">Up to 40% off shoes for the fam</h3>
                        <div class="flex items-center justify-center h-20 sm:h-24 mb-3">
                            <!-- Skechers Shoe Placeholder -->
                            <div class="w-16 h-12 bg-white/20 rounded-lg"></div>
                        </div>
                        <a href="#" class="text-white underline text-sm hover:text-gray-200 transition-colors cursor-pointer">
                            Shop Deals
                        </a>
                    </div>
                </div>

                <!-- Home Upgrades Deals Section (Top Right) -->
                <div 
                    @click="navigateTo('/home-upgrades-deals')"
                    class="bg-blue-600 rounded-lg p-4 sm:p-6 text-white cursor-pointer hover:bg-blue-700 transition-colors"
                    style="background-color: #0053e2;"
                >
                    <div class="flex flex-col h-full">
                        <h3 class="text-sm sm:text-base md:text-lg font-bold mb-3">Up to 30% off home upgrades</h3>
                        <div class="flex items-center justify-center h-20 sm:h-24 mb-3">
                            <!-- Lasko Tower Heater Placeholder -->
                            <div class="w-8 h-20 bg-white/20 rounded"></div>
                        </div>
                        <a href="#" class="text-white underline text-sm hover:text-gray-200 transition-colors cursor-pointer">
                            Shop Deals
                        </a>
                    </div>
                </div>

                <!-- Candy Deals Section (Bottom Middle) -->
                <div 
                    @click="navigateTo('/candy-deals')"
                    class="bg-blue-600 rounded-lg p-4 sm:p-6 text-white cursor-pointer hover:bg-blue-700 transition-colors"
                    style="background-color: #0053e2;"
                >
                    <div class="flex flex-col h-full">
                        <h3 class="text-sm sm:text-base md:text-lg font-bold mb-3">Up to 15% off candy</h3>
                        <div class="flex items-center justify-center h-20 sm:h-24 mb-3">
                            <!-- Jelly Beans Bag Placeholder -->
                            <div class="w-12 h-16 bg-white/20 rounded-lg"></div>
                        </div>
                        <a href="#" class="text-white underline text-sm hover:text-gray-200 transition-colors cursor-pointer">
                            Shop Deals
                        </a>
                    </div>
                </div>

                <!-- Backyard Play Deals Section (Bottom Right) -->
                <div 
                    @click="navigateTo('/backyard-play-deals')"
                    class="bg-blue-600 rounded-lg p-4 sm:p-6 text-white cursor-pointer hover:bg-blue-700 transition-colors"
                    style="background-color: #0053e2;"
                >
                    <div class="flex flex-col h-full">
                        <h3 class="text-sm sm:text-base md:text-lg font-bold mb-3">Up to 20% off backyard play</h3>
                        <div class="flex items-center justify-center h-20 sm:h-24 mb-3">
                            <!-- Playset Placeholder -->
                            <div class="w-16 h-12 bg-white/20 rounded-lg"></div>
                        </div>
                        <a href="#" class="text-white underline text-sm hover:text-gray-200 transition-colors cursor-pointer">
                            Shop Deals
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'DealsGrid',
    methods: {
        navigateTo(route) {
            // You can implement routing logic here
            // For now, we'll just log the route
            console.log('Navigating to:', route);
            
            // If using Vue Router, you could do:
            // this.$router.push(route);
            
            // Or for Laravel routes, you could do:
            // window.location.href = route;
            
            // For now, let's use window.location
            window.location.href = route;
        }
    }
}
</script>

<style scoped>
/* Custom grid layout for the deals grid */
@media (min-width: 1024px) {
    .lg\:row-span-2 {
        grid-row: span 2;
    }
}
</style>
