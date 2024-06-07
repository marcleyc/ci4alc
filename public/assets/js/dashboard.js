const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    const li = item.parentElement;
    item.addEventListener('click', () => {
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })
});

const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => { sideBar.classList.toggle('close'); });

document.addEventListener('DOMContentLoaded', function() {
    sideBar.classList.toggle('close'); ;
});

const searchBtn = document.querySelector('.content nav form .form-input button');
const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
const searchForm = document.querySelector('.content nav form');

searchBtn.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault;
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {searchBtnIcon.classList.replace('bx-search', 'bx-x');} 
        else {searchBtnIcon.classList.replace('bx-x', 'bx-search');}
    }
});

window.addEventListener('resize', () => {
    if (window.innerWidth < 768) { sideBar.classList.add('close');} 
    else { sideBar.classList.remove('close'); }
    if (window.innerWidth > 576) {
        searchBtnIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
});

const toggler = document.getElementById('theme-toggle');
toggler.addEventListener('change', function () {
    if (this.checked) {document.body.classList.add('dark');} 
    else {document.body.classList.remove('dark');}
});

// pega dados da api do euro e joga na tela
const eur = document.getElementById('euro');
apiUrl = "https://economia.awesomeapi.com.br/last/EUR-BRL";
fetch(apiUrl)
  .then(response => response.json())
  //.then(data => { console.log(data.EURBRL.high);})
  .then(data => { eur.innerHTML= data.EURBRL.high;})
  .catch(error => { console.error('Erro:', error); }); 
  
/* sublink do menu lateral  
  function toggleSubmenu() {
    var sublinksContainer = document.getElementById('sublinks');
    sublinksContainer.classList.toggle('show');
}
*/

function toggleSubmenu(event) {
    var submenu = event.target.parentNode.querySelector('.submenu');
    //submenu.classList.toggle('open');
}

function newFamily() { 
    var urls = "/clientesa/" + 20; 
    window.location.href = urls; 
}

function financeiroAR() { 
    var urls = "/financeiroar/"; 
    window.location.href = urls; 
}

function tramitando() { 
    var urls = "/tramitando/"; 
    window.location.href = urls; 
}

    