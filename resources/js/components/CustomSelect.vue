<template>
  <div class="grid grid-cols-1 relative">
    <select 
      :id="id"
      :name="name" 
      :aria-label="ariaLabel"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
      class="text-xs md:text-sm col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-website-text outline-1 -outline-offset-1 outline-website-border focus-visible:outline-2 focus-visible:-outline-offset-2 focus-visible:outline-website-link"
    >
      <slot></slot>
    </select>
    <ChevronDownIcon class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-website-text sm:size-4" aria-hidden="true" />
  </div>
</template>

<script setup>
import { ChevronDownIcon } from '@heroicons/vue/16/solid'

defineProps({
  id: String,
  name: String,
  ariaLabel: String,
  modelValue: [String, Number]
})

defineEmits(['update:modelValue'])
</script> 