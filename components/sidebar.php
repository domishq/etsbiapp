<div class="app">
  <div class="sidebar">
    <ul class="sidebar-menu d-flex justify-content-center">
      <p style="font-size: 20px;color:white;font-weight:900;">ETSBI</p>
    </ul>
    <ul class="sidebar-menu">
      <li class="sidebar-item" id="sidebarIndex">
        <div class="linkSelector">
          <img src="includes/img/icons/active.png" alt="active">
        </div>
        <a href="index.php" class="sidebar-link">
          <i class="fa fa-desktop"></i>
          <span>dashboard</span>
        </a>
      </li>
      <li class="sidebar-item" id="sidebarUsers">
        <div class="linkSelector">
          <img src="includes/img/icons/active.png" alt="active">
        </div>
        <a href="users.php" class="sidebar-link">
          <i class="fa-regular fa-user"></i>
          <span>users</span>
        </a>
      </li>
      <li class="sidebar-item" id="sidebarUcenici">
        <div class="linkSelector">
          <img src="includes/img/icons/active.png" alt="active">
        </div>
        <a href="ucenici.php" class="sidebar-link">
          <i class="fa fa-graduation-cap"></i>
          <span>ucenici</span>
        </a>
      </li>
    </ul>
    <ul class="sidebar-menu">
      <li class="sidebar-item">
        <a href="#" class="sidebar-link" @click="logout()">
          <i class="fa fa-sign-out"></i>
          <span>logout</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="content">