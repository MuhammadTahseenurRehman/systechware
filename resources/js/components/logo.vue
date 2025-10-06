<template>
    <img 
        class="h-8 w-auto" 
        :src="logoSrc" 
        :alt="logoAlt" 
    />
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    logoType: {
        type: String,
        default: 'dark', // Default to dark logo
        validator: (value) => ['light', 'dark'].includes(value)
    }
})

const logoSrc = computed(() => {
    if (props.logoType === 'light') {
        return '/images/logo-light.svg'
    }
    // Default to dark logo
    return '/images/logo.svg'
})

const logoAlt = computed(() => {
    return `Company Logo (${props.logoType})`
})
</script>