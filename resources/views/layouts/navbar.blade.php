<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
<!-- Navbar -->
<style>
  .text-dark:hover {
    color: #333 !important;
    text-shadow: 1px 1px #999;
  }
</style>

<nav class="main-header navbar navbar-expand navbar-white shadow-0">
  <!-- Left navbar links -->
  <ul class="navbar-nav px-3">
    <li class="nav-item">
      <a class="nav-link  text-dark" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <li class="nav-item d-none d-sm-inline-block">
      <a class="dropdown-item nav-link bg-transparent text-dark px-3" id="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
        <i class="fa-solid fa-arrow-right-from-bracket"></i>
        {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>


    <li class="nav-item d-sm-inline-block">
      <a class="dropdown-item nav-link bg-transparent text-dark" id="logout" href="{{ url('/user/profile') }}">
        <i class="fa-solid fa-user-tie"></i>
        {{ auth()->user()->name}}
      </a>

    </li>




    <li class="nav-item px-3">
      <a class="nav-link text-dark" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

  </ul>
</nav>
<!-- /.navbar -->