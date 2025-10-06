<template>
    <div :class="containerClasses">
        <div class="flex items-center gap-2">
            <p v-if="numericOriginalPrice" :class="originalPriceClasses">${{ numericOriginalPrice.toFixed(2) }}</p>
            <div v-if="numericOriginalPrice" :class="saveTextClasses">
                Save ${{ (numericOriginalPrice - numericCurrentPrice).toFixed(2) }}
            </div>
        </div>
        <p :class="currentPriceClasses">${{ numericCurrentPrice.toFixed(2) }}</p>
    </div>
</template>

<script>
export default {
    name: 'PriceDisplay',
    props: {
        currentPrice: {
            type: [Number, String],
            required: true
        },
        originalPrice: {
            type: [Number, String],
            default: null
        },
        className: {
            type: String,
            default: ''
        },
        variant: {
            type: String,
            default: 'default'
        }
    },
    computed: {
        // Convert string prices to numbers if needed
        numericCurrentPrice() {
            return typeof this.currentPrice === 'string' ? parseFloat(this.currentPrice) : this.currentPrice;
        },
        numericOriginalPrice() {
            if (!this.originalPrice) return null;
            return typeof this.originalPrice === 'string' ? parseFloat(this.originalPrice) : this.originalPrice;
        },
        containerClasses() {
            // Default classes
            const defaultClasses = 'flex flex-col items-end';
            // Merge with custom classes if provided
            return this.className ? `${defaultClasses} ${this.className}` : defaultClasses;
        },
        originalPriceClasses() {
            return this.variant === 'cart' || this.variant === 'checkout' 
                ? 'text-xs text-website-text line-through'
                : 'text-xs md:text-sm text-website-text line-through';
        },
        saveTextClasses() {
            return this.variant === 'cart' || this.variant === 'checkout'
                ? 'text-xs text-website-primary font-semibold'
                : 'text-xs md:text-sm text-website-primary font-semibold';
        },
        currentPriceClasses() {
            if (this.variant === 'cart') {
                return 'text-base font-semibold text-website-heading';
            } else if (this.variant === 'checkout') {
                return 'text-base font-semibold text-website-heading';
            } else {
                return 'text-xl lg:text-[28px] font-semibold text-website-heading';
            }
        }
    }
}
</script> 