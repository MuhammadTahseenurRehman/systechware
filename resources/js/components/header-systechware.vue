<template>
  <header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-1">
        <a href="/" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <logo-component logo-type="light"></logo-component>
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = true">
          <span class="sr-only">Open main menu</span>
          <Bars3Icon class="size-6" aria-hidden="true" />
        </button>
      </div>
      <PopoverGroup class="hidden lg:flex lg:gap-x-12">
        <Popover class="relative">
          <PopoverButton class="flex items-center gap-x-1 text-sm/6 font-semibold text-website-primary">
            Categories
            <ChevronDownIcon class="size-5 flex-none text-gray-400" aria-hidden="true" />
          </PopoverButton>

          <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
            <PopoverPanel class="absolute left-1/2 z-10 mt-3 w-screen max-w-4xl -translate-x-1/2 overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-website-heading/5">
              <div class="p-8">
                <div class="grid grid-cols-4 gap-8">
                  <!-- Desktop & Workstations -->
                  <div>
                    <h3 class="text-sm font-semibold text-website-heading mb-4">Desktop & Workstations</h3>
                    <ul class="space-y-2">
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Embedded Computers</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Servers</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Server Barebones</a></li>
                    </ul>
                    <a href="#" class="text-sm text-website-primary hover:text-blue-800 font-medium mt-3 inline-block">View More</a>
                  </div>

                  <!-- Monitors & Displays -->
                  <div>
                    <h3 class="text-sm font-semibold text-website-heading mb-4">Monitors & Displays</h3>
                    <ul class="space-y-2">
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Monitors</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Monitors Accessories</a></li>
                    </ul>
                    <a href="#" class="text-sm text-website-primary hover:text-blue-800 font-medium mt-3 inline-block">View More</a>
                  </div>

                  <!-- Power -->
                  <div>
                    <h3 class="text-sm font-semibold text-website-heading mb-4">Power</h3>
                    <ul class="space-y-2">
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Battery Chargers</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">UPS Accessories</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Mobile Wireless Charging Receivers</a></li>
                    </ul>
                    <a href="#" class="text-sm text-website-primary hover:text-blue-800 font-medium mt-3 inline-block">View More</a>
                  </div>

                  <!-- Networking -->
                  <div>
                    <h3 class="text-sm font-semibold text-website-heading mb-4">Networking</h3>
                    <ul class="space-y-2">
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Cellular Network Equipment</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Network Security Equipment</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Networking Hardware</a></li>
                    </ul>
                    <a href="#" class="text-sm text-website-primary hover:text-blue-800 font-medium mt-3 inline-block">View More</a>
                  </div>
                </div>

                <!-- Second Row -->
                <div class="grid grid-cols-4 gap-8 mt-8">
                  <!-- Printers & Scanners -->
                  <div>
                    <h3 class="text-sm font-semibold text-website-heading mb-4">Printers & Scanners</h3>
                    <ul class="space-y-2">
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Print & Scan Accessories</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Printing Equipment</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Printing Media</a></li>
                    </ul>
                    <a href="#" class="text-sm text-website-primary hover:text-blue-800 font-medium mt-3 inline-block">View More</a>
                  </div>

                  <!-- Cables -->
                  <div>
                    <h3 class="text-sm font-semibold text-website-heading mb-4">Cables</h3>
                    <ul class="space-y-2">
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">AV Modular Cables</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Audio Cables</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Coaxial Cables</a></li>
                    </ul>
                    <a href="#" class="text-sm text-website-primary hover:text-blue-800 font-medium mt-3 inline-block">View More</a>
                  </div>

                  <!-- Accessories -->
                  <div>
                    <h3 class="text-sm font-semibold text-website-heading mb-4">Accessories</h3>
                    <ul class="space-y-2">
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Coaxial Connectors</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Cable Entry Systems</a></li>
                    </ul>
                    <a href="#" class="text-sm text-website-primary hover:text-blue-800 font-medium mt-3 inline-block">View More</a>
                  </div>

                  <!-- Storage -->
                  <div>
                    <h3 class="text-sm font-semibold text-website-heading mb-4">Storage</h3>
                    <ul class="space-y-2">
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Data Storage Devices</a></li>
                      <li><a href="#" class="text-sm text-gray-600 hover:text-website-heading">Data Storage Mediums</a></li>
                    </ul>
                    <a href="#" class="text-sm text-website-primary hover:text-blue-800 font-medium mt-3 inline-block">View More</a>
                  </div>
                </div>

                <!-- All Categories Button -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                  <div class="flex justify-center">
                    <a href="/listing" class="inline-flex items-center px-6 py-2 border border-website-primary text-website-primary text-sm font-medium rounded-full hover:bg-blue-50 transition-colors">
                      All Categories
                    </a>
                  </div>
                </div>
              </div>
            </PopoverPanel>
          </transition>
        </Popover>

        <a href="/listing" class="text-sm/6 font-semibold text-website-primary">Features</a>
        <a href="#" class="text-sm/6 font-semibold text-website-primary">Marketplace</a>

        <Popover class="relative">
          <PopoverButton class="flex items-center gap-x-1 text-sm/6 font-semibold text-website-primary">
            Company
            <ChevronDownIcon class="size-5 flex-none text-gray-400" aria-hidden="true" />
          </PopoverButton>

          <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1" enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150" leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
            <PopoverPanel class="absolute left-1/2 z-10 mt-3 w-56 -translate-x-1/2 rounded-xl bg-white p-2 shadow-lg ring-1 ring-website-heading/5">
              <a v-for="item in company" :key="item.name" :href="item.href" class="block rounded-lg px-3 py-2 text-sm/6 font-semibold text-website-heading hover:bg-gray-50">{{ item.name }}</a>
            </PopoverPanel>
          </transition>
        </Popover>
      </PopoverGroup>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="#" class="text-sm/6 font-semibold text-website-heading">Log in <span aria-hidden="true">&rarr;</span></a>
      </div>
    </nav>
    <Dialog class="lg:hidden" @close="mobileMenuOpen = false" :open="mobileMenuOpen">
      <div class="fixed inset-0 z-50" />
      <DialogPanel class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white p-6 sm:max-w-sm sm:ring-1 sm:ring-website-heading/10">
        <div class="flex items-center justify-between">
          <a href="/" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <logo-component logo-type="dark"></logo-component>
          </a>
          <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" @click="mobileMenuOpen = false">
            <span class="sr-only">Close menu</span>
            <XMarkIcon class="size-6" aria-hidden="true" />
          </button>
        </div>
        <div class="mt-6 flow-root">
          <div class="-my-6 divide-y divide-website-text/10">
            <div class="space-y-2 py-6">
              <!-- Main Categories Dropdown -->
              <Disclosure as="div" class="-mx-3" v-slot="{ open }">
                <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base/7 font-semibold text-website-heading hover:bg-gray-50">
                  Categories
                  <ChevronDownIcon :class="[open ? 'rotate-180' : '', 'size-5 flex-none']" aria-hidden="true" />
                </DisclosureButton>
                <DisclosurePanel class="mt-2 space-y-2">
                  
                  <!-- Desktop & Workstations -->
                  <Disclosure as="div" class="ml-3" v-slot="{ open: subOpen }">
                    <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-sm/6 font-medium text-gray-700 hover:bg-gray-50 hover:text-website-heading">
                      Desktop & Workstations
                      <ChevronDownIcon :class="[subOpen ? 'rotate-180' : '', 'size-4 flex-none']" aria-hidden="true" />
                    </DisclosureButton>
                    <DisclosurePanel class="mt-1 space-y-1">
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Embedded Computers</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Servers</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Server Barebones</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-website-primary hover:bg-gray-50 font-medium">View More</a>
                    </DisclosurePanel>
                  </Disclosure>

                  <!-- Monitors & Displays -->
                  <Disclosure as="div" class="ml-3" v-slot="{ open: subOpen }">
                    <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-sm/6 font-medium text-gray-700 hover:bg-gray-50 hover:text-website-heading">
                      Monitors & Displays
                      <ChevronDownIcon :class="[subOpen ? 'rotate-180' : '', 'size-4 flex-none']" aria-hidden="true" />
                    </DisclosureButton>
                    <DisclosurePanel class="mt-1 space-y-1">
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Monitors</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Monitors Accessories</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-website-primary hover:bg-gray-50 font-medium">View More</a>
                    </DisclosurePanel>
                  </Disclosure>

                  <!-- Power -->
                  <Disclosure as="div" class="ml-3" v-slot="{ open: subOpen }">
                    <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-sm/6 font-medium text-gray-700 hover:bg-gray-50 hover:text-website-heading">
                      Power
                      <ChevronDownIcon :class="[subOpen ? 'rotate-180' : '', 'size-4 flex-none']" aria-hidden="true" />
                    </DisclosureButton>
                    <DisclosurePanel class="mt-1 space-y-1">
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Battery Chargers</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">UPS Accessories</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Mobile Wireless Charging Receivers</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-website-primary hover:bg-gray-50 font-medium">View More</a>
                    </DisclosurePanel>
                  </Disclosure>

                  <!-- Networking -->
                  <Disclosure as="div" class="ml-3" v-slot="{ open: subOpen }">
                    <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-sm/6 font-medium text-gray-700 hover:bg-gray-50 hover:text-website-heading">
                      Networking
                      <ChevronDownIcon :class="[subOpen ? 'rotate-180' : '', 'size-4 flex-none']" aria-hidden="true" />
                    </DisclosureButton>
                    <DisclosurePanel class="mt-1 space-y-1">
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Cellular Network Equipment</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Network Security Equipment</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Networking Hardware</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-website-primary hover:bg-gray-50 font-medium">View More</a>
                    </DisclosurePanel>
                  </Disclosure>

                  <!-- Printers & Scanners -->
                  <Disclosure as="div" class="ml-3" v-slot="{ open: subOpen }">
                    <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-sm/6 font-medium text-gray-700 hover:bg-gray-50 hover:text-website-heading">
                      Printers & Scanners
                      <ChevronDownIcon :class="[subOpen ? 'rotate-180' : '', 'size-4 flex-none']" aria-hidden="true" />
                    </DisclosureButton>
                    <DisclosurePanel class="mt-1 space-y-1">
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Print & Scan Accessories</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Printing Equipment</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Printing Media</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-website-primary hover:bg-gray-50 font-medium">View More</a>
                    </DisclosurePanel>
                  </Disclosure>

                  <!-- Cables -->
                  <Disclosure as="div" class="ml-3" v-slot="{ open: subOpen }">
                    <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-sm/6 font-medium text-gray-700 hover:bg-gray-50 hover:text-website-heading">
                      Cables
                      <ChevronDownIcon :class="[subOpen ? 'rotate-180' : '', 'size-4 flex-none']" aria-hidden="true" />
                    </DisclosureButton>
                    <DisclosurePanel class="mt-1 space-y-1">
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">AV Modular Cables</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Audio Cables</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Coaxial Cables</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-website-primary hover:bg-gray-50 font-medium">View More</a>
                    </DisclosurePanel>
                  </Disclosure>

                  <!-- Accessories -->
                  <Disclosure as="div" class="ml-3" v-slot="{ open: subOpen }">
                    <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-sm/6 font-medium text-gray-700 hover:bg-gray-50 hover:text-website-heading">
                      Accessories
                      <ChevronDownIcon :class="[subOpen ? 'rotate-180' : '', 'size-4 flex-none']" aria-hidden="true" />
                    </DisclosureButton>
                    <DisclosurePanel class="mt-1 space-y-1">
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Coaxial Connectors</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Cable Entry Systems</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-website-primary hover:bg-gray-50 font-medium">View More</a>
                    </DisclosurePanel>
                  </Disclosure>

                  <!-- Storage -->
                  <Disclosure as="div" class="ml-3" v-slot="{ open: subOpen }">
                    <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-sm/6 font-medium text-gray-700 hover:bg-gray-50 hover:text-website-heading">
                      Storage
                      <ChevronDownIcon :class="[subOpen ? 'rotate-180' : '', 'size-4 flex-none']" aria-hidden="true" />
                    </DisclosureButton>
                    <DisclosurePanel class="mt-1 space-y-1">
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Data Storage Devices</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-gray-600 hover:bg-gray-50 hover:text-website-heading">Data Storage Mediums</a>
                      <a href="#" class="block rounded-lg py-1.5 pr-3 pl-8 text-sm text-website-primary hover:bg-gray-50 font-medium">View More</a>
                    </DisclosurePanel>
                  </Disclosure>

                </DisclosurePanel>
              </Disclosure>

              <a href="/listing" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-website-heading hover:bg-gray-50">Features</a>
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-website-heading hover:bg-gray-50">Marketplace</a>

              <Disclosure as="div" class="-mx-3" v-slot="{ open }">
                <DisclosureButton class="flex w-full items-center justify-between rounded-lg py-2 pr-3.5 pl-3 text-base/7 font-semibold text-website-heading hover:bg-gray-50">
                  Company
                  <ChevronDownIcon :class="[open ? 'rotate-180' : '', 'size-5 flex-none']" aria-hidden="true" />
                </DisclosureButton>
                <DisclosurePanel class="mt-2 space-y-2">
                  <DisclosureButton v-for="item in company" :key="item.name" as="a" :href="item.href" class="block rounded-lg py-2 pr-3 pl-6 text-sm/7 font-semibold text-website-heading hover:bg-gray-50">{{ item.name }}</DisclosureButton>
                </DisclosurePanel>
              </Disclosure>
            </div>
            <div class="py-6">
              <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-website-heading hover:bg-gray-50">Log in</a>
            </div>
          </div>
        </div>
      </DialogPanel>
    </Dialog>
  </header>
