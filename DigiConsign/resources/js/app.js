import { createApp } from 'vue';
import Carousel from './components/Carousel.vue';
import Navbar from './components/Navbar.vue';

const app = createApp({});
app.component('navbar', Navbar);
app.component('carousel-component', Carousel);
app.mount('#app');