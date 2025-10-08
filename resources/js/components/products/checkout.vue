<template>
    <div class="bg-gray-50">
      <div class="mx-auto max-w-8xl px-4 pt-8 md:pt-16 pb-24 sm:px-6 lg:max-w-8xl lg:px-8">
        <form class="lg:grid lg:grid-cols-[2fr_1fr] lg:gap-x-12 xl:gap-x-16">
          <div>
            <div>
              <h1 class="text-3xl font-bold tracking-tight text-website-heading sm:text-4xl">Secure Checkout</h1>
            </div>
  
            <div class="mt-4 border-t border-gray-200 pt-6">
              <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-4">
                <div>
                  <label for="email-address" class="block text-sm/6 font-medium text-gray-700">Email address</label>
                  <div class="mt-2">
                    <input type="email" id="email-address" name="email-address" autocomplete="email" class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                  </div>
                </div>
                <div>
                  <label for="first-name" class="block text-sm/6 font-medium text-gray-700">First name</label>
                  <div class="mt-2">
                    <input type="text" id="first-name" name="first-name" autocomplete="given-name" class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                  </div>
                </div>
                <div>
                  <label for="last-name" class="block text-sm/6 font-medium text-gray-700">Last name</label>
                  <div class="mt-2">
                    <input type="text" id="last-name" name="last-name" autocomplete="family-name" class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                  </div>
                </div>
  
                <div>
                  <label for="phone" class="block text-sm/6 font-medium text-gray-700">Phone</label>
                  <div class="mt-2">
                    <input type="text" name="phone" id="phone" autocomplete="tel" class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                  </div>
                </div>

                <div class="sm:col-span-2">
                  <label for="address" class="block text-sm/6 font-medium text-gray-700">Address *</label>
                  <div class="mt-2">
                    <input 
                      type="text" 
                      name="address" 
                      id="address" 
                      ref="addressField"
                      autocomplete="street-address" 
                      placeholder="Enter a location"
                      class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                    />
                  </div>
                </div>

                <div>
                  <label for="apartment" class="block text-sm/6 font-medium text-gray-700">Apartment, unit, suite, or floor #</label>
                  <div class="mt-2">
                    <input 
                      type="text" 
                      name="apartment" 
                      id="apartment" 
                      ref="address2Field"
                      class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                    />
                  </div>
                </div>

                <div>
                  <label for="city" class="block text-sm/6 font-medium text-gray-700">City *</label>
                  <div class="mt-2">
                    <input 
                      type="text" 
                      name="city" 
                      id="city" 
                      ref="localityField"
                      autocomplete="address-level2" 
                      class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                    />
                  </div>
                </div>

                <div>
                  <label for="region" class="block text-sm/6 font-medium text-gray-700">State/Province *</label>
                  <div class="mt-2">
                    <input 
                      type="text" 
                      name="region" 
                      id="region" 
                      ref="stateField"
                      autocomplete="address-level1" 
                      class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                    />
                  </div>
                </div>

                <div>
                  <label for="postal-code" class="block text-sm/6 font-medium text-gray-700">Postal code *</label>
                  <div class="mt-2">
                    <input 
                      type="text" 
                      name="postal-code" 
                      id="postal-code" 
                      ref="postalField"
                      autocomplete="postal-code" 
                      class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                    />
                  </div>
                </div>

                <div>
                  <label for="country" class="block text-sm/6 font-medium text-gray-700">Country/Region *</label>
                  <div class="mt-2 grid grid-cols-1">
                    <select 
                      id="country" 
                      name="country" 
                      ref="countryField"
                      autocomplete="country-name" 
                      class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-2 pr-8 pl-3 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                    >
                      <option value="">Select a country</option>
                      <option value="US">United States</option>
                      <option value="CA">Canada</option>
                      <option value="MX">Mexico</option>
                    </select>
                    <ChevronDownIcon class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-website-text sm:size-4" aria-hidden="true" />
                  </div>
                </div>
              </div>
            </div>
  
            <div class="mt-10 border-t border-gray-200 pt-10">
              <fieldset>
                <legend class="text-lg font-medium text-website-heading">Delivery method</legend>
                <div class="mt-4 grid grid-cols-2 gap-y-2 sm:gap-y-6 sm:grid-cols-3 lg:grid-cols-6 gap-x-2">
                  <label v-for="deliveryMethod in deliveryMethods" :key="deliveryMethod.id" :aria-label="deliveryMethod.title" :aria-description="`${deliveryMethod.turnaround} for ${deliveryMethod.price}`" class="group relative flex rounded-lg border border-gray-300 bg-white py-4 px-2 has-checked:outline-2 has-checked:-outline-offset-2 has-checked:outline-indigo-600 has-focus-visible:outline-3 has-focus-visible:-outline-offset-1 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25">
                    <input type="radio" name="delivery-method" :value="deliveryMethod.id" :checked="deliveryMethod === deliveryMethods[0]" class="absolute inset-0 appearance-none focus:outline-none curser-pointer" />
                    <div class="flex flex-col justify-between">
                      <div class="grid grid-col-1 gap-2">
                        <span class="block text-sm font-medium text-website-heading">{{ deliveryMethod.title }}</span>
                        <span class="mt-1 block text-sm text-website-text">{{ deliveryMethod.turnaround }}</span>
                      </div>
                      <span class="mt-6 block text-sm font-medium text-website-heading">{{ deliveryMethod.price }}</span>
                    </div>
                    <CheckCircleIcon class="invisible size-5 text-indigo-600 group-has-checked:visible" aria-hidden="true" />
                  </label>
                </div>
              </fieldset>
            </div>

            <!-- Payment -->
            <div class="mt-10 border-t border-gray-200 pt-10">
              <fieldset>
                <legend class="text-lg font-medium text-website-heading">Payment method</legend>
                <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 lg:grid-cols-3 sm:gap-x-4">
                  <label v-for="paymentMethod in paymentMethods" :key="paymentMethod.id" :aria-label="paymentMethod.title" class="group relative flex rounded-lg border border-gray-300 bg-white py-4 px-2 has-checked:outline-2 has-checked:-outline-offset-2 has-checked:outline-indigo-600 has-focus-visible:outline-3 has-focus-visible:-outline-offset-1 has-disabled:border-gray-400 has-disabled:bg-gray-200 has-disabled:opacity-25">
                    <input type="radio" name="payment-type" :value="paymentMethod.id" :checked="paymentMethod === paymentMethods[0]" class="absolute inset-0 appearance-none focus:outline-none" />
                    <div class="flex-1">
                      <div class="flex items-center gap-3">
                        <component :is="paymentMethod.icon" class="size-6 text-gray-600" aria-hidden="true" />
                        <span class="block text-sm font-medium text-website-heading">{{ paymentMethod.title }}</span>
                      </div>
                      <span v-if="paymentMethod.description" class="mt-1 block text-sm text-website-text">{{ paymentMethod.description }}</span>
                    </div>
                    <CheckCircleIcon class="invisible size-5 text-indigo-600 group-has-checked:visible" aria-hidden="true" />
                  </label>
                </div>
              </fieldset>

              <div class="mt-6 grid grid-cols-4 gap-x-4 gap-y-6">
                <div class="col-span-4">
                  <label for="card-number" class="block text-sm/6 font-medium text-gray-700">Card number</label>
                  <div class="mt-2">
                    <input type="text" id="card-number" name="card-number" autocomplete="cc-number" class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                  </div>
                </div>
  
                <div class="col-span-4">
                  <label for="name-on-card" class="block text-sm/6 font-medium text-gray-700">Name on card</label>
                  <div class="mt-2">
                    <input type="text" id="name-on-card" name="name-on-card" autocomplete="cc-name" class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                  </div>
                </div>
  
                <div class="col-span-3">
                  <label for="expiration-date" class="block text-sm/6 font-medium text-gray-700">Expiration date (MM/YY)</label>
                  <div class="mt-2">
                    <input type="text" name="expiration-date" id="expiration-date" autocomplete="cc-exp" class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                  </div>
                </div>
  
                <div>
                  <label for="cvc" class="block text-sm/6 font-medium text-gray-700">CVC</label>
                  <div class="mt-2">
                    <input type="text" name="cvc" id="cvc" autocomplete="csc" class="block w-full rounded-md bg-white px-3 py-2 text-base text-website-heading outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                  </div>
                </div>
              </div>
            </div>
          </div>
  
          <!-- Order summary -->
          <div class="mt-10 lg:mt-0">
            <h2 class="text-lg font-medium text-website-heading">Order summary</h2>
  
            <div class="mt-4 rounded-lg border border-website-border bg-white shadow-xs">
              <h3 class="sr-only">Items in your cart</h3>
              <ul role="list" class="divide-y divide-website-border">
                <li v-for="(product, productIdx) in products" :key="product.id" class="py-6 px-4">
                  <div class="grid grid-cols-[2fr_3fr] gap-4">
                    <!-- Product Image -->
                    <img :src="product.imageSrc" :alt="product.imageAlt" class="rounded-md w-full h-auto" />

                    <!-- Product Info & Actions Container -->
                    <div class="grid min-w-0 grid-cols-1 gap-4">
                      <!-- Product Info -->
                      <div class="flex-1 min-w-0">
                        <h3 class="text-sm font-medium text-website-heading mb-2">
                          <a :href="product.href">{{ product.name }}</a>
                        </h3>
                        
                        <!-- Part Number -->
                        <p class="text-xs text-website-text">
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
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <dl class="space-y-6 border-t border-gray-200 px-4 py-6 sm:px-6">
                <div class="flex items-center justify-between">
                  <dt class="text-sm">Subtotal</dt>
                  <dd class="text-sm font-medium text-website-heading">$64.00</dd>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                  <dt class="text-base font-medium">Total</dt>
                  <dd class="text-base font-medium text-website-heading">$75.52</dd>
                </div>
              </dl>
  
              <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                <button type="submit" class="w-full rounded-md border border-transparent bg-website-button px-4 py-3 text-base font-medium text-white shadow-xs hover:bg-website-button focus:ring-2 focus:ring-website-button focus:ring-offset-2 focus:ring-offset-website-bg-light focus:outline-hidden">Confirm order</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ChevronDownIcon } from '@heroicons/vue/16/solid'
