<template>
  <div class="bg-white">
    <div class="mx-auto max-w-8xl px-4 pt-8 md:pt-16 pb-24 sm:px-6 lg:max-w-8xl lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-website-heading sm:text-4xl">Shopping Cart</h1>
      <form class="mt-6 md:mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
        <section aria-labelledby="cart-heading" class="lg:col-span-8">
          <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>

          <ul role="list" class="divide-y divide-website-border border-t border-b border-website-border">
            <li v-for="(product, productIdx) in products" :key="product.id" class="py-6 sm:py-10">
              <div class="grid grid-cols-[2fr_3fr] md:grid-cols-[1fr_4fr] gap-4">
                <!-- Product Image -->
                <div class="shrink-0">
                  <img :src="product.imageSrc" :alt="product.imageAlt" class="rounded-md object-contain w-full h-auto" />
                </div>

                <!-- Product Info & Actions Container -->
                <div class="grid min-w-0 grid-cols-1  md:grid-cols-[3fr_1fr] gap-4">
                  <!-- Product Info -->
                  <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-medium text-website-heading mb-2">
                      <a :href="product.href">{{ product.name }}</a>
                    </h3>
                    
                    <!-- Part Number -->
                    <p class="text-xs sm:text-sm text-website-text">
                      <span>Part# </span>{{ product.partNumber }}
                    </p>
                  </div>

                  <!-- Actions -->
                  <div class="flex flex-col gap-4">
                    <!-- Price Info -->
                    <ProductPrice 
                        :current-price="product.priceValue" 
                        :original-price="product.originalPrice"
                    />

                    <!-- Quantity Selector (like PDP page) -->
                    <div class="flex items-center gap-3 justify-end">
                      <div class="grid grid-cols-3 items-center border border-gray-300 rounded-md">
                        <button 
                          @click="decrementQuantity(product)"
                          type="button"
                          class="flex items-center justify-center w-7 h-7 text-website-text"
                          :class="{ 'cursor-pointer': product.quantity > 1, 'cursor-not-allowed': product.quantity <= 1 }"
                          :disabled="product.quantity <= 1"
                        >
                          <MinusIcon class="h-4 w-4" aria-hidden="true" />
                        </button>
                                                  <input 
                            type="number"
                            v-model="product.quantity"
                            min="1"
                            class="flex items-center justify-center w-7 h-7 bg-white text-website-text border-x border-gray-300 text-center text-sm focus:outline-none focus:ring-2 focus:ring-website-link [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                          />
                        <button 
                          @click="incrementQuantity(product)"
                          type="button"
                          class="flex items-center justify-center w-7 h-7 text-website-text cursor-pointer"
                        >
                          <PlusIcon class="h-4 w-4" aria-hidden="true" />
                        </button>
                      </div>

                      <!-- Delete Button with Bin Icon -->
                      <button 
                        type="button" 
                        @click="removeProduct(product.id)"
                        class="flex items-center justify-center p-0 text-website-text hover:text-red-600 transition-colors cursor-pointer"
                        title="Remove item"
                      >
                        <TrashIcon class="h-6 w-6" aria-hidden="true" />
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </section>

        <!-- Order summary -->
        <section aria-labelledby="summary-heading" class="mt-16 rounded-lg bg-website-bg-light px-4 py-6 sm:p-6 lg:col-span-4 lg:mt-0 lg:p-8">
          <h2 id="summary-heading" class="text-lg font-medium text-website-heading">Order summary</h2>

          <dl class="mt-6 space-y-4">
            <div class="flex items-center justify-between">
              <dt class="text-sm text-website-text">Subtotal</dt>
              <dd class="text-sm font-medium text-website-heading">{{ calculateSubtotal() }}</dd>
            </div>
            <div class="flex items-center justify-between border-t border-website-border pt-4">
              <dt class="text-base font-medium text-website-heading">Order total</dt>
              <dd class="text-base font-medium text-website-heading">{{ calculateTotal() }}</dd>
            </div>
          </dl>

          <div class="mt-6">
            <button type="submit" class="w-full rounded-md border border-transparent bg-website-button px-4 py-3 text-base font-medium text-white shadow-xs hover:bg-website-button focus:outline-none focus:bg-website-button active:bg-website-button">Checkout</button>
          </div>
        </section>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { MinusIcon, PlusIcon, TrashIcon } from '@heroicons/vue/24/outline'
import ProductPrice from './ProductPrice.vue'

const products = ref([
{
  id: 1,
  name: 'Philips TAK4206BL/00 Philips TAK4206BL/00 headphones/headset Wired & Wireless Head-band Calls/Music USB Type-C Bluetooth Blue',
  href: '#',
  price: '$140',
  priceValue: 140,
  originalPrice: 180,
  partNumber: 'TAK4206BL',
  quantity: 1, // Changed to number
  imageSrc: 'https://content.thebagitude.com/products_images/j2FTwyDISkyuyYgLFW7VCg.c-r.jpg',
  imageAlt: "Front of Philips headphones in blue.",
},
{
  id: 2,
  name: 'Lenovo 4X41M69794 Lenovo ThinkPad Professional 16-inch Gen 2 backpack Casual backpack Black Plastic',
  href: '#',
  price: '$32',
  priceValue: 32,
  originalPrice: 40,
  partNumber: '4X41M69794',
  quantity: 1, // Changed to number
  size: 'Large',
  imageSrc: 'https://content.thebagitude.com/products_images/R5jjkfoF0Ual4Vh-vl_m_A.c-r.jpg',
  imageAlt: 'ThinkPad 15.6" Basic Backpack offers protection and valueFeatures: Padded PC compartment with plenty of internal storage for other work essentials Convenient front pocket for easy storage Durable ThinkPad-branded design Compatible with all ThinkPad notebook computers up to 15.6" wide Lightweight construction with shoulder straps and comfort handle Limited lifetime warranty.',
},
{
  id: 3,
  name: 'Philips TAK4206BL/00 Philips TAK4206BL/00 headphones/headset Wired & Wireless Head-band Calls/Music USB Type-C Bluetooth Blue',
  href: '#',
  price: '$35',
  priceValue: 35,
  originalPrice: 45,
  partNumber: 'NT-003',
  quantity: 1, // Changed to number
  imageSrc: 'https://content.thebagitude.com/products_images/j2FTwyDISkyuyYgLFW7VCg.c-r.jpg',
  imageAlt: 'Insulated bottle with white base and black snap lid.',
},
])

// Quantity functions
function incrementQuantity(product) {
product.quantity++
}

function decrementQuantity(product) {
if (product.quantity > 1) {
  product.quantity--
}
}

const removeProduct = (productId) => {
const index = products.value.findIndex(product => product.id === productId)
if (index > -1) {
  products.value.splice(index, 1)
}
}

const calculateSubtotal = () => {
const subtotal = products.value.reduce((total, product) => {
  return total + (product.priceValue * product.quantity)
}, 0)
return `$${subtotal.toFixed(2)}`
}

const calculateTotal = () => {
const subtotal = products.value.reduce((total, product) => {
  return total + (product.priceValue * product.quantity)
}, 0)
// Add taxes, shipping, etc. here if needed
const total = subtotal + 13.32 // Example additional charges
return `$${total.toFixed(2)}`
}
</script>