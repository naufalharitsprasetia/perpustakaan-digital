 {{-- navbar start --}}
 <nav class="navbar navbar-expand-lg"
     style="background-color: bisque;    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.454), inset 0 -1px 0 rgba(52, 39, 39, 0.189);">
     <div class="container-fluid">
         <a class="navbar-brand" href="#">
             <img src="/assets/logo.png" alt="lOGO" width="35" height="35">
         </a>
         <a class="navbar-brand" href="#">Perpustakaan Digital | </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
             data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
             aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item">
                     <a class="nav-link {{ $active === 'beranda' ? 'active' : '' }}" href="/"><i
                             class="fa-solid fa-house fa-bounce" style="color: black;"></i> Beranda</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link {{ $active === 'books' ? 'active' : '' }}" href="/books"><i
                             class="fa-solid fa-book fa-bounce" style="color: black;"></i> Buku-Buku</a>
                 </li>
                 @auth
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle {{ $active === 'dashboard' ? 'active' : '' }}" href="#"
                             role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Welcome back, {{ auth()->user()->name }}
                         </a>
                         <ul class="dropdown-menu">
                             <li><a class="dropdown-item {{ $active === 'dashboard' ? 'active' : '' }}" href="/dashboard"><i
                                         class="bi bi-layout-text-sidebar-reverse"></i>
                                     My Dashboard</a></li>
                             <li>
                                 <hr class="dropdown-divider">
                             </li>
                             <li>
                                 <form action="/logout" method="post">
                                     @csrf
                                     <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                         Logout</button>
                                 </form>
                             </li>
                         </ul>
                     </li>
                 @else
                     <li class="nav-item mx-3">
                         <a class="btn {{ $active === 'login' ? 'btn-success' : 'btn-primary' }}" href="/login">Admin
                             Login</a>
                     </li>
                 @endauth
             </ul>
         </div>
     </div>
 </nav>
 {{-- navbar end --}}
