<template>
  <div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-2 md:py-8 sm:px-6 lg:max-w-7xl lg:px-8">
      <!-- Container with responsive layout -->
      <div class="flex flex-col lg:grid lg:grid-cols-[1.5fr_1fr] lg:items-start lg:gap-x-15">
        
        <!-- Image Gallery - First on mobile, Left column on desktop -->
        <div class="order-1 lg:order-1">
          <!-- Mobile Image Section (50vh with slider) -->
          <div class="lg:hidden">
            <!-- Product Title and Part Number (above image on mobile) -->
            <div class="sm:px-4 py-3 bg-white">
              <h1 class="text-lg font-bold text-website-heading mb-1 line-clamp-2">{{ product.name }}</h1>
              <p class="text-sm text-website-text">Part #: {{ product.partNumber }}</p>
            </div>
            
            <!-- Image Container -->
            <div class="h-[35vh] relative overflow-hidden">
              <div class="absolute inset-0">
                <img 
                  :src="product.images[currentImageIndex].src" 
                  :alt="product.images[currentImageIndex].alt"
                  class="w-full h-full object-contain cursor-pointer"
                  @touchstart="handleTouchStart"
                  @touchend="handleTouchEnd"
                  @click="openGallery(currentImageIndex)"
                />
              </div>
            </div>
            
            <!-- Slider dots (below image) -->
            <div class="flex justify-center py-3 bg-white">
              <div class="flex space-x-2">
                <button 
                  v-for="(image, index) in product.images" 
                  :key="index"
                  @click="currentImageIndex = index"
                  class="w-2 h-2 rounded-full transition-all"
                  :class="index === currentImageIndex ? 'bg-website-heading' : 'bg-website-border'"
                />
              </div>
            </div>
          </div>

          <!-- Desktop Image Gallery (existing code) -->
          <TabGroup as="div" class="hidden lg:flex flex-col-reverse sm:flex-row gap-8 lg:gap-15 md:h-[calc(100vh-250px)] md:max-h-[370px]" v-slot="{ selectedIndex }">
            <!-- Image selector -->
            <div class="mx-auto w-full sm:w-auto relative group">
              <!-- Top Arrow (Desktop only) - show on hover -->
              <button 
                v-if="product.images.length > 4" 
                @click="slideThumbnails('up')"
                :disabled="currentSlide === 0"
                class="hidden sm:block absolute -top-2 left-1/2 transform -translate-x-1/2 z-10 bg-white text-website-text hover:text-website-heading rounded-full p-1 shadow-md border border-website-border opacity-0 group-hover:opacity-100 transition-opacity duration-200 disabled:opacity-30"
              >
                <ChevronUpIcon class="h-4 w-4" aria-hidden="true" />
              </button>

              <div class="sm:h-[280px] sm:overflow-hidden">
                <TabList 
                  class="flex gap-3 sm:flex-col sm:w-20 sm:gap-3 overflow-x-auto sm:overflow-visible ml-2 sm:ml-0 pb-2 sm:pb-0 snap-x snap-mandatory transition-transform duration-300 ease-in-out"
                  :style="{ transform: `translateY(-${currentSlide * 76}px)` }"
                >
                  <Tab v-for="image in product.images" :key="image.id" class="relative flex w-16 h-16 cursor-pointer items-center justify-center bg-white text-xs md:text-sm font-medium text-website-heading uppercase hover:bg-gray-50 focus:outline-hidden flex-shrink-0 snap-start rounded-md overflow-hidden" v-slot="{ selected }">
                    <span class="sr-only">{{ image.name }}</span>
                    <span class="absolute inset-0 overflow-hidden rounded-md">
                      <img :src="image.src" alt="" class="size-full object-cover" />
                    </span>
                    <span class="pointer-events-none absolute inset-0 rounded-md" aria-hidden="true" />
                  </Tab>
                </TabList>
              </div>

              <!-- Bottom Arrow (Desktop only) - show on hover -->
              <button 
                v-if="product.images.length > 4"
                @click="slideThumbnails('down')"
                :disabled="currentSlide >= maxSlides - 1"
                class="hidden sm:block absolute -bottom-2 left-1/2 transform -translate-x-1/2 z-10 bg-white text-website-text hover:text-website-heading rounded-full p-1 shadow-md border border-website-border opacity-0 group-hover:opacity-100 transition-opacity duration-200 disabled:opacity-30"
              >
                <ChevronDownIcon class="h-4 w-4" aria-hidden="true" />
              </button>
            </div>

            <TabPanels class="flex-1 min-h-0" v-slot="{ selectedIndex: currentIndex }">
              <TabPanel v-for="image in product.images" :key="image.id" class="h-full flex items-center justify-center">
                <img :src="image.src" :alt="image.alt" class="max-w-full max-h-full object-contain sm:rounded-lg" />
              </TabPanel>
            </TabPanels>
          </TabGroup>

          <!-- View Gallery Section -->
          <div class="hidden md:block mt-6 text-center">
            <button
              @click="openGallery(0)"
              class="text-xs md:text-sm inline-flex items-center gap-2 text-website-link font-medium cursor-pointer"
            >
              View gallery
              <MagnifyingGlassIcon class="w-4 h-4" aria-hidden="true" />
            </button>
          </div>

          <!-- Questions Section -->
          <div class="hidden md:block text-center">
            <div class="flex items-center justify-center text-website-text">
              <ChatBubbleLeftRightIcon class="w-5 h-5" aria-hidden="true" />
              <span class="text-xs md:text-sm text-website-text">Have questions about product?</span>
            </div>
            <button class="text-website-text text-xs underline">
              Chat with our Specialist
            </button>
          </div>

          <!-- Desktop Collapsible Details - Only shown on desktop, below image gallery -->
          <div class="hidden lg:block mt-8">
            <section aria-labelledby="details-heading">
              <h2 id="details-heading" class="sr-only">Additional details</h2>

              <div class="divide-y divide-gray-200 border-t border-gray-200">
                <Disclosure as="div" v-for="detail in product.details" :key="detail.name" v-slot="{ open }" :defaultOpen="detail.defaultOpen || false">
                  <h3>
                    <DisclosureButton class="group relative flex w-full items-center justify-between py-4 text-left">
                      <span :class="[open ? 'text-website-link' : 'text-website-heading', 'text-xs md:text-sm font-medium']">{{ detail.name }}</span>
                      <span class="ml-6 flex items-center">
                        <PlusIcon v-if="!open" class="block size-6 text-website-text group-hover:text-website-text" aria-hidden="true" />
                        <MinusIcon v-else class="block size-6 text-website-link group-hover:text-website-link" aria-hidden="true" />
                      </span>
                    </DisclosureButton>
                  </h3>
                  <DisclosurePanel as="div" class="pb-4">
                    <div class="flex flex-col space-y-1 text-xs md:text-sm/6 text-website-text">
                      <span v-for="item in detail.items" :key="item">{{ item }}</span>
                    </div>
                  </DisclosurePanel>
                </Disclosure>
              </div>
            </section>
          </div>
        </div>

        <!-- Product Info - Second on mobile, Right column on desktop -->
        <div class="order-2 lg:order-2 mt-4 sm:mt-16 px-0 lg:mt-0 lg:sticky lg:top-6 lg:self-start">
          <div class="flex flex-col gap-6 lg:gap-7">
            <!-- Product Title and Part Number (Desktop only) -->
            <div class="hidden lg:block">
              <h1 class="text-sm md:text-lg font-semibold md:font-bold tracking-tight text-website-heading">{{ product.name }}</h1>
              
              <!-- Part Number -->
              <div>
                <span class="text-xs md:text-sm text-website-text">Part #: </span>
                <span class="text-xs md:text-sm text-website-text">{{ product.partNumber }}</span>
              </div>
            </div>

            <!-- Pricing Section -->
            <div>
              <h2 class="sr-only">Product information</h2>
              <!-- Updated price display to use reusable component -->
              <ProductPrice 
                  :current-price="product.priceValue" 
                  :original-price="product.originalPrice"
                  className="items-start"
              />
            </div>

            <!-- Information Rows with Icons -->
            <div class="flex flex-col gap-2">
              <!-- Row 1: In Stock -->
              <div class="flex items-center gap-3 text-website-accent">
                <CheckCircleIcon class="h-5 w-5" aria-hidden="true" />
                <div class="text-xs md:text-sm"><span class="font-semibold">In Stock</span> — Most customers receive within 3 to 5 days</div>
              </div>
              
              <!-- Row 2: Ships Free -->
              <div class="flex items-center gap-3 text-website-link">
                <TruckIcon class="h-5 w-5" aria-hidden="true" />
                <div class="text-xs md:text-sm"><span class="font-semibold">Ships Free</span>— This items ships free with your order</div>
              </div>
              
              <!-- Row 3: Free Shipping RMA -->
              <div class="flex items-center gap-3">
                <ArrowPathIcon class="h-5 w-5 text-website-text" aria-hidden="true" />
                <span class="text-xs md:text-sm text-website-text"><span class="font-semibold">Free Shipping RMA</span> — in first 30 days</span>
              </div>
              
              <!-- Row 4: Government, Military or Edu -->
              <div class="flex items-center gap-3">
                <ShieldCheckIcon class="h-5 w-5 text-website-text" aria-hidden="true" />
                <span class="text-xs md:text-sm text-website-text"><span class="font-semibold">Gov, Military or Edu</span> — <a href="#" class="underline text-website-link">REQUEST QUOTE</a></span>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-row gap-3">
              <!-- Quantity Selector -->
              <div class="grid grid-cols-3 items-center border border-gray-300 rounded-md">
                <button 
                  @click="decrementQuantity"
                  type="button"
                  class="flex items-center justify-center min-w-10 h-10 text-website-text"
                  :class="{ 'cursor-pointer': quantity > 1, 'cursor-not-allowed': quantity <= 1 }"
                  :disabled="quantity <= 1"
                >
                  <MinusIcon class="h-4 w-4" aria-hidden="true" />
                </button>
                <span class="flex items-center justify-center min-w-12 h-10 bg-white text-website-text border-x border-gray-300">
                  {{ quantity }}
                </span>
                <button 
                  @click="incrementQuantity"
                  type="button"
                  class="flex items-center justify-center min-w-10 h-10 text-website-text cursor-pointer"
                >
                  <PlusIcon class="h-4 w-4" aria-hidden="true" />
                </button>
              </div>
              
              <!-- Add to Cart Button -->
              <button type="submit" class="flex flex-1 items-center justify-center rounded-md border border-transparent bg-website-button px-8 py-3 text-xs md:text-sm font-semibold md:font-medium text-white hover:bg-website-button">
                Add to Cart
              </button>
            </div>
          </div>
        </div>

        <!-- Mobile Collapsible Details - Third on mobile, hidden on desktop -->
        <div class="order-3 lg:hidden mt-8">
          <!-- Sticky Tab Navigation (appears when scrolling) -->
          <div 
            v-show="showStickyTabs"
            class="sticky top-[88px] z-40 bg-white border-b border-website-border shadow-sm transition-all duration-300 w-full left-0 right-0"
          >
            <div class="flex w-full items-center">
              <button 
                v-for="detail in product.details" 
                :key="detail.name"
                @click="scrollToSection(detail.name)"
                class="flex-1 px-4 py-3 text-sm font-medium text-website-text hover:text-website-heading transition-colors"
              >
                {{ detail.name }}
              </button>
              
              <!-- Scroll to Top Arrow in sticky tab bar -->
              <button 
                @click="scrollToTop"
                class="px-4 py-3 text-website-text hover:text-website-heading transition-colors"
              >
                <ChevronUpIcon class="w-5 h-5" />
              </button>
            </div>
          </div>

          <section aria-labelledby="details-heading-mobile">
            <h2 id="details-heading-mobile" class="sr-only">Additional details</h2>

            <div class="divide-y divide-gray-200 border-t border-gray-200">
              <div v-for="detail in product.details" :key="detail.name" :id="`section-${detail.name.toLowerCase()}`" :ref="el => setSectionRef(el, detail.name)">
                <div class="py-4">
                  <h3 class="text-xs md:text-sm font-medium text-website-heading">
                    {{ detail.name }}
                  </h3>
                </div>
                <div class="pb-6">
                  <div class="flex flex-col space-y-1 text-xs text-sm/6 text-website-text">
                    <span v-for="item in detail.items" :key="item">{{ item }}</span>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
          <!-- Spacer for fixed bottom bar -->
          <div class="h-20"></div>
        </div>
      </div>
    </div>

    <!-- Fixed Bottom Bar (Mobile only) -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-website-border p-4 z-50 shadow-lg">
      <div class="flex items-center justify-between gap-3">
        <div class="text-xl font-medium text-website-heading">
            ${{ (product.priceValue).toFixed(2) }}
        </div>
        <button class="bg-website-button text-white px-6 py-3 rounded-md font-semibold text-sm">
          Add to Cart
        </button>
      </div>
    </div>

    <!-- Gallery Modal -->
    <GalleryModal 
      :open="galleryModalOpen"
      :images="product.images"
      :initial-index="galleryInitialIndex"
      @close="closeGallery"
    />
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import {
  Disclosure,
  DisclosureButton,
  DisclosurePanel,
  Tab,
  TabGroup,
  TabList,
  TabPanel,
  TabPanels,
} from '@headlessui/vue'
import { MinusIcon, PlusIcon, ChevronDownIcon, CheckCircleIcon, TruckIcon, ShieldCheckIcon, ArrowPathIcon, ChevronUpIcon } from '@heroicons/vue/20/solid'
import { MagnifyingGlassIcon, ChatBubbleLeftRightIcon } from '@heroicons/vue/24/outline'
import ProductPrice from './ProductPrice.vue'
import GalleryModal from '../modals/gallery-modal.vue'

