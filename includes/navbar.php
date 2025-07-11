<?php

require_once __DIR__ . '/../config/config.php';

?>


<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid gap-5 mx-5">
    <a class="navbar-brand text-primary fw-bold" href="">RoomFinder</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse gap-2" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#rooms-listings">Rooms</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#how-it-works">How It Works</a>
        </li>
     
   
      </ul>
      <div>
        <a href="<?=base_url('/auth/login.php');?>" class="btn btn-primary">Login</a>
        <a href="<?=base_url('/auth/register.php');?>" class="btn btn-primary">Register</a>
      </div>
    </div>
  </div>
</nav>