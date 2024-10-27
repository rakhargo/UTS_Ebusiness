import { createApp } from 'vue';
import Carousel from './components/Carousel.vue';

const app = createApp({});
app.component('carousel-component', Carousel);
app.mount('#app');