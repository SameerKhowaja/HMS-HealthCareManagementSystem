const hamburger = document.querySelectorAll('.hamburger')
const sideNav = document.querySelector('.sideNav')
const main = document.querySelector('main')

// nav toggle
hamburger.forEach((e) => (e.addEventListener('click', () => {sideNav.classList.toggle('show'); main.classList.toggle('hide')})))
 


