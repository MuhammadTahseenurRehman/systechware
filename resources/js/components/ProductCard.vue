    <template>
    <div class="bg-white relative w-full h-72 sm:h-80 flex flex-col min-w-0">
        <!-- Deal Badge -->
        <div class="absolute top-2 sm:top-3 left-2 sm:left-3 bg-blue-600 text-white text-sm px-2 py-1 rounded" style="background-color: #0053e2;">Deal</div>
        <!-- Heart Icon -->
        <div class="absolute top-2 sm:top-3 right-2 sm:right-3 w-5 h-5 sm:w-6 sm:h-6 bg-white/90 rounded-full flex items-center justify-center shadow-sm">
            <svg class="w-3 h-3 sm:w-4 sm:h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
        </div>
        <!-- Product Image -->
        <div class="w-full h-42 sm:h-42 py-2 bg-white rounded-lg mb-2 sm:mb-3 flex-shrink-0">
            <img class="w-full h-full object-contain" :src="image" :alt="productName" />
        </div>
        <!-- Content Area -->
        <div class="flex-1 flex flex-col justify-between px-1 sm:px-2">
            <!-- Pricing -->
            <div class="mb-1 sm:mb-2">
                <span class="text-green-600 font-bold text-sm">Now {{ currentPrice }}</span>
                <span class="text-gray-400 line-through text-sm ml-1">{{ originalPrice }}</span>
            </div>
            <!-- Product Name -->
            <p class="text-website-text text-sm mb-2 sm:mb-3 leading-tight line-clamp-2">{{ productName }}</p>
            <!-- Action Button -->
            <button class="w-auto px-3 sm:px-4 py-1.5 sm:py-2 border border-gray-800 rounded-full bg-white text-gray-800 hover:bg-gray-50 transition-colors self-start cursor-pointer text-sm">
                {{ buttonText }}
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ProductCard',
    props: {
        currentPrice: {
            type: String,
            required: true
        },
        originalPrice: {
            type: String,
            required: true
        },
        productName: {
            type: String,
            required: true
        },
        buttonText: {
            type: String,
            default: '+ Add'
        },
        image: {
            type: String,
            default: 'https://content.thebagitude.com/products_images/jQiOkp3s5E2wAtLvrFa9Hw.c-r.jpg'
        }
    }
}
</script>

