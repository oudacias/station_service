<?php
$uri = service('uri')->getSegments();
$uri1 = service('uri')->getSegment(1);
//$uri1 = $uri[1] ?? 'index';
//$uri1 = service('uri')->getPath();
$uri2 = $uri[2] ?? '';
$uri3 = $uri[3] ?? '';
?>

<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu <?php echo $uri1; ?></li>
                
                <li class="sidebar-item <?= ($uri1 == 'dashboard') ? 'active' : '' ?> ">
                    <a href="/dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if(in_groups(['admin',''])){
                    ?>
                <li class="sidebar-item <?= ($uri1 == 'newuser') ? 'active' : '' ?> ">
                    <a href="/newuser" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Créer un Utilisateur</span>
                </a>
            </li><?php
        } ?>
                <li class="sidebar-item <?= ($uri1 == 'Recettes') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-gas-pump"></i>                        
                        <span>Recettes</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'Recettes') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'nouvelle_recette') ? 'active' : '' ?>">
                            <a href="/Recettes/nouvelle_recette">Nouvelle Recette</a>
                        </li>
                        <li class="submenu-item <?= ($uri3 == 'apexcharts') ? 'active' : '' ?>">
                            <a href="/mazer/ui/charts/apexcharts">Recettes</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item <?= ($uri1 == 'Configuration') ? 'active' : '' ?> has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-tools"></i>
                        <span>Configuration</span>
                    </a>
                    <ul class="submenu <?= ($uri1 == 'Configuration') ? 'active' : '' ?>">
                        <li class="submenu-item <?= ($uri2 == 'Stations') ? 'active' : '' ?>">
                            <a href="/Configuration/Stations">Stations</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/Configuration/Produits">Produits</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/Configuration/Pompes">Pompes</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/Configuration/Reservoirs">Reservoirs</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="/Configuration/Moyens">Moyens Paiement</a>
                        </li>
                        <li class="submenu-item <?= ($uri3 == 'apexcharts') ? 'active' : '' ?>">
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

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
