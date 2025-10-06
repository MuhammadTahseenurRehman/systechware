<template>
  <!-- Search Modal -->
  <TransitionRoot as="template" :show="isOpen" @after-leave="query = ''" appear>
    <Dialog as="div" class="relative z-50" @close="closeModal">
      <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-website-text/75 transition-opacity backdrop-blur-sm"></div>
      </TransitionChild>

      <div class="fixed inset-0 z-10 overflow-y-auto p-4 sm:p-6 md:p-20">
        <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 scale-95" enter-to="opacity-100 scale-100" leave="ease-in duration-200" leave-from="opacity-100 scale-100" leave-to="opacity-0 scale-95">
          <DialogPanel class="mx-auto max-w-xl transform divide-y divide-gray-100 overflow-hidden rounded-xl bg-white shadow-2xl transition-all">
            <div class="relative">
              <MagnifyingGlassIcon class="pointer-events-none absolute left-4 top-3.5 h-5 w-5 text-gray-400" aria-hidden="true" />
              <input
                type="text"
                class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-website-heading placeholder:text-gray-400 focus:ring-0 sm:text-sm focus:outline-none"
                placeholder="Find something..."
                v-model="query"
                @keydown.esc="closeModal"
                @keydown.enter="handleEnter"
                ref="searchInput"
              />
            </div>

            <div v-if="query === ''" class="px-6 py-14 text-center text-sm sm:px-14">
              <MagnifyingGlassIcon class="mx-auto h-6 w-6 text-gray-400" aria-hidden="true" />
              <p class="mt-4 font-semibold text-website-heading">Search for anything</p>
              <p class="mt-2 text-website-text">Quickly search and jump to any page, product, or brand.</p>
            </div>

            <div v-else-if="filteredResults.length === 0" class="px-6 py-14 text-center text-sm sm:px-14">
              <MagnifyingGlassIcon class="mx-auto h-6 w-6 text-gray-400" aria-hidden="true" />
              <p class="mt-4 font-semibold text-website-heading">No results found</p>
              <p class="mt-2 text-website-text">We couldn't find anything with that term. Please try again.</p>
            </div>

            <ul v-else class="max-h-96 flex-1 overflow-y-auto py-4 text-sm">
              <!-- Recent Searches -->
              <li v-if="recentSearches.length > 0 && query === ''" class="px-6 py-2">
                <h3 class="text-xs font-semibold text-website-text uppercase tracking-wide">Recent searches</h3>
                <ul class="mt-2 space-y-1">
                  <li v-for="search in recentSearches" :key="search" class="flex items-center px-2 py-1 hover:bg-gray-100 rounded cursor-pointer" @click="selectRecentSearch(search)">
                    <ClockIcon class="h-4 w-4 text-gray-400 mr-2" />
                    <span class="text-gray-700">{{ search }}</span>
                  </li>
                </ul>
              </li>

              <!-- Search Results -->
              <li v-if="filteredResults.length > 0" class="px-6 py-2">
                <h3 v-if="query !== ''" class="text-xs font-semibold text-website-text uppercase tracking-wide mb-2">Results</h3>
                <ul class="space-y-1">
                  <li v-for="result in filteredResults" :key="result.id" class="flex items-center px-2 py-2 hover:bg-gray-100 rounded cursor-pointer" @click="selectResult(result)">
                    <div class="flex items-center flex-1">
                      <div v-if="result.type === 'product'" class="w-8 h-8 bg-gray-200 rounded mr-3 flex-shrink-0">
                        <img v-if="result.imageSrc" :src="result.imageSrc" :alt="result.name" class="w-full h-full object-cover rounded" />
                      </div>
                      <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-website-heading truncate">{{ result.name }}</p>
                        <p v-if="result.type === 'product'" class="text-xs text-website-text truncate">{{ result.description }}</p>
                        <p v-if="result.type === 'product'" class="text-xs text-gray-400">Part# {{ result.partNumber }} SKU {{ result.sku }}</p>
                      </div>
                    </div>
                    <ArrowUpRightIcon class="h-4 w-4 text-gray-400 ml-2" />
                  </li>
                </ul>
              </li>
            </ul>
          </DialogPanel>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script setup>
import { ref, computed, watch, nextTick } from 'vue'
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { MagnifyingGlassIcon, ClockIcon, ArrowUpRightIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
  isOpen: {
    type: Boolean,
    default: false
  },
  products: {
    type: Array,
    default: () => []
  }
})

const emit = defineEmits(['close', 'select-brand', 'select-category', 'select-product'])

const query = ref('')
const searchInput = ref(null)
const recentSearches = ref(['Next.js', 'Tailwind CSS', 'React'])

// Focus input when modal opens
watch(() => props.isOpen, (newValue) => {
  if (newValue) {
    nextTick(() => {
      searchInput.value?.focus()
    })
  }
})

// Filter results based on query
const filteredResults = computed(() => {
  if (!query.value) return []
  
  const searchTerm = query.value.toLowerCase()
  const results = []
  
  // Search in products
  props.products.forEach(product => {
    if (
      product.name.toLowerCase().includes(searchTerm) ||
      product.description.toLowerCase().includes(searchTerm) ||
      product.brand.toLowerCase().includes(searchTerm) ||
      product.partNumber.toLowerCase().includes(searchTerm) ||
      product.sku.toLowerCase().includes(searchTerm)
    ) {
      results.push({
        ...product,
        type: 'product'
      })
    }
  })
  
  // Search in brands
  const brands = ['Cisco', 'Lenovo', 'Netgear', 'Microsoft', 'HP', 'Adobe', 'Fortinet', 'APC', 'Eaton', 'Samsung']
  brands.forEach(brand => {
    if (brand.toLowerCase().includes(searchTerm)) {
      results.push({
        id: `brand-${brand}`,
        name: brand,
        type: 'brand'
      })
    }
  })
  
  // Search in categories
  const categories = ['New Arrivals', 'Objects', 'Tees', 'Sweatshirts', 'Pants & Shorts']
  categories.forEach(category => {
    if (category.toLowerCase().includes(searchTerm)) {
      results.push({
        id: `category-${category}`,
        name: category,
        type: 'category'
      })
    }
  })
  
  return results.slice(0, 10) // Limit to 10 results
})

function closeModal() {
  emit('close')
}

function handleEnter() {
  if (filteredResults.value.length > 0) {
    selectResult(filteredResults.value[0])
  }
}

function selectResult(result) {
  if (result.type === 'product') {
    emit('select-product', result)
  } else if (result.type === 'brand') {
    emit('select-brand', result.name)
  } else if (result.type === 'category') {
    emit('select-category', result.name)
  }
  
  // Add to recent searches
  if (!recentSearches.value.includes(result.name)) {
    recentSearches.value.unshift(result.name)
    recentSearches.value = recentSearches.value.slice(0, 5) // Keep only 5 recent searches
  }
  
  closeModal()
}

function selectRecentSearch(search) {
  query.value = search
}
</script>