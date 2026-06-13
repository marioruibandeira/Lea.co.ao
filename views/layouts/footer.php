<!-- =============================================
     FOOTER — ambos os layouts
     FIX: padding-bottom em mobile para não ficar
     atrás da bottom nav
     ============================================= -->
<footer class="lea-footer py-3 px-4">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div class="footer-brand d-flex align-items-center gap-2">
            <img src="/assets/img/logo.png" alt="LEA" height="24">
            <small class="text-muted fw-normal" style="font-size:11px;">© 2017–2026</small>
        </div>
        <div class="d-flex gap-3 flex-wrap">
            <a class="footer-link" href="https://lea.co.ao/sobre-nos/">Sobre nós</a>
            <a class="footer-link" href="https://lea.co.ao/sobre-nos/contactos.php">Contactos</a>
            <a class="footer-link" href="https://lea.co.ao/sobre-nos/politica-privacidade.php">Privacidade</a>
            <a class="footer-link" href="https://lea.co.ao/sobre-nos/termos-servicos.php">Termos</a>
            <a class="footer-link" href="https://lea.co.ao/loja/publicidades.php">Publicitar</a>
            <a class="footer-link" href="https://lea.co.ao/sobre-nos/exclusao-dados.php">Exclusão de Dados</a>
            <a class="footer-link" href="https://www.mincult.gov.ao/">Ministério da Cultura</a>
            <a class="footer-link" href="https://www.lea.co.ao/nasocial/">Nasocial</a>
        </div>
        <div class="d-flex gap-3">
            <a class="footer-social" href="https://www.instagram.com/lea.co.ao/"><i class="ti ti-brand-instagram"></i></a>
            <a class="footer-social" href="https://www.facebook.com/profile.php?id=61585709784761"><i class="ti ti-brand-facebook"></i></a>
            <a class="footer-social" href="https://www.youtube.com/channel/UC08rYMm8gs4KVmS0qpUI-Aw"><i class="ti ti-brand-youtube"></i></a>
            <a class="footer-social" href="https://wa.me/351926935606"><i class="ti ti-brand-whatsapp"></i></a>
            <a class="footer-social" href="https://t.me/Leanoticia"><i class="ti ti-brand-telegram"></i></a>
        </div>
    </div>
</footer>


<!-- =============================================
     BOTTOM NAV MOBILE
     ============================================= -->
<nav class="bottom-nav" id="bottomNav">
    <a class="bnav-item active" href="/">
        <i class="ti ti-home"></i>
        <span class="bnav-lbl">Início</span>
    </a>
    <a class="bnav-item" href="https://lea.co.ao/artistas/">
        <i class="ti ti-users"></i>
        <span class="bnav-lbl">Artistas</span>
    </a>
    <a class="bnav-item" href="https://lea.co.ao/discografia.php?dsco=1">
        <i class="ti ti-music"></i>
        <span class="bnav-lbl">Músicas</span>
    </a>
    <a class="bnav-item" href="https://lea.co.ao/loja/">
        <i class="ti ti-shopping-bag"></i>
        <span class="bnav-lbl">Loja</span>
    </a>
    <button class="bnav-item" id="btnOpenMenu" style="background:none;border:none;">
        <i class="ti ti-menu-2"></i>
        <span class="bnav-lbl">Menu</span>
    </button>
</nav>


<!-- =============================================
     MENU DRAWER MOBILE
     Abre ao clicar "Menu" na bottom nav
     ============================================= -->
<div class="menu-drawer" id="menuDrawer">
    <div class="menu-overlay" id="menuOverlay"></div>
    <div class="menu-panel">

        <div class="menu-handle"></div>

        <div class="menu-header">
            <span class="menu-header-title">Menu</span>
            <button class="btn-close-menu" id="btnCloseMenu">
                <i class="ti ti-x"></i>
            </button>
        </div>

        <!-- Páginas principais -->
        <div class="menu-section-title">Navegar</div>
        <a class="menu-item" href="/">
            <i class="ti ti-home"></i>
            <div><div class="menu-item-label">Início</div><div class="menu-item-sub">Página principal do LEA</div></div>
        </a>
        <a class="menu-item" href="https://lea.co.ao/artistas/">
            <i class="ti ti-users"></i>
            <div><div class="menu-item-label">Artistas</div><div class="menu-item-sub">2.200+ artistas angolanos</div></div>
        </a>
        <a class="menu-item" href="https://lea.co.ao/discografia.php?dsco=1">
            <i class="ti ti-music"></i>
            <div><div class="menu-item-label">Músicas</div><div class="menu-item-sub">Ouve e descarrega</div></div>
        </a>
        <a class="menu-item" href="https://lea.co.ao/videos.php?clipes=true">
            <i class="ti ti-video"></i>
            <div><div class="menu-item-label">Vídeos</div><div class="menu-item-sub">Clipes, filmes e séries</div></div>
        </a>
        <a class="menu-item" href="https://lea.co.ao/downloads/todos-livros.php?strt=0&acc=1">
            <i class="ti ti-book"></i>
            <div><div class="menu-item-label">Literatura</div><div class="menu-item-sub">Livros, poesias e frases</div></div>
        </a>
        <a class="menu-item" href="https://lea.co.ao/noticia.php">
            <i class="ti ti-news"></i>
            <div><div class="menu-item-label">Notícias</div><div class="menu-item-sub">Angola em dia</div></div>
        </a>
        <a class="menu-item" href="https://lea.co.ao/agenda/agenda.php?strt=0">
            <i class="ti ti-calendar-event"></i>
            <div><div class="menu-item-label">Eventos</div><div class="menu-item-sub">Agenda cultural angolana</div></div>
        </a>
        <a class="menu-item" href="https://lea.co.ao/loja/">
            <i class="ti ti-shopping-bag"></i>
            <div><div class="menu-item-label">Loja</div><div class="menu-item-sub">Livros, CDs, ingressos e mais</div></div>
        </a>

        <!-- Conta -->
        <div class="menu-section-title">Conta</div>
        <a class="menu-item" href="https://www.lea.co.ao/nasocial/">
            <i class="ti ti-user-circle"></i>
            <div><div class="menu-item-label">Entrar</div><div class="menu-item-sub">Aceder à minha conta</div></div>
        </a>
        <a class="menu-item" href="/loja/certificacao/">
            <i class="ti ti-rosette-discount-check"></i>
            <div><div class="menu-item-label">Certificar artista</div><div class="menu-item-sub">Destaca-te na plataforma</div></div>
        </a>

        <!-- Redes sociais -->
        <div class="menu-section-title">Redes sociais</div>
        <div class="menu-social">
            <a href="https://www.instagram.com/lea.co.ao/"><i class="ti ti-brand-instagram"></i></a>
            <a href="https://www.facebook.com/profile.php?id=61585709784761"><i class="ti ti-brand-facebook"></i></a>
            <a href="https://www.youtube.com/channel/UC08rYMm8gs4KVmS0qpUI-Aw"><i class="ti ti-brand-youtube"></i></a>
            <a href="https://wa.me/351926935606"><i class="ti ti-brand-whatsapp"></i></a>
            <a href="https://t.me/Leanoticia"><i class="ti ti-brand-telegram"></i></a>
        </div>

        <a href="https://lea.co.ao/nasocial/login/login.php" class="btn-menu-entrar">Entrar na minha conta</a>

    </div>
</div>


<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/main.links.js"></script>

<script>
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
</script>

</body>
</html>