</template>

<script setup>
  import { ref } from 'vue'
  import {
    Dialog,
    DialogPanel,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
  } from '@headlessui/vue'
  import {
    ArrowPathIcon,
    Bars3Icon,
    ChartPieIcon,
    CursorArrowRaysIcon,
    FingerPrintIcon,
    SquaresPlusIcon,
    XMarkIcon,
  } from '@heroicons/vue/24/outline'
  import { ChevronDownIcon, PhoneIcon, PlayCircleIcon } from '@heroicons/vue/20/solid'

  const categories = [
    { name: 'Desktop & Workstations', description: 'Get a better understanding of your traffic', href: '#', icon: ChartPieIcon },
    { name: 'Monitors & Displays', description: 'Speak directly to your customers', href: '#', icon: CursorArrowRaysIcon },
    { name: 'Power', description: 'Your customers’ data will be safe and secure', href: '#', icon: FingerPrintIcon },
    { name: 'Networking', description: 'Connect with third-party tools', href: '#', icon: SquaresPlusIcon },
    { name: 'Printers & Scanners', description: 'Build strategic funnels that will convert', href: '#', icon: ArrowPathIcon },
    { name: 'Cables', description: 'Build strategic funnels that will convert', href: '#', icon: ArrowPathIcon },
    { name: 'Accessories', description: 'Build strategic funnels that will convert', href: '#', icon: ArrowPathIcon },
    { name: 'Storage', description: 'Build strategic funnels that will convert', href: '#', icon: ArrowPathIcon },
  ]
  const callsToAction = [
    { name: 'Watch demo', href: '#', icon: PlayCircleIcon },
    { name: 'Contact sales', href: '#', icon: PhoneIcon },
  ]
  const company = [
    { name: 'About us', href: '#' },
    { name: 'Careers', href: '#' },
    { name: 'Support', href: '#' },
    { name: 'Press', href: '#' },
    { name: 'Blog', href: '#' },
  ]

  const mobileMenuOpen = ref(false)
</script>