<div class="app">
  <div class="sidebar">
    <ul class="sidebar-menu">
      <p style="font-size: 20px;color:white;font-weight:900;">ETSBI</p>
    </ul>
    <ul class="sidebar-menu">
      <li class="sidebar-item">
        <a href="users.php" class="sidebar-link">
          <i class="fa-regular fa-user"></i>
          <span>users</span>
        </a>
      </li>
      <li class="active sidebar-item">
        <a href="ucenici.php" class="sidebar-link">
            <i class="fa fa-graduation-cap"></i>
            <span>ucenici</span>
        </a>
      </li>
      <li class="sidebar-item">
        <a href="uvjerenja.php" class="sidebar-link">
          <i class="fa fa-print"></i>
          <span>uvjerenja</span>
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