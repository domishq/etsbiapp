<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: signIn.php");
    exit();
}
?>

<div class="app">
  <div class="sidebar">
    <ul class="sidebar-menu d-flex justify-content-center">
      <span class="logo" style="font-weight: 700; font-size: 25px;color: #ecf0f1;">ETSBI</span>
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
        <div>
          <a href="users.php" class="sidebar-link">
            <i class="fa-regular fa-user"></i>
            <span>users</span>
          </a>
          <ul class="sidebar-hiddenUl">
            <li>
              <a href="addUser.php" class="sidebar-hiddenActionLink">
                <span>Dodaj korisnika</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="sidebar-item" id="sidebarUcenici">
        <div class="linkSelector">
          <img src="includes/img/icons/active.png" alt="active">
        </div>
        <div>
          <a href="ucenici.php" class="sidebar-link">
            <i class="fa fa-graduation-cap"></i>
            <span>ucenici</span>
          </a>
          <ul class="sidebar-hiddenUl">
            <li>
              <a href="addUcenik.php" class="sidebar-hiddenActionLink">
                <span>Dodaj ucenika</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="sidebar-item" id="sidebarUvjerenja">
        <div class="linkSelector">
          <img src="includes/img/icons/active.png" alt="active">
        </div>
        <div>
          <a href="uvjerenja.php" class="sidebar-link">
            <i class="fa fa-print"></i>
            <span>uvjerenja</span>
          </a>
          <ul class="sidebar-hiddenUl">
            <li>
              <a href="printaj.php" class="sidebar-hiddenActionLink">
                <span>Printaj uvjerenje</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="sidebar-item" id="sidebarZahtjevi">
        <div class="linkSelector">
          <img src="includes/img/icons/active.png" alt="active">
        </div>
        <div>
          <a href="zahtjevi.php" class="sidebar-link">
            <i class="fa-solid fa-file-circle-question"></i>
            <span>zahtjevi</span>
          </a>
        </div>
      </li>
    </ul>
    <ul class="sidebar-menu flex-column align-items-center d-flex">
      <li class="sidebar-item">
          <a href="#" class="sidebar-link">
            <i class="fa fa-user"></i>
            <span>@<?php echo $_SESSION['username']; ?></span>
          </a>
      </li>
      <li class="sidebar-item">
        <a href="api/user.php?action=signOut" class="sidebar-link">
          <i class="fa fa-sign-out"></i>
          <span>logout</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="content">