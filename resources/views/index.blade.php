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

                <!-- Shop All Deals Section -->
                <deals-section 
                    title="Shop all Deals"
                    subtitle="Up to 50% off"
                    :products="[
                        {
                            currentPrice: '$399.99',
                            originalPrice: '$499.99',
                            name: 'HP Laptop 14-inch with Software Bundle',
                            buttonText: 'Add',
                            image: 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$129.99',
                            originalPrice: '$179.99',
                            name: 'Rachael Ray 15-Piece Cookware Set',
                            buttonText: 'Add',
                            image: 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$299.99',
                            originalPrice: '$399.99',
                            name: 'Sportspower Swing Set with FREE Anchor Kit',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$24.99',
                            originalPrice: '$39.99',
                            name: 'Amy & Annette Gold Hoop Earrings',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$89.99',
                            originalPrice: '$129.99',
                            name: 'ieGeek Solar Security Camera',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1557324232-b8917d3c3dcb?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$19.99',
                            originalPrice: '$29.99',
                            name: 'Armor All Car Cleaning Kit 8-Piece',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1607860108855-64acf2078ed9?w=300&h=300&fit=crop&crop=center'
                        }
                    ]">
                </deals-section>

                <!-- Deals Grid Section -->
                <deals-grid></deals-grid>

                <!-- Category Grid Section -->
                <category-grid
                    title="Shop by Category"
                    view-all-text="View all"
                    :categories="[
                        {
                            name: 'Networking',
                            link: '/category/networking',
                            image: 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Servers',
                            link: '/category/servers',
                            image: 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Data Storage',
                            link: '/category/data-storage',
                            image: 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Computers',
                            link: '/category/computers',
                            image: 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Monitors',
                            link: '/category/monitors',
                            image: 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Batteries',
                            link: '/category/batteries',
                            image: 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Power Supplies',
                            link: '/category/power-supplies',
                            image: 'https://images.unsplash.com/photo-1464983953574-0892a716854b?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Cables',
                            link: '/category/cables',
                            image: 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Printers',
                            link: '/category/printers',
                            image: 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Scanners',
                            link: '/category/scanners',
                            image: 'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Telecom',
                            link: '/category/telecom',
                            image: 'https://images.unsplash.com/photo-1465101046530-73398c7f28ca?w=200&h=200&fit=crop&crop=center'
                        }
                    ]"
                >
                </category-grid>

                <!-- Promotional Section -->
                <promotional-section></promotional-section>
                
                <category-grid 
                    title="Get it all right here"
                    view-all-text="View all"
                    :categories="[
                        {
                            name: 'Grocery',
                            link: '/category/grocery',
                            image: 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Home',
                            link: '/category/home',
                            image: 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Patio & Garden',
                            link: '/category/patio-garden',
                            image: 'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Fashion',
                            link: '/category/fashion',
                            image: 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Tech',
                            link: '/category/tech',
                            image: 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Baby',
                            link: '/category/baby',
                            image: 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Toys',
                            link: '/category/toys',
                            image: 'https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Health & wellness',
                            link: '/category/health-wellness',
                            image: 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Personal Care',
                            link: '/category/personal-care',
                            image: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Beauty',
                            link: '/category/beauty',
                            image: 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=200&h=200&fit=crop&crop=center'
                        },
                        {
                            name: 'Auto & tires',
                            link: '/category/auto-tires',
                            image: 'https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=200&h=200&fit=crop&crop=center'
                        }
                    ]">
                </category-grid>

                <!-- Flash Deals Section -->
                <deals-section 
                    title="Flash Deals"
                    subtitle="Up to 65% off"
                    :products="[
                        {
                            currentPrice: '$29.93',
                            originalPrice: '$49.99',
                            name: '245XL Ink Cartridges for Canon Ink 245 and 246 for PIXMA MG2522',
                            buttonText: '+ Add',
                            badge: 'Reduced price',
                            image: 'https://images.unsplash.com/photo-1612815154858-60aa4c59eaa6?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$33.70',
                            originalPrice: '$83.00',
                            name: 'Calvin Klein CK One Eau De Toilette Spray, Unisex Perfume, 6.7 oz',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1541643600914-78b084683601?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$9.89',
                            originalPrice: null,
                            name: 'TRANSLINK Duffle Bag for Women Lightweight Carry On Backpack',
                            buttonText: '+ Add',
                            badge: '32L',
                            image: 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$188.99',
                            originalPrice: '$289.99',
                            name: 'OLAKIDS 12V Licensed Lamborghini Sian Kids Ride On Car with Parent',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$13.99',
                            originalPrice: '$25.99',
                            name: 'PatPat Baby Girl Clothes Long Sleeve Romper Unicorn Print Pants',
                            buttonText: '+ Add',
                            badge: 'Clearance',
                            image: 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$36.49',
                            originalPrice: '$59.98',
                            name: 'EVALESS Womens Plaid Shacket Jacket Casual Long Sleeve Button',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1544966503-7cc3bb5891d5?w=300&h=300&fit=crop&crop=center'
                        }
                    ]">
                </deals-section>

                <!-- Divider -->
                <div class="border-t border-gray-200 my-8"></div>

                <!-- Best Sellers Section -->
                <deals-section 
                    title="Best Sellers"
                    subtitle="Top rated products"
                    :products="[
                        {
                            currentPrice: '$199.99',
                            originalPrice: '$299.99',
                            name: 'Apple AirPods Pro with Active Noise Cancellation',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$89.99',
                            originalPrice: '$129.99',
                            name: 'Samsung Galaxy Watch 6 Classic Smartwatch',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$149.99',
                            originalPrice: '$199.99',
                            name: 'Nintendo Switch OLED Console with Neon Joy-Con',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1578303512597-81e6cc155b3e?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$79.99',
                            originalPrice: '$119.99',
                            name: 'Sony WH-1000XM4 Wireless Noise Canceling Headphones',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$299.99',
                            originalPrice: '$399.99',
                            name: 'Dyson V15 Detect Cordless Vacuum Cleaner',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1527515637462-cff94eecc1ac?w=300&h=300&fit=crop&crop=center'
                        },
                        {
                            currentPrice: '$49.99',
                            originalPrice: '$79.99',
                            name: 'Instant Pot Duo 7-in-1 Electric Pressure Cooker',
                            buttonText: '+ Add',
                            image: 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=300&h=300&fit=crop&crop=center'
                        }
                    ]">
                </deals-section>

                <!-- Promotional Cards Section -->
                <promotional-cards 
                    :cards="{
                        left: {
                            title: '5% cash back at Multiple Networks',
                            subtitle: 'Multiple Networks + members earn',
                            buttonText: 'Learn more',
                            image: 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=400&h=500&fit=crop&crop=center',
                            badge: null
                        },
                        middleTop: {
                            title: 'Insulin, GLP-1s & more',
                            description: 'New! Now delivering refrigerated Rx.',
                            buttonText: 'Learn more',
                            image: 'https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=200&h=200&fit=crop&crop=center',
                            finePrint: 'Delivery not available for all medications. Exclusions apply. Actual delivery package may differ.'
                        },
                        middleBottomLeft: {
                            title: 'Fall yard cleanup services',
                            buttonText: 'Schedule now',
                            image: 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=300&h=200&fit=crop&crop=center'
                        },
                        middleBottomRight: {
                            title: 'Book same-day vaccines',
                            buttonText: 'Schedule now',
                            image: 'https://images.unsplash.com/photo-1629362058314-eaaddfefd618?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
                        },
                        right: {
                            title: 'Must-have tech in as fast as 1 hour*',
                            subtitle: 'Upgrade on the fly',
                            buttonText: 'Shop now',
                            image: 'https://images.unsplash.com/photo-1593305841991-05c297ba4575?w=400&h=500&fit=crop&crop=center',
                            badge: 'Express Delivery'
                        }
                    }">
                </promotional-cards>

            </main>
            <footer-component></footer-component>
        </div>
        
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>