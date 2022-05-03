   <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->

                  <img src="../assets/image/logo.png" alt="logo" style="height: 65px;" />

              <div style="text-align: left; margin: auto;">
                  <strong style="color:black; font-family: 'Trebuchet MS','Times New Roman',serif;">Bienvenue dans le smart système médical </strong>
              </div>
             
          <ul class="navbar-nav ml-auto">

          
               
        

            <div class="topbar-divider d-none d-sm-block"></div>
            
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php if(isset($_SESSION['nom'])){echo $_SESSION['nom'];} ?></span>
                <img class="img-profile rounded-circle" src="<?php if(isset( $_SESSION['photo'])) {echo $_SESSION['photo'];} ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
<a class="dropdown-item" href="<?php if(isset($_SESSION['matricule'])) {echo 'dashboard_admin.php';} elseif(isset($_SESSION['matricule_personnel'])){echo 'dashboard_personnel.php';} else{echo 'dashboard_patient.php';} ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profil
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Déconnexion
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->