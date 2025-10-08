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
                <!-- Home banner section -->
                <section aria-labelledby="cause-heading">
                    <div class="relative flex items-center h-75 md:h-[calc(100vh-170px)] bg-gray-800 px-6 sm:px-12 lg:px-16">
                        <div class="absolute inset-0 overflow-hidden">
                            <img src="https://www.systechware.com/images/home-icons/home-banner.png" alt="" class="size-full object-cover" />
                        </div>
                        <div class="relative flex max-w-xl flex-col items-start text-left">
                            <h1 id="banner-heading" class="text-lg md:text-3xl font-bold tracking-tight text-white sm:text-4xl">Power Your Productivity</h1>
                            <p class="mt-3 text-medium md:text-xl text-white">Upgrade your home or office with unbeatable deals on laptops, monitors, and accessories. Up to 30% off top brands!</p>
                            <a href="#" class="mt-8 block w-auto     rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-website-heading hover:bg-gray-100">Shop The Sale</a>
                        </div>
                    </div>
                </section>

                <feature-component></feature-component>
                <product-by-catagory></product-by-catagory>
                
                <trusted-partners></trusted-partners>

                <trending-products></trending-products>

                 <!-- Featured section -->
                <section aria-labelledby="cause-heading">
                    <div class="relative bg-gray-800 px-6 py-32 sm:px-12 sm:py-40 lg:px-16">
                        <div class="absolute inset-0 overflow-hidden">
                            <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/home-page-03-feature-section-full-width.jpg" alt="" class="size-full object-cover" />
                        </div>
                        <div aria-hidden="true" class="absolute inset-0 bg-website-heading/50"></div>
                        <div class="relative mx-auto flex max-w-3xl flex-col items-center text-center">
                            <h2 id="cause-heading" class="text-lg md:text-3xl font-bold tracking-tight text-white sm:text-4xl">Connect with an Expert Today</h2>
                            <p class="mt-3 text-medium md:text-xl text-white">Get in touch with our experts! Let us know what technological challenges you’re facing or what you need, and we’ll work together to find the best solutions for your requirements. Your success is our priority!</p>
                            <a href="#" class="mt-8 block w-full rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-website-heading hover:bg-gray-100 sm:w-auto">Request</a>
                        </div>
                    </div>
                </section>
            </main>
            <footer-component></footer-component>
        </div>
        
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>