import { CheckCircleIcon, CreditCardIcon, BanknotesIcon } from '@heroicons/vue/24/outline'
import ProductPrice from './ProductPrice.vue'
import { ref, onMounted } from 'vue'

// Refs for form fields
const addressField = ref(null)
const address2Field = ref(null)
const localityField = ref(null)
const stateField = ref(null)
const postalField = ref(null)
const countryField = ref(null)

let autocomplete = null

// Initialize Google Places Autocomplete
const initAutocomplete = () => {
  try {
    if (typeof google === 'undefined' || !google.maps || !google.maps.places) {
      console.warn('Google Maps API not loaded')
      return
    }

    if (!addressField.value) {
      console.warn('Address field not found')
      return
    }

    console.log('Initializing autocomplete...')
    autocomplete = new google.maps.places.Autocomplete(addressField.value, {
      componentRestrictions: { country: ["ca"] },
      fields: ["address_components", "geometry"],
      types: ["address"],
      strictBounds: true
    })

    autocomplete.addListener("place_changed", fillInAddress)
    console.log('Autocomplete initialized successfully')
  } catch (error) {
    console.error('Error initializing autocomplete:', error)
  }
}

// Fill in address fields when place is selected
const fillInAddress = () => {
  const place = autocomplete.getPlace()
  
  // Additional check to ensure only Canadian addresses are processed
  let isCanadianAddress = false
  
  for (const component of place.address_components) {
    if (component.types.includes('country') && component.short_name === 'CA') {
      isCanadianAddress = true
      break
    }
  }
  
  if (!isCanadianAddress) {
    console.warn('Non-Canadian address selected, ignoring')
    return
  }
  
  let address1 = ""
  let postcode = ""

  for (const component of place.address_components) {
    const componentType = component.types[0]

    switch (componentType) {
      case "street_number": {
        address1 = `${component.long_name} ${address1}`
        break
      }
      case "route": {
        address1 += component.short_name
        break
      }
      case "postal_code": {
        postcode = `${component.long_name}${postcode}`
        break
      }
      case "postal_code_suffix": {
        postcode = `${postcode}-${component.long_name}`
        break
      }
      case "locality": {
        localityField.value.value = component.long_name
        break
      }
      case "administrative_area_level_1": {
        stateField.value.value = component.short_name
        break
      }
      case "country": {
        countryField.value.value = component.short_name
        break
      }
    }
  }

  addressField.value.value = address1
  postalField.value.value = postcode
  address2Field.value.focus()
}

