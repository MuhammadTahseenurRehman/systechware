<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | Systechware</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Tailwind CSS v4 -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div id="app">
            <header-component></header-component>
            
            <!-- Homepage content -->
            <main class="bg-white">
                <!-- Dynamic Banner with Slider -->
                <dynamic-banner 
                    title="Top 100+ Deals everyone's eyeing"
                    subtitle="Hotter-than-hot savings"
                    button-text="Shop Deals"
                    brand-name="Systechware"
                    deal-text="DEALS"
                    time-text="OCT. 7-12 ONLY!"
                    :products="[
                        {
                            name: 'Gaming Laptop',
                            description: 'High-performance gaming laptop with advanced graphics'
                        },
                        {
                            name: 'Handheld Console', 
                            description: 'Portable gaming device with premium features'
                        },
                        {
                            name: 'Gaming Headset',
                            description: 'Professional gaming headset with noise cancellation'
                        }
                    ]">
                </dynamic-banner>

                <!-- Shop All Deals Section - White Background -->
                <section class="bg-white py-4">
                    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-12">
                        <!-- Section Header -->
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 gap-4">
                            <div>
                                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-website-heading">Shop all Deals</h2>
                                <p class="text-gray-600 text-sm mt-1">Up to 50% off</p>
                            </div>
                            <a href="#" class="text-blue-600 hover:text-blue-800 font-medium text-sm sm:text-base cursor-pointer" style="color: #0053e2;">View all</a>
                        </div>
                        
                        <!-- Product Grid -->
                        <product-grid :products="[
                            {
                                currentPrice: '$399.99',
                                originalPrice: '$499.99',
                                name: 'HP Laptop 14-inch with Software Bundle',
                                buttonText: 'Add'
                            },
                            {
                                currentPrice: '$129.99',
                                originalPrice: '$179.99',
                                name: 'Rachael Ray 15-Piece Cookware Set',
                                buttonText: 'Add'
                            },
                            {
                                currentPrice: '$299.99',
                                originalPrice: '$399.99',
                                name: 'Sportspower Swing Set with FREE Anchor Kit',
                                buttonText: '+ Add'
                            },
                            {
                                currentPrice: '$24.99',
                                originalPrice: '$39.99',
                                name: 'Amy & Annette Gold Hoop Earrings',
                                buttonText: '+ Add'
                            },
                            {
                                currentPrice: '$89.99',
                                originalPrice: '$129.99',
                                name: 'ieGeek Solar Security Camera',
                                buttonText: '+ Add'
                            },
                            {
                                currentPrice: '$19.99',
                                originalPrice: '$29.99',
                                name: 'Armor All Car Cleaning Kit 8-Piece',
                                buttonText: '+ Add'
                            }
                        ]">
                        </product-grid>
                    </div>
                </section>

                <!-- Deals Grid Section -->
                <deals-grid></deals-grid>

                <!-- Category Grid Section -->
                <category-grid></category-grid>

                <!-- Promotional Section -->
                <promotional-section></promotional-section>

            </main>
            <footer-component></footer-component>
        </div>
        
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>