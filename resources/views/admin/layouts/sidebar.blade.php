<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>

    </form>
    <ul class="navbar-nav navbar-right">

      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <div class="d-sm-none d-lg-inline-block">Hi, Admin</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="{{route('profile.edit')}}" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" class="dropdown-item has-icon text-danger">
                    Logout
                </button>
            </form>
        </div>
      </li>
    </ul>
  </nav>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('admin.dashboard')}}">Dashboard</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{route('admin.dashboard')}}">admin</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Recruteurs</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i><span>Validation Recruteurs</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('admin.recruteurs.pending')}}">Recruteurs En Attente</a></li>
            <li><a class="nav-link" href="{{route('admin.recruteurs.valid')}}">Recruteurs Validé</a></li>
            <li><a class="nav-link" href="{{route('admin.recruteurs.refused')}}">Recruteurs Refusé</a></li>

          </ul>
        </li>

        <li class="menu-header">Candidats</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i><span>Validation Candidats</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('admin.candidats.pending')}}">Candidats En Attente</a></li>
            <li><a class="nav-link" href="{{route('admin.candidats.valid')}}">Candidats Validé</a></li>
            <li><a class="nav-link" href="{{route('admin.candidats.refused')}}">Candidats Refusé</a></li>

          </ul>
        </li>
        <li class="menu-header">Offers</li>
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Validation Offres</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('admin.offers.pending')}}">Offres En Attente</a></li>
              <li><a class="nav-link" href="{{route('admin.offers.valid')}}">Offres Validé</a></li>
              <li><a class="nav-link" href="{{route('admin.offers.refused')}}">Offres Refusé</a></li>

            </ul>
          </li>
        <!--        <li><a class="nav-link" href="blank.html"><i class="far fa-file-alt"></i> <span>Validation Des Offres</span></a></li>
 -->

      </ul>

    </aside>
  </div>