// Add the quantity reactive variable with minimum value of 1
const quantity = ref(1);

// Gallery modal state
const galleryModalOpen = ref(false)
const galleryInitialIndex = ref(0)

// Mobile-specific state
const currentImageIndex = ref(0)
const showStickyTabs = ref(false) // Hidden by default
const activeSection = ref('')
const sectionRefs = ref({})

// Add this ref and function
const thumbnailContainer = ref(null)

// Function to increment quantity
function incrementQuantity() {
  quantity.value++
}

// Function to decrement quantity
function decrementQuantity() {
  if (quantity.value > 1) {
    quantity.value--
  }
}

// Function to open gallery
function openGallery(index = 0) {
  galleryInitialIndex.value = index
  galleryModalOpen.value = true
}

// Function to close gallery
function closeGallery() {
  galleryModalOpen.value = false
}

const currentSlide = ref(0)
const maxSlides = computed(() => Math.max(0, product.images.length - 4))

function slideThumbnails(direction) {
  if (direction === 'up' && currentSlide.value > 0) {
    currentSlide.value--
  } else if (direction === 'down' && currentSlide.value < maxSlides.value) {
    currentSlide.value++
  }
}

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
      if (currentImageIndex.value < product.images.length - 1) {
        currentImageIndex.value++
      }
    } else {
      // Swipe right - previous image
      if (currentImageIndex.value > 0) {
        currentImageIndex.value--
      }
    }
  }
}

