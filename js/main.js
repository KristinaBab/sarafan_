function openNav() {
    document.getElementById("mySidenav").style.width = "500px";
    document.getElementById("main").style.marginRight = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginRight= "0";
}
// // Получаем все слайдеры на странице
// const sliders = Array.from(document.querySelectorAll('.slider'));

// // Для каждого слайдера
// sliders.forEach(slider => {
//    const sliderId = slider.dataset.sliderId;
//    const prevButton = document.querySelector(`.prev-button[data-slider-id="${sliderId}"]`);
//    const nextButton = document.querySelector(`.next-button[data-slider-id="${sliderId}"]`);
//    const slides = Array.from(slider.querySelector('img'));
//    const slideCount = slides.length;
//    let slideIndex = 0;

//    // Устанавливаем обработчики событий для кнопок
//    prevButton.addEventListener('click', showPreviousSlide);
//    nextButton.addEventListener('click', showNextSlide);

//    // Функция для показа предыдущего слайда
//    function showPreviousSlide() {
//       slideIndex = (slideIndex - 1 + slideCount) % slideCount;
//       updateSlider();
//    }

//    // Функция для показа следующего слайда
//    function showNextSlide() {
//       slideIndex = (slideIndex + 1) % slideCount;
//       updateSlider();
//    }


//    // Функция для обновления отображения слайдера
//    function updateSlider() {
//       slides.forEach((slide, index) => {
//          if (index === slideIndex) {
//             slide.style.display = 'block';
//          } else {
//             slide.style.display = 'none';
//          }
//       });
//    }
   

//    // Инициализация слайдера
//    updateSlider();
// });
document.addEventListener('DOMContentLoaded', function() {
   const sliders = Array.from(document.querySelectorAll('.slider'));
 
   sliders.forEach(slider => {
     const slides = Array.from(slider.querySelectorAll('.slide'));
     let slideIndex = 0;
 
     function showSlide(n) {
       slides.forEach(slide => slide.style.display = 'none');
       slides[n].style.display = 'block';
     }
 
     function showNextSlide() {
       if (slideIndex < slides.length - 1) {
         slideIndex++;
       } else {
         slideIndex = 0;
       }
       showSlide(slideIndex);
     }
 
     function showPreviousSlide() {
       if (slideIndex > 0) {
         slideIndex--;
       } else {
         slideIndex = slides.length - 1;
       }
       showSlide(slideIndex);
     }
 
     const prevButton = slider.querySelector('.prev-button');
     const nextButton = slider.querySelector('.next-button');
 
     if (prevButton && nextButton) {
       prevButton.addEventListener('click', showPreviousSlide);
       nextButton.addEventListener('click', showNextSlide);
     }
 
     showSlide(slideIndex);
   });
 });
 