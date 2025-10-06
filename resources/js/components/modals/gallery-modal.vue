<template>
  <TransitionRoot as="template" :show="open">
    <Dialog class="relative z-50" @close="$emit('close')">
      <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-black/75 transition-opacity" />
      </TransitionChild>

      <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 sm:p-6 lg:p-8">
          <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 scale-95" enter-to="opacity-100 scale-100" leave="ease-in duration-200" leave-from="opacity-100 scale-100" leave-to="opacity-0 scale-95">
            <DialogPanel class="relative w-full max-w-4xl max-h-[90vh] transform transition-all">
              <!-- Modal Content -->
              <div class="bg-white rounded-lg overflow-hidden shadow-2xl flex flex-col max-h-[90vh] relative">
                <!-- Absolutely Positioned Close Button -->
                <button 
                  type="button" 
                  class="absolute top-4 right-4 z-20 text-website-text hover:text-website-heading focus:outline-none focus:ring-2 focus:ring-website-link rounded-full p-2 bg-white/90 hover:bg-white shadow-lg transition-all duration-200"
                  @click="$emit('close')"
                >
                  <span class="sr-only">Close</span>
                  <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                </button>

                <!-- Scrollable Content -->
                <div class="flex-1 overflow-y-auto pt-4">
                  <!-- Main Image Container -->
                  <div class="relative mx-4 mb-4 overflow-hidden flex justify-center">
                    <!-- Desktop Navigation Arrows (hidden on mobile) -->
                    <button 
                      v-if="images.length > 1"
                      @click="previousImage"
                      class="hidden lg:block absolute left-4 top-1/2 transform -translate-y-1/2 z-10 bg-white/90 text-website-heading rounded-full p-2 hover:bg-white transition-colors focus:outline-none focus:ring-2 focus:ring-website-link shadow-lg"
                    >
                      <ChevronLeftIcon class="h-5 w-5" aria-hidden="true" />
                      <span class="sr-only">Previous image</span>
                    </button>

                    <!-- Main Image with Mobile Swipe -->
                    <div 
                      class="relative w-full flex justify-center"
                      @touchstart="handleTouchStart"
                      @touchend="handleTouchEnd"
                    >
                      <img 
                        :src="images[currentImageIndex]?.src" 
                        :alt="images[currentImageIndex]?.alt || 'Product image'" 
                        class="max-w-full max-h-[70vh] object-contain"
                      />
                    </div>

                    <!-- Desktop Navigation Arrows (hidden on mobile) -->
                    <button 
                      v-if="images.length > 1"
                      @click="nextImage"
                      class="hidden lg:block absolute right-4 top-1/2 transform -translate-y-1/2 z-10 bg-white/90 text-website-heading rounded-full p-2 hover:bg-white transition-colors focus:outline-none focus:ring-2 focus:ring-website-link shadow-lg"
                    >
                      <ChevronRightIcon class="h-5 w-5" aria-hidden="true" />
                      <span class="sr-only">Next image</span>
                    </button>

                    <!-- Image Counter (mobile only) -->
                    <div class="lg:hidden absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-black/70 text-white px-3 py-1 rounded-full text-sm">
                      {{ currentImageIndex + 1 }} / {{ images.length }}
                    </div>
                  </div>

                  <!-- Thumbnail Gallery (mobile only) -->
                  <div v-if="images.length > 1" class="lg:hidden px-4 pb-4">
                    <div class="flex gap-2 justify-center overflow-x-auto pb-2 pl-12">
                      <button
                        v-for="(image, index) in images" 
                        :key="image.id"
                        @click="setCurrentImage(index)"
                        class="flex-shrink-0 relative"
                      >
                        <img 
                          :src="image.src" 
                          :alt="image.alt || `Product image ${index + 1}`"
                          class="w-16 h-16 object-cover rounded-md border-2 transition-all duration-200"
                          :class="[
                            currentImageIndex === index 
                              ? 'border-website-link' 
                              : 'border-website-border hover:border-website-text'
                          ]"
                        />
                      </button>
                    </div>
                  </div>

                  <!-- Desktop Thumbnail Gallery -->
                  <div v-if="images.length > 1" class="hidden lg:block px-4 pb-4">
                    <div class="flex gap-2 justify-center overflow-x-auto pb-2">
                      <button
                        v-for="(image, index) in images" 
                        :key="image.id"
                        @click="setCurrentImage(index)"
                        class="flex-shrink-0 relative"
                      >
                        <img 
                          :src="image.src" 
                          :alt="image.alt || `Product image ${index + 1}`"
                          class="w-16 h-16 object-cover rounded-md border-2 transition-all duration-200"
                          :class="[
                            currentImageIndex === index 
                              ? 'border-website-link' 
                              : 'border-website-border hover:border-website-text'
                          ]"
                        />
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script setup>
import { ref, watch, onMounted, onUnmounted } from 'vue'
import { Dialog, DialogPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XMarkIcon, ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/24/outline'

// Define props
const props = defineProps({
  open: {
    type: Boolean,
    default: false
  },
  images: {
    type: Array,
    required: true,
    default: () => []
  },
  initialIndex: {
    type: Number,
    default: 0
  }
})

// Define emits
defineEmits(['close'])

// Current image index
const currentImageIndex = ref(props.initialIndex)

// Mobile swipe functionality
let touchStartX = 0
let touchEndX = 0

function handleTouchStart(e) {
  touchStartX = e.changedTouches[0].screenX
}

function handleTouchEnd(e) {
  touchEndX = e.changedTouches[0].screenX
  handleSwipe()
}

function handleSwipe() {
  const swipeThreshold = 50
  const diff = touchStartX - touchEndX
  
  if (Math.abs(diff) > swipeThreshold) {
    if (diff > 0) {
      // Swipe left - next image
      nextImage()
    } else {
      // Swipe right - previous image
      previousImage()
    }
  }
}

// Watch for prop changes
watch(() => props.initialIndex, (newIndex) => {
  currentImageIndex.value = newIndex
})

watch(() => props.open, (isOpen) => {
  if (isOpen) {
    currentImageIndex.value = props.initialIndex
    // Lock body scroll when modal opens
    document.body.style.overflow = 'hidden'
  } else {
    // Restore body scroll when modal closes
    document.body.style.overflow = ''
  }
})

// Navigation functions
function nextImage() {
  if (currentImageIndex.value < props.images.length - 1) {
    currentImageIndex.value++
  } else {
    currentImageIndex.value = 0 // Loop back to first image
  }
}

function previousImage() {
  if (currentImageIndex.value > 0) {
    currentImageIndex.value--
  } else {
    currentImageIndex.value = props.images.length - 1 // Loop to last image
  }
}

function setCurrentImage(index) {
  currentImageIndex.value = index
}

// Keyboard navigation
function handleKeydown(event) {
  if (!props.open) return
  
  switch (event.key) {
    case 'ArrowLeft':
      event.preventDefault()
      previousImage()
      break
    case 'ArrowRight':
      event.preventDefault()
      nextImage()
      break
    case 'Escape':
      event.preventDefault()
      // The dialog will handle this automatically
      break
  }
}

// Add keyboard event listener when mounted
onMounted(() => {
  document.addEventListener('keydown', handleKeydown)
})

onUnmounted(() => {
  document.removeEventListener('keydown', handleKeydown)
  // Ensure body scroll is restored if component unmounts while modal is open
  document.body.style.overflow = ''
})
</script> 