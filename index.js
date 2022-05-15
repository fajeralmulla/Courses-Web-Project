/*const sideMenu= document.querySelector("aside");
const menuBtn = document.quertSelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");

menuBtn.addEventListener('click', ()=>{
    sideMenu.style.display= 'block';
})

closeBtn.addEventListener('click', ()=>{
    sideMenu.style.display= 'none';

})
*/
const themeToggler = document.querySelector(".theme-toggler");

//Change Theme

themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');

})
