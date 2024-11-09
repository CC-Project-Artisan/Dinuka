
    document.addEventListener('DOMContentLoaded', function () {
        
        const carouselElement = document.querySelector('#customCarousel');
        const carousel = new bootstrap.Carousel(carouselElement, {
            interval: 4000, 
            ride: 'carousel'
        });

        
        carouselElement.addEventListener('mouseenter', () => {
            carousel.pause();
        });

        
        carouselElement.addEventListener('mouseleave', () => {
            carousel.cycle();
        });

        
        const indicators = carouselElement.querySelectorAll('.carousel-indicators button');
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                carousel.to(index); 
                carousel.pause(); 
                setTimeout(() => {
                    carousel.cycle(); 
                }, 4000); 
            });
        });

        
        const prevControl = carouselElement.querySelector('.carousel-control-prev');
        const nextControl = carouselElement.querySelector('.carousel-control-next');

        prevControl.addEventListener('click', () => {
            carousel.prev(); 
            carousel.pause(); 
            setTimeout(() => {
                carousel.cycle(); 
            }, 4000); 
        });

        nextControl.addEventListener('click', () => {
            carousel.next(); 
            carousel.pause(); 
            setTimeout(() => {
                carousel.cycle(); 
            }, 4000); 
        });
    });
