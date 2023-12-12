const showMore = document.querySelector('.btn__catalog');
const productsLength = document.querySelectorAll('.products__block__catalog').length;
let items = 8;

showMore.addEventListener('click', ()=>{
items += 3;
const array = Array.from(document.querySelector('.products__wrapper__catalog').children);
const visItems = array.slice(0,items);


visItems.forEach(el => el.classList.add('is-visible'));

if(visItems.length === productsLength){
    showMore.style.display = 'none';
}
});