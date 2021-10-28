<?php
$uri = service('uri')->getSegments();
$uri1 = service('uri')->getSegment(1);

$uri4 = $uri[1] ?? '';
$uri3 = $uri[3] ?? '';
?>

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="http://www.ziz.ma/"><img src="/assets/images/logo/logo_ziz.jpeg" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title text-center"><?php print_r(user()->username);  ?> <br> <span class="text-primary"><?php print_r(user()->roles[array_key_first(user()->roles)]); ?></span> </li>
                
                <li class="sidebar-item <?= ($uri1 == '') ? 'active' : '' ?> ">
                    <a href="/" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'Recettes') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-gas-pump"></i>                        
                        <span>Recettes</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'Recettes') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri4 == 'nouvelle_recette') ? 'active' : '' ?>">
                            <a href="/Recettes/nouvelle_recette">Nouvelle Recette</a>
                        </li>
                        <li class="submenu-item <?= ($uri4 == 'Liste') ? 'active' : '' ?>">
                            <a href="/Recettes/Liste">Recettes</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'Configuration') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-tools"></i>
                        <span>Configuration</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'Configuration') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri4 == 'Utilisateurs') ? 'active' : '' ?>">
                            <a href="/Configuration/Utilisateurs">Utilisateurs</a>
                        </li>
                        <li class="submenu-item <?= ($uri4 == 'Stations') ? 'active' : '' ?>">
                            <a href="/Configuration/Stations">Stations</a>
                        </li>
                        <li class="submenu-item <?= ($uri4 == 'Produits') ? 'active' : '' ?>">
                            <a href="/Configuration/Produits">Produits</a>
                        </li>
                        <li class="submenu-item <?= ($uri4 == 'Pompes') ? 'active' : '' ?>">
                            <a href="/Configuration/Pompes">Pompes</a>
                        </li>
                        <li class="submenu-item <?= ($uri4 == 'Reservoirs') ? 'active' : '' ?>">
                            <a href="/Configuration/Reservoirs">Reservoirs</a>
                        </li>
                        <li class="submenu-item <?= ($uri4 == 'Moyens') ? 'active' : '' ?>">
                            <a href="/Configuration/Moyens">Moyens Paiement</a>
                        </li>
                        <li class="submenu-item <?= ($uri4 == 'Clients') ? 'active' : '' ?>">
                            <a href="/Configuration/Clients">Clients</a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="sidebar-item <?= ($uri1 == 'volucompteurs') ? 'active' : '' ?> ">
                    <a href="/nouvelle_recette" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Nouvelle Recette</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'articles') ? 'active' : '' ?> ">
                    <a href="/articles" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Recettes</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'articles') ? 'active' : '' ?> ">
                    <a href="/Stations" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Stations</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'articles') ? 'active' : '' ?> ">
                    <a href="/Produits" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Produits</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'articles') ? 'active' : '' ?> ">
                    <a href="/Pompes" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Pompes</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'articles') ? 'active' : '' ?> ">
                    <a href="/Reservoirs" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Reservoirs</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'articles') ? 'active' : '' ?> ">
                    <a href="/Moyens" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Moyens Paiement</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'articles') ? 'active' : '' ?> ">
                    <a href="/Clients" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Clients</span>
                    </a>
                </li> -->
                <li class="sidebar-item  ">
                    <a href="http://www.skatys.com/" class='sidebar-link'>
                        <i class="fas fa-info-circle"></i>
                        <span>Contact</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="/logout" class='sidebar-link'>
                    <i class="fas fa-sign-out-alt"></i>
                        <span>Se déconnecter</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
