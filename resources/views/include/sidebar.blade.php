<aside id="side" aria-label="Navigation principale">
 <div class="brand">
    <img src="{{ asset('assets/images/eneam.png') }}" style="width: 50px;" alt="Logo ENEAM">
  <div><b>ENEAM</b><small>Gestion des PV</small></div>
 </div>
 <nav>
  <a href="{{ route('dashboard') }}" class="lk {{ request()->routeIs('dashboard') ? 'on' : '' }}" @if(request()->routeIs('dashboard')) aria-current="page" @endif><svg class="i" aria-hidden="true"><use href="#grid"/></svg><span>Dashboard</span></a>
  <a href="{{ url('/pvs') }}" class="lk {{ request()->is('pv*') ? 'on' : '' }}"><svg class="i" aria-hidden="true"><use href="#file"/></svg><span>Procès-verbaux (PV)</span></a>
  <a href="{{ url('/recherche') }}" class="lk {{ request()->is('recherche*') ? 'on' : '' }}"><svg class="i" aria-hidden="true"><use href="#search"/></svg><span>Recherche avancée</span></a>
  <a href="{{ url('/etudiants') }}" class="lk {{ request()->is('etudiants*') ? 'on' : '' }}"><svg class="i" aria-hidden="true"><use href="#cap"/></svg><span>Étudiants</span></a>


  <div>
    <div class="sec">Administration</div>
    <button class="lk" aria-expanded="{{ request()->is('admin/users*') || request()->is('admin/departements*') ? 'true' : 'false' }}" aria-controls="m2" data-toggle><svg class="i" aria-hidden="true"><use href="#shield"/></svg><span>Administration</span><svg class="i chev" aria-hidden="true"><use href="#down"/></svg></button>
    <div class="sub {{ request()->is('admin/users*') || request()->is('admin/departements*') ? 'open' : '' }}" id="m2">
    <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'on' : '' }}">Utilisateurs</a>
    </div>

    <div class="sec">Gestion académique</div>
    <button class="lk" aria-expanded="{{ request()->is('admin/departements*') || request()->is('admin/filieres*') || request()->is('admin/niveaux*') || request()->is('admin/annees*') ? 'true' : 'false' }}" aria-controls="m1" data-toggle><svg class="i" aria-hidden="true"><use href="#cap"/></svg><span>Gestion académique</span><svg class="i chev" aria-hidden="true"><use href="#down"/></svg></button>
    <div class="sub {{ request()->is('admin/departements*') || request()->is('admin/filieres*') || request()->is('admin/niveaux*') || request()->is('admin/annees*') ? 'open' : '' }}" id="m1">
    <a href="{{ route('admin.departements.index') }}" class="{{ request()->routeIs('admin.departements.*') ? 'on' : '' }}">Départements</a>
    <a href="{{ route('admin.filieres.index') }}" class="{{ request()->routeIs('admin.filieres.*') ? 'on' : '' }}">Filières</a>
    <a href="{{ route('admin.niveaux.index') }}" class="{{ request()->routeIs('admin.niveaux.*') ? 'on' : '' }}">Niveaux</a>
    <a href="{{ route('admin.annees.index') }}" class="{{ request()->routeIs('admin.annees.*') ? 'on' : '' }}">Années Académiques</a>
    </div>
  </div>


  <div class="sec">Préférences</div>
  <a href="{{ route('profile.edit') }}" class="lk {{ request()->routeIs('profile.*') ? 'on' : '' }}"><svg class="i" aria-hidden="true"><use href="#cog"/></svg><span>Mon Profil</span></a>
  <form method="POST" action="{{ route('logout') }}">@csrf
   <button type="submit" class="lk"><svg class="i" aria-hidden="true"><use href="#out"/></svg><span>Déconnexion</span></button>
  </form>
 </nav>
</aside>