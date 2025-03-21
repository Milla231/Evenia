
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="index.html"><img src="{{asset('storage/assets/images/mb.svg')}}" alt="logo" height="100" /></a>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="{{asset('storage/assets/images/logo-mini.svg')}}" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="{{asset('storage/assets/images/faces/face15.jpg')}}" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h5>
            <span>Gold Member</span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <a href="#" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-settings text-primary"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Profil</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('logout')}}" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Deconnexion</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    

 
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basi" aria-expanded="false" aria-controls="ui-basi">
        <span class="menu-icon">
          <i class="mdi mdi-ticket"></i>
        </span>
        <span class="menu-title">Ticket</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basi">
        <ul class="nav flex-column sub-menu">
         <li class="nav-item"> <a class="nav-link" href="{{route('tickets.index')}}">Liste</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basy" aria-expanded="false" aria-controls="ui-basy">
        <span class="menu-icon">
          <i class="mdi mdi-calendar"></i>
        </span>
        <span class="menu-title">Evenement</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basy">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('evenement.create')}}">Ajouter</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('evenement.index')}}">Liste</a></li>
        </ul>
      </div>
    </li>
   
   
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-bash" aria-expanded="false" aria-controls="ui-bash">
        <span class="menu-icon">
          <i class="mdi mdi-account"></i>
        </span>
        <span class="menu-title">Participant</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-bash">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('participant.index')}}">Liste</a></li>
        </ul>
      </div>
    </li>
   
  </ul>
</nav>