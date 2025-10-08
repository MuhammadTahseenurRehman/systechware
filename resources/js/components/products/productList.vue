<template>
    <div class="bg-white">
        <!-- Mobile filter dialog -->
        <TransitionRoot as="template" :show="mobileFiltersOpen">
            <Dialog class="relative z-40 lg:hidden" @close="mobileFiltersOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
                <div class="fixed inset-0 bg-black/25" />
                </TransitionChild>

                <div class="fixed inset-0 z-40 flex">
                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="translate-x-full">
                    <DialogPanel class="relative ml-auto flex size-full max-w-xs flex-col overflow-y-auto bg-white pt-4 pb-6 shadow-xl">
                        <div class="flex items-center justify-between px-4">
                            <h2 class="text-lg font-medium text-website-heading">Filters</h2>
                            <button type="button" class="relative -mr-2 flex size-10 items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:outline-hidden" @click="mobileFiltersOpen = false">
                            <span class="absolute -inset-0.5" />
                            <span class="sr-only">Close menu</span>
                            <XMarkIcon class="size-6" aria-hidden="true" />
                            </button>
                        </div>
                    <!-- Filters -->
                            <form class="mt-4 border-t border-gray-200">
                                <!-- Example: categories, you can use your own subCategories if needed -->
                                <h3 class="sr-only">Categories</h3>
                                <ul role="list" class="px-2 py-3 font-medium text-website-heading">
                                    <li v-for="category in subCategories" :key="category.name">
                                        <a :href="category.href" class="block px-2 py-3">{{ category.name }}</a>
                                    </li>
                                </ul>
                                <!-- Update mobile filters to include brand search -->
                                <Disclosure as="div" v-for="section in filters" :key="section.id" class="border-t border-gray-200 px-4 py-6" v-slot="{ open }">
                                    <h3 class="-mx-2 -my-3 flow-root">
                                        <DisclosureButton class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-website-text">
                                            <span class="font-medium text-website-heading">{{ section.name }}</span>
                                            <span class="ml-6 flex items-center">
                                                <PlusIcon v-if="!open" class="size-5" aria-hidden="true" />
                                                <MinusIcon v-else class="size-5" aria-hidden="true" />
                                            </span>
                                        </DisclosureButton>
                                    </h3>
                                    <DisclosurePanel class="pt-6">
                                        <!-- Brand Search Bar for Mobile (only for brands section) -->
                                        <div v-if="section.id === 'brands'" class="mb-4">
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </div>
                                                <input
                                                    type="text"
                                                    v-model="brandSearchTerm"
                                                    placeholder="Search brands..."
                                                    class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md text-sm placeholder-website-text focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                                />
                                                <div v-if="brandSearchTerm" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                                    <button
                                                        @click="clearBrandSearch"
                                                        class="text-gray-400 hover:text-gray-600 focus:outline-none"
                                                    >
                                                        <XMarkIcon class="h-4 w-4" />
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Filter options -->
                                        <div class="space-y-6" :class="section.id === 'brands' ? 'max-h-60 overflow-y-auto' : ''">
                                            <div v-if="section.id === 'brands' && filteredBrands.length === 0 && brandSearchTerm" class="text-sm text-website-text text-center py-4">
                                                No brands found matching "{{ brandSearchTerm }}"
                                            </div>
                                            <div 
                                                v-for="(option, optionIdx) in (section.id === 'brands' ? filteredBrands : section.options)" 
                                                :key="option.value" 
                                                class="flex gap-3"
                                            >
                                                <div class="flex h-5 shrink-0 items-center">
                                                    <div class="group grid size-4 grid-cols-1">
                                                        <input 
                                                            :id="`filter-mobile-${section.id}-${optionIdx}`" 
                                                            :name="`${section.id}[]`" 
                                                            :value="option.value" 
                                                            type="checkbox" 
                                                            :checked="option.checked" 
                                                            @change="toggleFilter(section.id, option.value)"
                                                            class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" 
                                                        />
                                                        <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                                            <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <label :for="`filter-mobile-${section.id}-${optionIdx}`" class="min-w-0 flex-1 text-website-text">{{ option.label }}</label>
                                            </div>
                                        </div>
                                    </DisclosurePanel>
                                </Disclosure>
                                
                                <!-- Mobile Price Range Filter -->
                                <div class="border-t border-gray-200 px-4 py-6">
                                    <h3 class="text-sm font-medium text-website-heading mb-4">Price Range</h3>
                                    <div class="space-y-4">
                                        <div class="flex items-center space-x-2">
                                            <input
                                                type="number"
                                                v-model.number="priceRange.currentMin"
                                                :min="priceRange.min"
                                                :max="priceRange.currentMax"
                                                @input="updatePriceFilter"
                                                class="w-20 px-2 py-1 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="Min"
                                            />
                                            <span class="text-website-text">-</span>
                                            <input
                                                type="number"
                                                v-model.number="priceRange.currentMax"
                                                :min="priceRange.currentMin"
                                                :max="priceRange.max"
                                                @input="updatePriceFilter"
                                                class="w-20 px-2 py-1 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                                placeholder="Max"
                                            />
                                        </div>
                                        <div class="text-xs text-website-text">
                                            ${{ priceRange.currentMin }} - ${{ priceRange.currentMax }} US Dollars
                                        </div>
                                        <button
                                            type="button"
                                            @click="clearPriceFilter"
                                            class="text-xs text-indigo-600 hover:text-indigo-800 underline"
                                        >
                                            Clear
                                        </button>
                                    </div>
                                </div>
                    </form>
                    </DialogPanel>
                </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <main class="mx-auto max-w-8xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between border-b border-gray-200 pt-2 md:pt-8 pb-2 md:pb-8">
                <h1 class="text-2xl md:text-4xl font-bold tracking-tight text-website-heading">New Arrivals</h1>
                <!-- Update the header section - remove view toggle buttons -->
                <div class="flex items-center">
                <Menu as="div" class="relative inline-block text-left">
                        <MenuButton class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-website-heading">
                    Sort
                    <ChevronDownIcon class="-mr-1 ml-1 size-5 shrink-0 text-gray-400 group-hover:text-website-text" aria-hidden="true" />
                </MenuButton>
                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                            <MenuItems class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black/5 focus:outline-hidden">
                    <div class="py-1">
                        <MenuItem v-for="option in sortOptions" :key="option.name" v-slot="{ active }">
                        <button 
                            type="button"
                            @click="sortProducts(option.value)"
                                            :class="[currentSort === option.value ? 'font-medium text-website-heading' : 'text-website-text', active ? 'bg-gray-100 outline-hidden' : '', 'block px-4 py-2 text-sm w-full text-left']"
                                        >{{ option.name }}</button>
                        </MenuItem>
                    </div>
                    </MenuItems>
                </transition>
                </Menu>
                    
                    <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-website-text sm:ml-6 lg:hidden" @click="mobileFiltersOpen = true">
                        <span class="sr-only">Filters</span>
                        <FunnelIcon class="size-5" aria-hidden="true" />
                    </button>
                </div>
            </div>

            <section aria-labelledby="products-heading" class="pt-4 lg:pt-8 pb-24">
                <h2 id="products-heading" class="sr-only">Products</h2>
                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                    <!-- Filters (desktop) -->
                    <form class="hidden lg:block">
                        <!-- Category filter: always open, no collapsible behavior -->
                        <div class="pb-6">
                            <h3 class="text-sm font-medium text-website-heading mb-4">Category</h3>
                            <div class="space-y-4">
                                <div v-for="(option, optionIdx) in filters.find(f => f.id === 'category')?.options || []" :key="option.value" class="flex gap-3">
                                    <div class="flex h-5 shrink-0 items-center">
                                        <div class="group grid size-4 grid-cols-1">
                                            <input
                                                :id="`filter-category-${optionIdx}`"
                                                :name="`category[]`"
                                                :value="option.value"
                                                type="checkbox"
                                                :checked="option.checked"
                                                @change="toggleFilter('category', option.value)"
                                                class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto"
                                            />
                                            <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                                <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                    <label :for="`filter-category-${optionIdx}`" class="text-sm text-gray-600">{{ option.label }}</label>
                                </div>
                            </div>
                        </div>

                        <!-- Brands Filter (Collapsible) -->
                        <Disclosure
                            as="div"
                            v-for="section in filters.filter(f => f.id === 'brands')"
                            :key="section.id"
                            class="border-b border-gray-200 py-6"
                            v-slot="{ open }"
                        >
                            <h3 class="-my-3 flow-root">
                                <DisclosureButton class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-website-text">
                                    <span class="font-medium text-website-heading">{{ section.name }}</span>
                                    <span class="ml-6 flex items-center">
                                        <PlusIcon v-if="!open" class="size-5" aria-hidden="true" />
                                        <MinusIcon v-else class="size-5" aria-hidden="true" />
                                    </span>
                                </DisclosureButton>
                            </h3>
                            <DisclosurePanel class="pt-6">
                                <!-- Brand Search Bar -->
                                <div class="mb-4">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                        <input
                                            type="text"
                                            v-model="brandSearchTerm"
                                            placeholder="Search brands..."
                                            class="block w-full pl-10 pr-10 py-2 border border-gray-300 rounded-md text-sm placeholder-website-text focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                        />
                                        <div v-if="brandSearchTerm" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                            <button
                                                @click="clearBrandSearch"
                                                class="text-gray-400 hover:text-gray-600 focus:outline-none"
                                            >
                                                <XMarkIcon class="h-4 w-4" />
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Brands List -->
                                <div class="space-y-4 max-h-60 overflow-y-auto">
                                    <div v-if="filteredBrands.length === 0 && brandSearchTerm" class="text-sm text-website-text text-center py-4">
                                        No brands found matching "{{ brandSearchTerm }}"
                                    </div>
                                    <div v-for="(option, optionIdx) in filteredBrands" :key="option.value" class="flex gap-3">
                                        <div class="flex h-5 shrink-0 items-center">
                                            <div class="group grid size-4 grid-cols-1">
                                                <input 
                                                    :id="`filter-${section.id}-${optionIdx}`" 
                                                    :name="`${section.id}[]`" 
                                                    :value="option.value" 
                                                    type="checkbox" 
                                                    :checked="option.checked" 
                                                    @change="toggleFilter(section.id, option.value)"
                                                    class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" 
                                                />
                                                <svg class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25" viewBox="0 0 14 14" fill="none">
                                                    <path class="opacity-0 group-has-checked:opacity-100" d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path class="opacity-0 group-has-indeterminate:opacity-100" d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <label :for="`filter-${section.id}-${optionIdx}`" class="text-sm text-gray-600">{{ option.label }}</label>
                                    </div>
                                </div>
                            </DisclosurePanel>
                        </Disclosure>

                        <!-- Price Range Filter - positioned after brands -->
                        <div class="border-b border-gray-200 py-6">
                            <h3 class="text-sm font-medium text-website-heading mb-4">Price Range</h3>
                            <div class="space-y-4">
                                <div class="flex items-center space-x-2">
                                    <input
                                        type="number"
                                        v-model.number="priceRange.currentMin"
                                        :min="priceRange.min"
                                        :max="priceRange.currentMax"
                                        @input="updatePriceFilter"
                                        class="w-20 px-2 py-1 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        placeholder="Min"
                                    />
                                    <span class="text-website-text">-</span>
                                    <input
                                        type="number"
                                        v-model.number="priceRange.currentMax"
                                        :min="priceRange.currentMin"
                                        :max="priceRange.max"
                                        @input="updatePriceFilter"
                                        class="w-20 px-2 py-1 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                        placeholder="Max"
                                    />
            </div>
                                <div class="text-xs text-website-text">
                                    ${{ priceRange.currentMin }} - ${{ priceRange.currentMax }} US Dollars
            </div>
                            <button 
                                type="button" 
                                    @click="clearPriceFilter"
                                    class="text-xs text-indigo-600 hover:text-indigo-800 underline"
                            >
                                    Clear
                            </button>
                            </div>
                        </div>
                    </form>
                    <!-- Product grid -->
                    <div class="lg:col-span-3">
                        <section aria-labelledby="product-heading" class="lg:col-span-2 xl:col-span-3">
                            <h2 id="product-heading" class="sr-only">Products</h2>

                            <div class="grid grid-cols-1 gap-4 xl:gap-8">
                                <div v-for="(product, index) in paginatedProducts" :key="product.id" class="gap-4 md:gap-8 group relative grid grid-cols-[2fr_3fr] md:grid-cols-[1fr_3fr] overflow-hidden border-b border-website-border pb-4 lg:pb-8 last:border-b-0 last:pb-0 last:mb-0">
                                    <!-- Image container - responsive sizing -->
                                    <div class="lg:flex-shrink-0">
                                        <img :src="product.imageSrc" :alt="product.description" class="mx-auto block max-h-[200px] max-w-full bg-white object-cover group-hover:opacity-75 cursor-pointer" @click="openQuickView(product)" />
                                    </div>
                                    <!-- Content container - responsive layout -->
                                    <div class="grid grid-col-1 md:grid-cols-[2fr_1fr] gap-4 md:gap-8 lg:justify-between">
                                        <div class="flex flex-1 flex-col lg:space-y-1">
                                            <h3 class="text-sm lg:text-base font-medium text-website-heading">
                                                <a :href="product.href">
                                                    {{ product.name }}
                                                </a>
                                            </h3>
                                            <p class="text-xs md:text-sm text-website-text mb-2">
                                                <span class="text-website-text">Part#</span>
                                                {{ product.partNumber }}
                                            </p>
                                            <p class="text-xs md:text-sm text-website-text line-clamp-2 lg:mt-1">{{ product.description }}</p>
                                        </div>
                                        <div class="flex flex-col justify-start gap-4">
                                            <ProductPrice 
                                                :current-price="product.priceValue" 
                                                :original-price="product.originalPrice"
                                            />
                                            <button class="text-xs md:text-sm border border-website-button capitalize text-white font-medium bg-website-button rounded-md p-2 cursor-pointer">
                                                Add to Cart
                                            </button>
                                            <a href="#" class="inline-block text-xs md:text-sm mx-auto underline text-website-link capitalize cursor-pointer">
                                                Get a quote
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pagination -->
                            <div v-if="totalPages > 1" class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                                <!-- Results info -->
                                <div class="text-sm text-gray-700">
                                    Showing 
                                    <span class="font-medium">{{ (currentPage - 1) * itemsPerPage + 1 }}</span>
                                    to 
                                    <span class="font-medium">{{ Math.min(currentPage * itemsPerPage, sortedProducts.length) }}</span>
                                    of 
                                    <span class="font-medium">{{ sortedProducts.length }}</span>
                                    results
                                </div>

                                <!-- Pagination controls -->
                                <nav class="flex items-center space-x-2" aria-label="Pagination">
                                    <!-- Previous button -->
                                    <button
                                        @click="prevPage"
                                        :disabled="currentPage === 1"
                                        :class="[
                                            'relative inline-flex items-center px-2 py-2 text-sm font-medium rounded-md',
                                            currentPage === 1 
                                                ? 'text-gray-300 cursor-not-allowed' 
                                                : 'text-website-text hover:text-gray-700 hover:bg-gray-50'
                                        ]"
                                    >
                                        <span class="sr-only">Previous</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>

                                    <!-- Page numbers -->
                                    <div class="flex space-x-1">
                                        <template v-for="page in visiblePages" :key="page">
                                            <button
                                                v-if="page !== '...'"
                                                @click="goToPage(page)"
                                                :class="[
                                                    'relative inline-flex items-center px-3 py-2 text-sm font-medium rounded-md',
                                                    page === currentPage
                                                        ? 'bg-indigo-600 text-white'
                                                        : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50'
                                                ]"
                                            >
                                                {{ page }}
                                            </button>
                                            <span v-else class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700">
                                                ...
                                            </span>
                                        </template>
                                    </div>

                                    <!-- Next button -->
                                    <button
                                        @click="nextPage"
                                        :disabled="currentPage === totalPages"
                                        :class="[
                                            'relative inline-flex items-center px-2 py-2 text-sm font-medium rounded-md',
                                            currentPage === totalPages 
                                                ? 'text-gray-300 cursor-not-allowed' 
                                                : 'text-website-text hover:text-gray-700 hover:bg-gray-50'
                                        ]"
                                    >
                                        <span class="sr-only">Next</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </nav>
                            </div>

                            <!-- No results message -->
                            <div v-if="filteredProducts.length === 0" class="text-center py-12">
                                <h3 class="text-lg font-medium text-website-heading mb-2">No products found</h3>
                                <p class="text-website-text mb-6">Try adjusting your filters to see more results.</p>
                                <button 
                                    @click="clearAllFilters"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-600 bg-indigo-100 hover:bg-indigo-200"
                                >
                                    Clear all filters
                                </button>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </main>

        <!-- Quick View Modal -->
        <QuickViewModal 
            :open="quickViewOpen" 
            :product="quickViewProduct"
            @close="closeQuickView"
        />
    </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import {
    Dialog,
    DialogPanel,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Popover,
    PopoverButton,
    PopoverGroup,
    PopoverPanel,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import { XMarkIcon, ChevronDownIcon, PlusIcon, MinusIcon, FunnelIcon } from '@heroicons/vue/24/outline'
import { ChevronDownIcon as ChevronDownIconSolid } from '@heroicons/vue/20/solid'
import QuickViewModal from '../modals/quick-view-modal.vue'
import ProductPrice from './ProductPrice.vue'

// Reactive state
const mobileFiltersOpen = ref(false)
const quickViewOpen = ref(false)
const quickViewProduct = ref(null)
const currentSort = ref('popular')

// Pagination state
const currentPage = ref(1)
const itemsPerPage = ref(18)

// Brand search state
const brandSearchTerm = ref('')

// Reactive filters
const filters = ref([
    {
        id: 'category',
        name: 'Category',
        options: [
            { value: 'new-arrivals', label: 'All New Arrivals', checked: false },
            { value: 'tees', label: 'Tees', checked: false },
            { value: 'objects', label: 'Objects', checked: false },
            { value: 'sweatshirts', label: 'Sweatshirts', checked: false },
            { value: 'pants-shorts', label: 'Pants & Shorts', checked: false },
        ],
    },
    {
        id: 'brands',
        name: 'Brands',
        options: [
            { value: 'cisco', label: 'Cisco', checked: false },
            { value: 'lenovo', label: 'Lenovo', checked: false },
            { value: 'netgear', label: 'Netgear', checked: false },
            { value: 'microsoft', label: 'Microsoft', checked: false },
            { value: 'hp', label: 'HP', checked: false },
            { value: 'adobe', label: 'Adobe', checked: false },
            { value: 'fortinet', label: 'Fortinet', checked: false },
            { value: 'apc', label: 'APC', checked: false },
            { value: 'eaton', label: 'Eaton', checked: false },
            { value: 'samsung', label: 'Samsung', checked: false },
        ],
    },
])

// Update the price range state
const priceRange = ref({
    min: 0,
    max: 1000,
    currentMin: 0,
    currentMax: 1000
})

// Sort options
const sortOptions = [
    { name: 'Most Popular', value: 'popular' },
    { name: 'Best Rating', value: 'rating' },
    { name: 'Newest', value: 'newest' },
    { name: 'Price: Low to High', value: 'price-asc' },
    { name: 'Price: High to Low', value: 'price-desc' },
]

// Products with unique IDs and filter properties
const allProducts = ref([
    {
        id: 1, // First instance - keep as 1
        name: 'Lenovo 4X41M69794 Lenovo ThinkPad Professional 16-inch Gen 2 backpack Casual backpack Black Plastic',
        href: '#',
        price: '$35',
        priceValue: 35,
        originalPrice: 45,
        rating: 4.5,
        reviewCount: 124,
        category: 'objects',
        brand: 'lenovo',
        partNumber: '4X41M69794',
        sku: 'ST8756',
        description: 'ThinkPad 15.6" Basic Backpack offers protection and valueFeatures: Padded PC compartment with plenty of internal storage for other work essentials Convenient front pocket for easy storage Durable ThinkPad-branded design Compatible with all ThinkPad notebook computers up to 15.6" wide Lightweight construction with shoulder straps and comfort handle Limited lifetime warranty.',
        imageSrc: 'https://content.thebagitude.com/products_images/R5jjkfoF0Ual4Vh-vl_m_A.c-r.jpg',
        dateAdded: new Date('2023-11-15'),
    },
    {
        id: 2, // First instance - keep as 2
        name: 'Philips TAK4206BL/00 Philips TAK4206BL/00 headphones/headset Wired & Wireless Head-band Calls/Music USB Type-C Bluetooth Blue',
        href: '#',
        price: '$35',
        priceValue: 35,
        originalPrice: 42,
        rating: 4.7,
        reviewCount: 203,
        category: 'objects',
        brand: 'hp',
        partNumber: 'MMP004',
        sku: 'ST6521',
        description: 'No wires, no tangles. 28 hours play timeFrom trips away to screen time or homework, kids will love these wireless on-ear headphones! They get 28 hours play time from a single charge, and a full charge takes 2 hours. A quick 15-minute boost gives an extra 2 hours play time.Always safe, always fun. Parental controlsSpecially designed to be safe for young ears, these headphones boast 32 mm drivers that have been limited to 85 dB. Parents can also set maximum volume and play time limits in the Philips Headphones app. You can relax while they have fun.Funky, colourful light-up panels in the ear cupsThe ear cups feature panels that light up for an extra dash of funky style. There are four variations to choose from: red lights, green lights, blue lights, or a mix of all three! Simply press the button on the ear cup to cycle through the light options.Kid-friendly comfortSoft ear-cup cushions and a soft headband cushion keep the kids comfortable-whether they are listening to music or watching their favourite YouTubers. The flexible headband adjusts easily.Easy control. From music to callsButtons make it easy for kids to control music and calls without help. The headphones are ready to pair the instant you switch on Bluetooth. Once they are paired, they remember the last device they were paired with.Easy storage. Flat-folding and compact-folding designThese wireless on-ear kids headphones feature a clever design that folds in two directions. You can fold them flat, perfect for storing in a bedroom drawer. Or you can fold them flat and inwards, creating a compact bundle that fits in pockets and bags.Compatible with an audio cable (3.5 mm jack)The 3.5 mm audio port lets kids connect their headphones directly to their smartphone or hand-held console.Custom sound control and more. Philips Headphones appThe Philips Headphones app lets you set volume limits, and you can also limit play time per day or per week. A voice prompt alerts your child if their time limit has been reached-and the app can automatically lower volume if it goes too high.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-04.jpg',
        dateAdded: new Date('2023-12-10'),
    },
    {
        id: 3, // First instance - keep as 3
        name: 'Earthen Bottle',
        href: '#',
        price: '$48',
        priceValue: 48,
        originalPrice: 60,
        rating: 4.2,
        reviewCount: 89,
        category: 'objects',
        brand: 'cisco',
        partNumber: 'EB001',
        sku: 'ST9854',
        description: 'Tall slender porcelain bottle with natural clay textured body and cork stopper.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-01.jpg',
        dateAdded: new Date('2023-12-01'),
    },
    {
        id: 4, // Changed from duplicate 2 to 4
        name: 'Nomad Tumbler',
        href: '#',
        price: '$35',
        priceValue: 35,
        originalPrice: 45,
        rating: 4.5,
        reviewCount: 124,
        category: 'objects',
        brand: 'lenovo',
        partNumber: 'NT002',
        sku: 'ST8756',
        description: 'Olive drab green insulated bottle with flared screw lid and flat top.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-02.jpg',
        dateAdded: new Date('2023-11-15'),
    },
    {
        id: 5, // Changed from duplicate 3 to 5
        name: 'Focus Paper Refill',
        href: '#',
        price: '$89',
        priceValue: 89,
        // No originalPrice - will show "Best Value"
        rating: 3.8,
        reviewCount: 67,
        category: 'objects',
        brand: 'microsoft',
        partNumber: 'FPR003',
        sku: 'ST7632',
        description: 'Person using a pen to cross a task off a productivity paper card.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-03.jpg',
        dateAdded: new Date('2023-10-20'),
    },
    {
        id: 6, // Changed from duplicate 4 to 6
        name: 'Philips TAK4206BL/00 Gaming Headphones',
        href: '#',
        price: '$42',
        priceValue: 42,
        originalPrice: 50,
        rating: 4.7,
        reviewCount: 203,
        category: 'objects',
        brand: 'hp',
        partNumber: 'MMP005',
        sku: 'ST6522',
        description: 'Gaming version of the popular Philips headphones with enhanced bass and RGB lighting.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-04.jpg',
        dateAdded: new Date('2023-12-10'),
    },
    {
        id: 7, // Keep as 7
        name: 'Focus Card Tray',
        href: '#',
        price: '$64',
        priceValue: 64,
        originalPrice: 75,
        rating: 4.3,
        reviewCount: 156,
        category: 'objects',
        brand: 'netgear',
        partNumber: 'FCT005',
        sku: 'ST5432',
        description: 'Paper card sitting upright in walnut card holder on desk.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-05.jpg',
        dateAdded: new Date('2023-11-30'),
    },
    {
        id: 8, // Keep as 8
        name: 'Focus Multi-Pack',
        href: '#',
        price: '$39',
        priceValue: 39,
        // No originalPrice - will show "Best Value"
        rating: 4.1,
        reviewCount: 98,
        category: 'objects',
        brand: 'samsung',
        partNumber: 'FMP006',
        sku: 'ST4321',
        description: 'Stack of 3 small drab green cardboard paper card refill boxes with white text.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-06.jpg',
        dateAdded: new Date('2023-09-15'),
    },
    {
        id: 9, // Keep as 9
        name: 'APC SRT192BP APC Smart-UPS On-Line SRT Battery Pack for 5/6kVA Extended runtime model 192V',
        href: '#',
        price: '$50',
        priceValue: 50,
        originalPrice: 65,
        rating: 4.6,
        reviewCount: 87,
        category: 'objects',
        brand: 'apc',
        partNumber: 'RBC59',
        sku: 'ST9454',
        description: 'The genuine APC Replacement Battery Cartridge (RBC) is tested and certified for 100% compatibility to the specific APC UPS. This lead-acid RBC has a lifetime of three to five years which offers reliable support and extends the useful life of your UPS.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-07.jpg',
        dateAdded: new Date('2023-11-05'),
    },
    {
        id: 10, // Keep as 10
        name: 'Focus Carry Pouch',
        href: '#',
        price: '$32',
        priceValue: 32,
        originalPrice: 40,
        rating: 4.0,
        reviewCount: 74,
        category: 'objects',
        brand: 'fortinet',
        partNumber: 'FCP008',
        sku: 'ST3210',
        description: 'Textured gray felt pouch for paper cards with snap button flap and elastic pen holder loop.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-08.jpg',
        dateAdded: new Date('2023-10-01'),
    },
    {
        id: 11, // Changed from duplicate 1 to 11
        name: 'Earthen Bottle Premium',
        href: '#',
        price: '$55',
        priceValue: 55,
        originalPrice: 70,
        rating: 4.4,
        reviewCount: 95,
        category: 'objects',
        brand: 'cisco',
        partNumber: 'EB002',
        sku: 'ST9855',
        description: 'Premium version of the popular earthen bottle with enhanced ceramic finish.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-01.jpg',
        dateAdded: new Date('2023-12-01'),
    },
    {
        id: 12, // Changed from duplicate 2 to 12
        name: 'Lenovo ThinkPad Pro Backpack XL',
        href: '#',
        price: '$45',
        priceValue: 45,
        originalPrice: 55,
        rating: 4.6,
        reviewCount: 134,
        category: 'objects',
        brand: 'lenovo',
        partNumber: '4X41M69795',
        sku: 'ST8757',
        description: 'Extra large version of the ThinkPad backpack with additional compartments.',
        imageSrc: 'https://content.thebagitude.com/products_images/R5jjkfoF0Ual4Vh-vl_m_A.c-r.jpg',
        dateAdded: new Date('2023-11-15'),
    },
    {
        id: 13, // Changed from duplicate 3 to 13
        name: 'Focus Paper Refill Pro',
        href: '#',
        price: '$99',
        priceValue: 99,
        originalPrice: 120,
        rating: 4.0,
        reviewCount: 78,
        category: 'objects',
        brand: 'microsoft',
        partNumber: 'FPR004',
        sku: 'ST7633',
        description: 'Professional grade paper refill with premium materials.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-03.jpg',
        dateAdded: new Date('2023-10-20'),
    },
    {
        id: 14, // Changed from duplicate 4 to 14
        name: 'Philips Gaming Headset Pro',
        href: '#',
        price: '$65',
        priceValue: 65,
        originalPrice: 80,
        rating: 4.8,
        reviewCount: 210,
        category: 'objects',
        brand: 'hp',
        partNumber: 'MMP006',
        sku: 'ST6523',
        description: 'Professional gaming headset with advanced noise cancellation and RGB lighting.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-04.jpg',
        dateAdded: new Date('2023-12-10'),
    },
    {
        id: 15, // Changed from duplicate 5 to 15
        name: 'Focus Card Tray Deluxe',
        href: '#',
        price: '$78',
        priceValue: 78,
        originalPrice: 90,
        rating: 4.5,
        reviewCount: 165,
        category: 'objects',
        brand: 'netgear',
        partNumber: 'FCT006',
        sku: 'ST5433',
        description: 'Deluxe walnut card holder with premium finish and multiple slots.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-05.jpg',
        dateAdded: new Date('2023-11-30'),
    },
    {
        id: 16, // Changed from duplicate 6 to 16
        name: 'Focus Multi-Pack XL',
        href: '#',
        price: '$49',
        priceValue: 49,
        originalPrice: 60,
        rating: 4.3,
        reviewCount: 110,
        category: 'objects',
        brand: 'samsung',
        partNumber: 'FMP007',
        sku: 'ST4322',
        description: 'Extra large pack with 5 cardboard boxes instead of 3.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-06.jpg',
        dateAdded: new Date('2023-09-15'),
    },
    // Adding 30 more products for pagination
    {
        id: 17,
        name: 'Cisco Catalyst 9200L 24-Port Gigabit Switch',
        href: '#',
        price: '$450',
        priceValue: 450,
        originalPrice: 520,
        rating: 4.6,
        reviewCount: 89,
        category: 'new-arrivals',
        brand: 'cisco',
        partNumber: 'C9200L-24T-4G-E',
        sku: 'NW2001',
        description: 'Enterprise-grade 24-port Gigabit Ethernet switch with advanced security features and cloud management capabilities.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-01.jpg',
        dateAdded: new Date('2024-01-15'),
    },
    {
        id: 18,
        name: 'Microsoft Surface Pro 9 Business Bundle',
        href: '#',
        price: '$1299',
        priceValue: 1299,
        originalPrice: 1499,
        rating: 4.8,
        reviewCount: 156,
        category: 'new-arrivals',
        brand: 'microsoft',
        partNumber: 'QEZ-00001',
        sku: 'TB3001',
        description: 'Complete business solution with Surface Pro 9, Type Cover, and Surface Pen for professional productivity.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-02.jpg',
        dateAdded: new Date('2024-01-20'),
    },
    {
        id: 19,
        name: 'HP EliteBook 840 G9 Laptop',
        href: '#',
        price: '$1199',
        priceValue: 1199,
        originalPrice: 1399,
        rating: 4.5,
        reviewCount: 134,
        category: 'new-arrivals',
        brand: 'hp',
        partNumber: '5Y2K9UT',
        sku: 'LT4001',
        description: '14-inch business laptop with Intel Core i7, 16GB RAM, 512GB SSD, and advanced security features.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-03.jpg',
        dateAdded: new Date('2024-01-18'),
    },
    {
        id: 20,
        name: 'Adobe Creative Cloud Pro T-Shirt',
        href: '#',
        price: '$25',
        priceValue: 25,
        rating: 4.2,
        reviewCount: 67,
        category: 'tees',
        brand: 'adobe',
        partNumber: 'ADT001',
        sku: 'AP2001',
        description: 'Premium cotton t-shirt featuring Adobe Creative Cloud logo. Perfect for creative professionals.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-04.jpg',
        dateAdded: new Date('2023-12-05'),
    },
    {
        id: 21,
        name: 'Fortinet FortiGate 60F Firewall',
        href: '#',
        price: '$350',
        priceValue: 350,
        originalPrice: 420,
        rating: 4.7,
        reviewCount: 98,
        category: 'new-arrivals',
        brand: 'fortinet',
        partNumber: 'FG-60F',
        sku: 'FW5001',
        description: 'Next-generation firewall with advanced threat protection and SD-WAN capabilities for small businesses.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-05.jpg',
        dateAdded: new Date('2024-01-10'),
    },
    {
        id: 22,
        name: 'Samsung 970 EVO Plus SSD 1TB',
        href: '#',
        price: '$89',
        priceValue: 89,
        originalPrice: 120,
        rating: 4.8,
        reviewCount: 245,
        category: 'objects',
        brand: 'samsung',
        partNumber: 'MZ-V7S1T0B',
        sku: 'ST1001',
        description: 'High-performance NVMe M.2 SSD with exceptional speed and reliability for gaming and professional use.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-06.jpg',
        dateAdded: new Date('2024-01-12'),
    },
    {
        id: 23,
        name: 'Netgear Nighthawk Pro Gaming Sweatshirt',
        href: '#',
        price: '$55',
        priceValue: 55,
        originalPrice: 70,
        rating: 4.3,
        reviewCount: 78,
        category: 'sweatshirts',
        brand: 'netgear',
        partNumber: 'NGS001',
        sku: 'AP3001',
        description: 'Comfortable gaming-themed sweatshirt with Nighthawk logo. Perfect for gaming enthusiasts.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-07.jpg',
        dateAdded: new Date('2023-11-20'),
    },
    {
        id: 24,
        name: 'APC Smart-UPS 1500VA Battery Backup',
        href: '#',
        price: '$280',
        priceValue: 280,
        originalPrice: 340,
        rating: 4.6,
        reviewCount: 123,
        category: 'objects',
        brand: 'apc',
        partNumber: 'SMT1500',
        sku: 'UPS2001',
        description: 'Intelligent battery backup and surge protection with LCD display and energy-efficient design.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-08.jpg',
        dateAdded: new Date('2024-01-08'),
    },
    {
        id: 25,
        name: 'Lenovo Casual Cargo Shorts',
        href: '#',
        price: '$35',
        priceValue: 35,
        rating: 4.1,
        reviewCount: 45,
        category: 'pants-shorts',
        brand: 'lenovo',
        partNumber: 'LPS001',
        sku: 'AP4001',
        description: 'Comfortable cargo shorts with multiple pockets and Lenovo branding.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-01.jpg',
        dateAdded: new Date('2023-10-15'),
    },
    {
        id: 26,
        name: 'Eaton 5S 1500VA UPS System',
        href: '#',
        price: '$195',
        priceValue: 195,
        originalPrice: 250,
        rating: 4.4,
        reviewCount: 89,
        category: 'objects',
        brand: 'eaton',
        partNumber: '5S1500LCD',
        sku: 'UPS3001',
        description: 'Compact UPS with LCD display providing reliable power protection for home and office equipment.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-02.jpg',
        dateAdded: new Date('2024-01-05'),
    },
    {
        id: 27,
        name: 'HP Omen Gaming T-Shirt',
        href: '#',
        price: '$28',
        priceValue: 28,
        rating: 4.2,
        reviewCount: 56,
        category: 'tees',
        brand: 'hp',
        partNumber: 'HPT002',
        sku: 'AP5001',
        description: 'Gaming-inspired t-shirt with HP Omen logo and modern design for gamers and tech enthusiasts.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-03.jpg',
        dateAdded: new Date('2023-12-01'),
    },
    {
        id: 28,
        name: 'Cisco Meraki Go GX20 Security Gateway',
        href: '#',
        price: '$150',
        priceValue: 150,
        originalPrice: 189,
        rating: 4.5,
        reviewCount: 76,
        category: 'new-arrivals',
        brand: 'cisco',
        partNumber: 'GX20-HW-US',
        sku: 'NW3001',
        description: 'Cloud-managed security gateway with firewall and VPN capabilities for small business networks.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-04.jpg',
        dateAdded: new Date('2024-01-22'),
    },
    {
        id: 29,
        name: 'Microsoft Office 365 Business Premium',
        href: '#',
        price: '$22',
        priceValue: 22,
        rating: 4.6,
        reviewCount: 189,
        category: 'objects',
        brand: 'microsoft',
        partNumber: 'KLQ-00216',
        sku: 'SW4001',
        description: 'Monthly subscription to Office 365 with premium productivity apps and cloud services.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-05.jpg',
        dateAdded: new Date('2024-01-14'),
    },
    {
        id: 30,
        name: 'Adobe Creative Suite Hoodie',
        href: '#',
        price: '$65',
        priceValue: 65,
        originalPrice: 80,
        rating: 4.4,
        reviewCount: 92,
        category: 'sweatshirts',
        brand: 'adobe',
        partNumber: 'ADH001',
        sku: 'AP6001',
        description: 'Premium hoodie featuring Adobe Creative Suite logos. Perfect for designers and creatives.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-06.jpg',
        dateAdded: new Date('2023-11-28'),
    },
    {
        id: 31,
        name: 'Netgear ProSAFE 16-Port Switch',
        href: '#',
        price: '$120',
        priceValue: 120,
        originalPrice: 155,
        rating: 4.3,
        reviewCount: 67,
        category: 'new-arrivals',
        brand: 'netgear',
        partNumber: 'GS116-100NAS',
        sku: 'NW4001',
        description: 'Unmanaged Gigabit Ethernet switch for reliable network connectivity in small offices.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-07.jpg',
        dateAdded: new Date('2024-01-16'),
    },
    {
        id: 32,
        name: 'Fortinet Security Polo Shirt',
        href: '#',
        price: '$42',
        priceValue: 42,
        rating: 4.1,
        reviewCount: 34,
        category: 'tees',
        brand: 'fortinet',
        partNumber: 'FTP001',
        sku: 'AP7001',
        description: 'Professional polo shirt with Fortinet security branding for IT professionals.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-08.jpg',
        dateAdded: new Date('2023-12-08'),
    },
    {
        id: 33,
        name: 'Samsung T7 Portable SSD 2TB',
        href: '#',
        price: '$159',
        priceValue: 159,
        originalPrice: 199,
        rating: 4.7,
        reviewCount: 134,
        category: 'objects',
        brand: 'samsung',
        partNumber: 'MU-PC2T0T',
        sku: 'ST2001',
        description: 'Ultra-portable external SSD with USB 3.2 Gen 2 for fast data transfer and storage.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-01.jpg',
        dateAdded: new Date('2024-01-11'),
    },
    {
        id: 34,
        name: 'HP ZBook Professional Pants',
        href: '#',
        price: '$75',
        priceValue: 75,
        originalPrice: 95,
        rating: 4.2,
        reviewCount: 48,
        category: 'pants-shorts',
        brand: 'hp',
        partNumber: 'HPP001',
        sku: 'AP8001',
        description: 'Professional dress pants with HP ZBook branding for business professionals.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-02.jpg',
        dateAdded: new Date('2023-11-10'),
    },
    {
        id: 35,
        name: 'Lenovo ThinkStation P350 Workstation',
        href: '#',
        price: '$899',
        priceValue: 899,
        originalPrice: 1099,
        rating: 4.6,
        reviewCount: 87,
        category: 'new-arrivals',
        brand: 'lenovo',
        partNumber: '30E30037US',
        sku: 'WS1001',
        description: 'Compact tower workstation with Intel processors and professional graphics for demanding tasks.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-03.jpg',
        dateAdded: new Date('2024-01-19'),
    },
    {
        id: 36,
        name: 'APC Back-UPS Pro 1500 Battery Pack',
        href: '#',
        price: '$145',
        priceValue: 145,
        originalPrice: 180,
        rating: 4.4,
        reviewCount: 76,
        category: 'objects',
        brand: 'apc',
        partNumber: 'BR1500MS',
        sku: 'UPS4001',
        description: 'Sine wave UPS with automatic voltage regulation and energy-saving outlets.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-04.jpg',
        dateAdded: new Date('2024-01-07'),
    },
    {
        id: 37,
        name: 'Cisco Logo Zip-Up Hoodie',
        href: '#',
        price: '$68',
        priceValue: 68,
        originalPrice: 85,
        rating: 4.3,
        reviewCount: 54,
        category: 'sweatshirts',
        brand: 'cisco',
        partNumber: 'CZH001',
        sku: 'AP9001',
        description: 'Premium zip-up hoodie with embroidered Cisco logo for networking professionals.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-05.jpg',
        dateAdded: new Date('2023-11-25'),
    },
    {
        id: 38,
        name: 'Eaton 9PX 1500VA UPS Tower',
        href: '#',
        price: '$320',
        priceValue: 320,
        originalPrice: 390,
        rating: 4.5,
        reviewCount: 63,
        category: 'objects',
        brand: 'eaton',
        partNumber: '9PX1500RT',
        sku: 'UPS5001',
        description: 'Double-conversion online UPS with LCD display and network management capabilities.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-06.jpg',
        dateAdded: new Date('2024-01-04'),
    },
    {
        id: 39,
        name: 'Microsoft Surface Pro Type Cover',
        href: '#',
        price: '$129',
        priceValue: 129,
        originalPrice: 159,
        rating: 4.4,
        reviewCount: 98,
        category: 'objects',
        brand: 'microsoft',
        partNumber: 'FFP-00001',
        sku: 'AC3001',
        description: 'Ultra-thin keyboard with precision trackpad and backlit keys for Surface Pro tablets.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-07.jpg',
        dateAdded: new Date('2024-01-13'),
    },
    {
        id: 40,
        name: 'Adobe Photoshop Graphic Tee',
        href: '#',
        price: '$32',
        priceValue: 32,
        rating: 4.1,
        reviewCount: 67,
        category: 'tees',
        brand: 'adobe',
        partNumber: 'APT002',
        sku: 'AP10001',
        description: 'Retro-style t-shirt featuring classic Adobe Photoshop interface design for designers.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-08.jpg',
        dateAdded: new Date('2023-12-03'),
    },
    {
        id: 41,
        name: 'Netgear Orbi Pro 6 Mesh System',
        href: '#',
        price: '$599',
        priceValue: 599,
        originalPrice: 699,
        rating: 4.6,
        reviewCount: 112,
        category: 'new-arrivals',
        brand: 'netgear',
        partNumber: 'SXK80-100NAS',
        sku: 'NW5001',
        description: 'Professional-grade tri-band mesh WiFi system with dedicated backhaul for businesses.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-01.jpg',
        dateAdded: new Date('2024-01-17'),
    },
    {
        id: 42,
        name: 'Samsung Business Monitor 27-inch',
        href: '#',
        price: '$249',
        priceValue: 249,
        originalPrice: 299,
        rating: 4.5,
        reviewCount: 89,
        category: 'objects',
        brand: 'samsung',
        partNumber: 'F27T450FQN',
        sku: 'MN1001',
        description: 'Full HD business monitor with adjustable stand and multiple connectivity options.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-02.jpg',
        dateAdded: new Date('2024-01-09'),
    },
    {
        id: 43,
        name: 'Fortinet Training Sweatshirt',
        href: '#',
        price: '$58',
        priceValue: 58,
        originalPrice: 72,
        rating: 4.2,
        reviewCount: 41,
        category: 'sweatshirts',
        brand: 'fortinet',
        partNumber: 'FTS001',
        sku: 'AP11001',
        description: 'Training-themed sweatshirt for Fortinet certification candidates and security professionals.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-03.jpg',
        dateAdded: new Date('2023-11-30'),
    },
    {
        id: 44,
        name: 'HP Elite Dragonfly Laptop',
        href: '#',
        price: '$1399',
        priceValue: 1399,
        originalPrice: 1599,
        rating: 4.7,
        reviewCount: 156,
        category: 'new-arrivals',
        brand: 'hp',
        partNumber: '9MZ21UT',
        sku: 'LT5001',
        description: 'Ultra-lightweight 13.3-inch business laptop with premium materials and security features.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-04.jpg',
        dateAdded: new Date('2024-01-21'),
    },
    {
        id: 45,
        name: 'Lenovo Casual Cargo Shorts',
        href: '#',
        price: '$45',
        priceValue: 45,
        rating: 4.0,
        reviewCount: 38,
        category: 'pants-shorts',
        brand: 'lenovo',
        partNumber: 'LCS001',
        sku: 'AP12001',
        description: 'Comfortable cargo shorts with multiple pockets and Lenovo branding.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-05.jpg',
        dateAdded: new Date('2023-10-18'),
    },
    {
        id: 46,
        name: 'APC Smart-UPS 3000VA Rack Mount',
        href: '#',
        price: '$850',
        priceValue: 850,
        originalPrice: 999,
        rating: 4.8,
        reviewCount: 134,
        category: 'new-arrivals',
        brand: 'apc',
        partNumber: 'SMT3000RM2U',
        sku: 'UPS6001',
        description: '2U rack-mountable UPS with LCD display and network management for server rooms.',
        imageSrc: 'https://tailwindcss.com/plus-assets/img/ecommerce-images/category-page-04-image-card-06.jpg',
        dateAdded: new Date('2024-01-06'),
    },
])

// Computed properties
const activeFilters = computed(() => {
    const active = []
    filters.value.forEach(section => {
        section.options.forEach(option => {
            if (option.checked) {
                active.push({
                    section: section.id,
                    value: option.value,
                    label: option.label
                })
            }
        })
    })
    return active
})

// Fix the filteredProducts computed to properly watch for price changes
const filteredProducts = computed(() => {
    let filtered = allProducts.value

    // Apply filters
    const activeCategory = filters.value.find(f => f.id === 'category')?.options.filter(o => o.checked).map(o => o.value) || []
    const activeBrands = filters.value.find(f => f.id === 'brands')?.options.filter(o => o.checked).map(o => o.value) || []

    if (activeCategory.length > 0) {
        filtered = filtered.filter(product => activeCategory.includes(product.category))
    }

    if (activeBrands.length > 0) {
        filtered = filtered.filter(product => activeBrands.includes(product.brand))
    }

    // Apply price range filter - ensure it's reactive
    const minPrice = Number(priceRange.value.currentMin) || 0
    const maxPrice = Number(priceRange.value.currentMax) || 1000
    
        filtered = filtered.filter(product => 
        product.priceValue >= minPrice && product.priceValue <= maxPrice
        )

    return filtered
})

const sortedProducts = computed(() => {
    const products = [...filteredProducts.value]
    
    switch (currentSort.value) {
        case 'rating':
            return products.sort((a, b) => b.rating - a.rating)
        case 'newest':
            return products.sort((a, b) => b.dateAdded - a.dateAdded)
        case 'price-asc':
            return products.sort((a, b) => a.priceValue - b.priceValue)
        case 'price-desc':
            return products.sort((a, b) => b.priceValue - a.priceValue)
        default: // popular
            return products.sort((a, b) => b.reviewCount - a.reviewCount)
    }
})

// Pagination computed properties
const totalPages = computed(() => {
    return Math.ceil(sortedProducts.value.length / itemsPerPage.value)
})

const paginatedProducts = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage.value
    const end = start + itemsPerPage.value
    return sortedProducts.value.slice(start, end)
})