// Load Google Maps API
const loadGoogleMapsAPI = () => {
  if (window.google && window.google.maps) {
    console.log('Google Maps already loaded')
    initAutocomplete()
    return
  }

  console.log('Loading Google Maps API...')
  const script = document.createElement('script')
  script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyCIZyXMxDy5gU9NqgVyGEkCxYm2RzC4CyA&libraries=places`
  script.async = true
  script.defer = true
  
  script.onload = () => {
    console.log('Google Maps API loaded successfully')
    initAutocomplete()
  }
  
  script.onerror = (error) => {
    console.error('Failed to load Google Maps API:', error)
  }
  
  document.head.appendChild(script)
}

onMounted(() => {
  loadGoogleMapsAPI()
})
  
  const products = [
    {
      id: 1,
      name: 'Philips TAK4206BL/00 Philips TAK4206BL/00 headphones/headset Wired & Wireless Head-band Calls/Music USB Type-C Bluetooth Blue',
      href: '#',
      price: '$140',
      priceValue: 140,
      originalPrice: 180,
      partNumber: 'TAK4206BL',
      quantity: "1", // Added quantity property
      imageSrc: 'https://content.thebagitude.com/products_images/j2FTwyDISkyuyYgLFW7VCg.c-r.jpg',
      imageAlt: "Front of Philips headphones in blue.",
    },
    {
      id: 2,
      name: 'Lenovo 4X41M69794 Lenovo ThinkPad Professional 16-inch Gen 2 backpack Casual backpack Black Plastic',
      href: '#',
      price: '$32.00',
      priceValue: 32,
      originalPrice: 40,
      partNumber: '4X41M69794',
      quantity: "1", // Added quantity property
      imageSrc: 'https://content.thebagitude.com/products_images/R5jjkfoF0Ual4Vh-vl_m_A.c-r.jpg',
      imageAlt: 'ThinkPad 15.6" Basic Backpack offers protection and valueFeatures: Padded PC compartment with plenty of internal storage for other work essentials Convenient front pocket for easy storage Durable ThinkPad-branded design Compatible with all ThinkPad notebook computers up to 15.6" wide Lightweight construction with shoulder straps and comfort handle Limited lifetime warranty.',
    },
  ]
  const deliveryMethods = [
    { id: 1, title: 'Overnight', turnaround: 'Next business day', price: '$25.00' },
    { id: 2, title: 'Second Day', turnaround: '2 business days', price: '$18.00' },
    { id: 3, title: 'Express', turnaround: '3-5 business days', price: '$12.00' },
    { id: 4, title: 'Standard', turnaround: '4-10 business days', price: '$5.00' },
    { id: 5, title: 'Economy', turnaround: '7-14 business days', price: '$3.00' },
    { id: 6, title: 'Earliest Available', turnaround: '1-3 business days', price: '$15.00' },
  ]
  const paymentMethods = [
    { 
      id: 'credit-card', 
      title: 'Credit Card', 
      description: 'Visa, Mastercard, Amex',
      icon: CreditCardIcon
    },
    { 
      id: 'paypal', 
      title: 'PayPal', 
      description: 'Fast and secure payment',
      icon: BanknotesIcon
    },
    { 
      id: 'etransfer', 
      title: 'eTransfer', 
      description: 'Direct bank transfer',
      icon: BanknotesIcon
    },
  ]
  </script>