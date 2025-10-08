<template>
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-6 relative overflow-x-auto">
        <product-card 
            v-for="(product, index) in products" 
            :key="index"
            :current-price="product.currentPrice" 
            :original-price="product.originalPrice" 
            :product-name="product.name"
            :button-text="product.buttonText"
            :image="product.image">
        </product-card>
    </div>
</template>

<script>
export default {
    name: 'ProductGrid',
    props: {
        products: {
            type: Array,
            required: true
        }
    }
}
</script>