const visiblePages = computed(() => {
    const pages = []
    const totalPageCount = totalPages.value
    const current = currentPage.value
    
    // Always show first page
    if (totalPageCount > 0) pages.push(1)
    
    // Show pages around current page
    const startPage = Math.max(2, current - 1)
    const endPage = Math.min(totalPageCount - 1, current + 1)
    
    // Add ellipsis if needed
    if (startPage > 2) pages.push('...')
    
    // Add pages around current
    for (let i = startPage; i <= endPage; i++) {
        if (i !== 1 && i !== totalPageCount) {
            pages.push(i)
        }
    }
    
    // Add ellipsis if needed
    if (endPage < totalPageCount - 1) pages.push('...')
    
    // Always show last page
    if (totalPageCount > 1) pages.push(totalPageCount)
    
    return pages
})

// Computed property for filtered brands
const filteredBrands = computed(() => {
    const brandsSection = filters.value.find(f => f.id === 'brands')
    if (!brandsSection) return []
    
    if (!brandSearchTerm.value.trim()) {
        return brandsSection.options
    }
    
    return brandsSection.options.filter(brand => 
        brand.label.toLowerCase().includes(brandSearchTerm.value.toLowerCase())
    )
})

// Add lifecycle hooks
onMounted(() => {
    // Set price range based on actual product prices
    const prices = allProducts.value.map(p => p.priceValue)
    priceRange.value.min = Math.min(...prices)
    priceRange.value.max = Math.max(...prices)
    priceRange.value.currentMin = priceRange.value.min
    priceRange.value.currentMax = priceRange.value.max
})

