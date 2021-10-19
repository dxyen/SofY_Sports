  <!-- Main Sidebar Container -->
  <aside class="position-fixed main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= DOCUMENT_ROOT?>" class="brand-link">
      <img src="<?= ICONS_URL ?>/logo.png " alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin SofY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= PUBLIC_URL. "/admin"?>/dist/img/avtyen.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="https://www.facebook.com/doyen333" class="d-block">Đỗ Xuân Yên</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php foreach (ADMIN_SIDEBAR as $key => $sidebar) : ?>
            <li class="nav-item">
                <a href="<?= $sidebar['link'] ?>" class="nav-link <?= strcasecmp($GLOBALS['currentRoute'], $sidebar['name'])==0 ? "active":""?>">
                    <i class="<?= $sidebar['icon'] ?>"></i>
                    <p>
                        <?= " " . $sidebar['title'] ?>
                    </p>
                </a>
            </li>
          <?php endforeach ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>