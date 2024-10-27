<template>
    <div class="carousel">
      <!-- <button @click="prevSlide" class="carousel-btn prev-btn">&lt;</button> -->
      <div class="carousel-slides" :style="{ transform: `translateX(-${currentIndex * 100}%)` }">
        <div v-for="(slide, index) in images" :key="index" class="carousel-slide">
          <img :src="slide" alt="Slide Image" />
        </div>
      </div>
      <div class="loading-bar" :style="{ width: `${loadingProgress}%` }"></div>
      <!-- <button @click="nextSlide" class="carousel-btn next-btn">&gt;</button> -->
    </div>
  </template>
  
  <script>
  export default {
    // name: 'Carousel',
    props: {
      images: {
        type: Array,
        required: true,
        default: () => [], // parameter
      },
      autoSlideInterval: {
        type: Number,
        default: 3000,
        },
    },
    data() {
      return {
        currentIndex: 0,
        loadingProgress: 0,
      };
    },
    methods: {
      nextSlide() {
        this.currentIndex = (this.currentIndex + 1) % this.images.length;
      },
      prevSlide() {
        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
      },
    },
    mounted() {
        // Auto-slide dengan interval dan loading bar
        this.autoSlideTimer = setInterval(() => {
            this.nextSlide();
        }, this.autoSlideInterval);

        this.loadingBarTimer = setInterval(() => {
            this.loadingProgress += 100 / (this.autoSlideInterval / 100);
            if (this.loadingProgress >= 100) {
                this.loadingProgress = 0;
            }
        }, 100);
    },
    beforeUnmount() {
        clearInterval(this.autoSlideTimer);
        clearInterval(this.loadingBarTimer);
    },
  };
  </script>
  
  <style scoped>
  .carousel {
    position: relative;
    overflow: hidden;
    width: 100%;
    max-width: 600px;
    margin: auto;
  }
  .carousel-slides {
    display: flex;
    transition: transform 0.5s ease;
  }
  .carousel-slide {
    min-width: 100%;
    transition: 0.5s;
  }
  .carousel-slide img {
    width: 100%;
    display: block;
  }
  .carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 18px;
  }
  .prev-btn {
    left: 10px;
  }
  .next-btn {
    right: 10px;
  }
  .loading-bar {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 5px;
    background-color: #007bff;
    transition: width 0.1s linear;
   }
  </style>
  