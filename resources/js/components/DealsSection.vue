<template>
    <section class="bg-white py-4">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
            <!-- Section Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-4">
                <div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-website-heading">{{ title }}</h2>
                    <p class="text-gray-600 text-sm mt-1">{{ subtitle }}</p>
                </div>
                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium text-sm sm:text-base cursor-pointer" style="color: #0053e2;">{{ viewAllText }}</a>
            </div>
            
            <!-- Product Grid -->
            <product-grid :products="products"></product-grid>
        </div>
    </section>
</template>

<script>
export default {
    name: 'DealsSection',
    props: {
        title: {
            type: String,
            required: true
        },
        subtitle: {
            type: String,
            default: ''
        },
        viewAllText: {
            type: String,
            default: 'View all'
        },
        products: {
            type: Array,
            required: true
        }
    }
}
</script>
