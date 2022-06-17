<?php include ("includes/header.php") ?>
<!-- delete this shit -->
<?php if(isset($session->id)): ?> 
<?php $admin = User::get_by_id($session->id); ?>
<?php  endif; ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg  bg-light navbar-light mb-5">
  <div class="container">
    <a class="navbar-brand" href="/gallery/admin/"
    
    >Gallery Admin</a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <a class="nav-link mx-2" href="photos.php"><i class="fas fa-plus-circle pe-2"></i>Photos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="upload.php"><i class="fas fa-bell pe-2"></i>Upload</a>
        </li>
        <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdownMenuLinkUsers"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
         Users 
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkUsers">
          <li>
            <a class="dropdown-item" href="/gallery/admin/users.php">View all users</a>
          </li>
          <li>
            <a class="dropdown-item" href="/gallery/admin/add_user.php">Add user</a>
          </li>
        </ul>
      </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="#!"><i class="fas fa-heart pe-2"></i>Trips</a>
        </li>
        <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle d-flex align-items-center"
          href="#"
          id="navbarDropdownMenuLinkProfile"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        
          <img
            src="/gallery/admin/images/<?= $admin->image ?>"
            class="rounded-circle"
            height="22"
            loading="lazy"
          />
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkProfile">
          <li>
            <a class="dropdown-item" href="/gallery/admin/profile.php">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="/gallery/admin/includes/logout.php">Logout</a>
          </li>
        </ul>
      </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