// Section refs management
function setSectionRef(el, sectionName) {
  if (el) {
    sectionRefs.value[sectionName] = el
  }
}

// Scroll detection for sticky tabs
function handleScroll() {
  const scrollY = window.scrollY
  const viewportHeight = window.innerHeight
  
  // Show sticky tabs when scrolled 100% of viewport height
  const threshold = viewportHeight * 0.7 // 100% of viewport height
  console.log(threshold);
  
  // Show when scrolled past 15%, hide when scrolled back above 15%
  showStickyTabs.value = scrollY > threshold
  
  // Update active section based on scroll position
  const sections = product.details.map(detail => ({
    name: detail.name,
    element: sectionRefs.value[detail.name]
  }))
  
  for (const section of sections) {
    if (section.element) {
      const rect = section.element.getBoundingClientRect()
      if (rect.top <= 100 && rect.bottom >= 100) {
        activeSection.value = section.name
        break
      }
    }
  }
}

function scrollToSection(sectionName) {
  const element = sectionRefs.value[sectionName]
  if (element) {
    // Calculate sticky tab bar height (approximately 50px) + header height (88px)
    const stickyBarHeight = 50
    const headerHeight = 88
    
    // Get element position and scroll to show section heading completely
    const elementTop = element.offsetTop
    const scrollPosition = elementTop - stickyBarHeight - headerHeight - 10 // 10px extra padding
    
    window.scrollTo({ 
      top: scrollPosition, 
      behavior: 'smooth' 
    })
  }
}

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

