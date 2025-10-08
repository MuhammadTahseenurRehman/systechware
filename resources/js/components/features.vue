<template>
  <div class="bg-white">
    <h2 class="sr-only">Our perks</h2>
    <div class="mx-auto max-w-8xl divide-y divide-gray-200 lg:flex lg:justify-center lg:divide-x lg:divide-y-0 lg:py-8">
      <div v-for="(perk, perkIdx) in perks" :key="perkIdx" class="py-8 lg:w-1/3 lg:flex-none lg:py-0">
        <div class="mx-auto flex max-w-xs items-center px-4 lg:max-w-none lg:px-8">
          <component :is="perk.icon" class="size-8 shrink-0 text-indigo-600" aria-hidden="true" />
          <div class="ml-4 flex flex-auto flex-col-reverse">
            <h3 class="font-medium text-website-heading">{{ perk.name }}</h3>
            <p class="text-sm text-website-text">{{ perk.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
  import { ArrowPathIcon, CalendarIcon, TruckIcon } from '@heroicons/vue/24/outline'

  const perks = [
    { name: '1-Year Guarantee', description: 'Confidence in our Service and quality', icon: CalendarIcon },
    { name: '30-Day Returns', description: 'Free returns on all orders', icon: ArrowPathIcon },
    { name: 'Free Next Day Delivery', description: '7 Days a Week for orders over £1500', icon: TruckIcon },
  ]
</script>