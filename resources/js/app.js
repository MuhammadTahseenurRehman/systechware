require('./bootstrap');

import { createApp } from 'vue';

// Import your Vue components here
import Logo from './components/logo.vue';
import Header from './components/header.vue';
import Footer from './components/footer.vue';
import ProductList from './components/products/productList.vue';
import ProductDetail from './components/products/productDetail.vue';
import Checkout from './components/products/checkout.vue';
import Cart from './components/products/cart.vue';
import Features from './components/features.vue';
import ProductByCatagory from './components/products/product-by-catagory.vue';
import QuickViewModal from './components/modals/quick-view-modal.vue';
import Newsletter from './components/newsletter.vue';
import TrustedPartners from './components/trusted-pertners.vue';
import TrendingProducts from './components/products/trending-products.vue';

const app = createApp({
    // Your Vue app configuration
});

// Register components globally
app.component('logo-component', Logo);
app.component('header-component', Header);
app.component('footer-component', Footer);
app.component('product-list', ProductList);
app.component('product-detail', ProductDetail);
app.component('checkout-component', Checkout);
app.component('cart-component', Cart);
app.component('feature-component', Features);
app.component('product-by-catagory', ProductByCatagory);
app.component('quick-view-modal', QuickViewModal);
app.component('newsletter-component', Newsletter);
app.component('trusted-partners', TrustedPartners);
app.component('trending-products', TrendingProducts);

// Mount the Vue app to the DOM
app.mount('#app');