// Lifecycle hooks
onMounted(() => {
  // Add scroll listener for sticky tabs
  window.addEventListener('scroll', handleScroll, { passive: true })
  
  // Ensure sticky tabs are hidden on initial load
  showStickyTabs.value = false
})

onUnmounted(() => {
  // Remove event listeners
  window.removeEventListener('scroll', handleScroll)
})

const product = {
  name: 'Lenovo 4X41M69794 Lenovo ThinkPad Professional 16-inch Gen 2 backpack Casual backpack Black Plastic',
  price: '$140',
  priceValue: 140, 
  originalPrice: 180, 
  partNumber: '4X41M69794', 
  sku: 'PH-TAK-001', 
  rating: 4,
  images: [
    {
      id: 1,
      name: 'Angled view',
      src: 'https://content.thebagitude.com/products_images/R5jjkfoF0Ual4Vh-vl_m_A.c-r.jpg',
      alt: 'Angled front view with bag zipped and handles upright.',
    },
    {
      id: 2,
      name: 'Front view',
      src: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-03-product-02.jpg',
      alt: 'Front view with bag zipped and handles upright.',
    },
    {
      id: 3,
      name: 'Back view',
      src: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-03-product-04.jpg',
      alt: 'Back view with bag zipped and straps hanging down.',
    },
    {
      id: 4,
      name: 'Back angle open view',
      src: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-03-product-04.jpg',
      alt: 'Back angled view with bag open and handles to the side.',
    },
    {
      id: 5,
      name: 'Back angle open view',
      src: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/product-page-03-product-04.jpg',
      alt: 'Back angled view with bag open and handles to the side.',
    },
  ],
  colors: [
    { id: 'washed-black', name: 'Washed Black', classes: 'bg-website-text checked:outline-website-border' },
    { id: 'white', name: 'White', classes: 'bg-white checked:outline-website-border' },
    { id: 'washed-gray', name: 'Washed Gray', classes: 'bg-website-text checked:outline-website-border' },
  ],
  details: [
    {
      name: 'Description',
      items: [
        'ThinkPad 15.6" Basic Backpack offers protection and valueFeatures: Padded PC compartment with plenty of internal storage for other work essentials Convenient front pocket for easy storage Durable ThinkPad-branded design Compatible with all ThinkPad notebook computers up to 15.6" wide Lightweight construction with shoulder straps and comfort handle Limited lifetime warranty.',
      ],
      defaultOpen: true
    },
    {
      name: 'Specification',
      items: [
        'Multiple strap configurations',
        'Spacious interior with top zip',
        'Leather handle and tabs',
        'Interior dividers',
        'Stainless strap loops',
        'Double stitched construction',
        'Water-resistant',
      ],
    },
  ],
}
</script>

<style scoped>
/* Custom styles for mobile */
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Smooth transitions for sticky tabs */
.sticky {
  transition: all 0.3s ease-in-out;
}

/* Prevent text selection during swipe */
.h-[50vh] {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Ensure sticky tabs take full width */
.sticky.top-\[88px\] {
  margin-left: calc(-50vw + 50%);
  margin-right: calc(-50vw + 50%);
  width: 100vw;
}

/* Hide any caret icons on mobile */
.lg\:hidden .caret-icon,
.lg\:hidden [class*="chevron"],
.lg\:hidden [class*="arrow"] {
  display: none !important;
}
.sticky.top-\[88px\] {
  position: fixed;
  top: 64px; 
  left: 0;
  right: 0;
  z-index: 40;
  border-top: none; 
}
</style>