onUnmounted(() => {
    // No screen size related cleanup needed
})

// Functions
function openQuickView(product) {
    quickViewProduct.value = product
    quickViewOpen.value = true
}

function closeQuickView() {
    quickViewOpen.value = false
    quickViewProduct.value = null
}

function toggleFilter(sectionId, value) {
    const section = filters.value.find(f => f.id === sectionId)
    if (section) {
        const option = section.options.find(o => o.value === value)
        if (option) {
            option.checked = !option.checked
            resetPagination()
        }
    }
}

function removeFilter(sectionId, value) {
    toggleFilter(sectionId, value)
}

function clearAllFilters() {
    filters.value.forEach(section => {
        section.options.forEach(option => {
            option.checked = false
        })
    })
    priceRange.value.currentMin = priceRange.value.min
    priceRange.value.currentMax = priceRange.value.max
    resetPagination()
}

function getActiveFiltersCount(sectionId) {
    const section = filters.value.find(f => f.id === sectionId)
    return section ? section.options.filter(o => o.checked).length : 0
}

function sortProducts(sortValue) {
    currentSort.value = sortValue
    resetPagination()
}

// Fix the price filter functions
function updatePriceFilter() {
    // Ensure the values are numbers and within bounds
    if (priceRange.value.currentMin < priceRange.value.min) {
        priceRange.value.currentMin = priceRange.value.min
    }
    if (priceRange.value.currentMax > priceRange.value.max) {
        priceRange.value.currentMax = priceRange.value.max
    }
    if (priceRange.value.currentMin > priceRange.value.currentMax) {
        priceRange.value.currentMin = priceRange.value.currentMax
    }
    resetPagination()
}

function clearPriceFilter() {
    priceRange.value.currentMin = priceRange.value.min
    priceRange.value.currentMax = priceRange.value.max
    resetPagination()
}

// Add function to clear brand search
function clearBrandSearch() {
    brandSearchTerm.value = ''
}

// Pagination functions
function goToPage(page) {
    if (page >= 1 && page <= totalPages.value) {
        currentPage.value = page
        // Scroll to top of products section
        document.getElementById('products-heading')?.scrollIntoView({ behavior: 'smooth' })
    }
}

function nextPage() {
    if (currentPage.value < totalPages.value) {
        goToPage(currentPage.value + 1)
    }
}

function prevPage() {
    if (currentPage.value > 1) {
        goToPage(currentPage.value - 1)
    }
}

// Reset to first page when filters change
function resetPagination() {
    currentPage.value = 1
}
</script>