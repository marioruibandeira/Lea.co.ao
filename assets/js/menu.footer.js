 //
 const drawer  = document.getElementById('menuDrawer');
 const overlay = document.getElementById('menuOverlay');
 const btnOpen = document.getElementById('btnOpenMenu');
 const btnClose = document.getElementById('btnCloseMenu');

 function openMenu() {
    drawer.classList.add('open');
    document.body.style.overflow = 'hidden';
 }
 
 function closeMenu() {
    drawer.classList.remove('open');
    document.body.style.overflow = '';
 }

btnOpen.addEventListener('click', openMenu);
btnClose.addEventListener('click', closeMenu);
overlay.addEventListener('click', closeMenu);

// Fechar ao clicar em qualquer link do menu
drawer.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', closeMenu);
});