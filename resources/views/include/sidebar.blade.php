<aside id="side" aria-label="Navigation principale">
 <div class="brand">
    <img src="{{ asset('assets/images/eneam.png') }}" style="width: 50px;" alt="">
  <div><b>ENEAM</b><small>Gestion des PV</small></div>
 </div>
 <nav>
  <a href="{{ url('/dashboard') }}" class="lk {{ request()->is('dashboard') ? 'on' : '' }}" @if(request()->is('dashboard')) aria-current="page" @endif><svg class="i" aria-hidden="true"><use href="#grid"/></svg><span>Dashboard</span></a>
  <a href="{{ url('/pv') }}" class="lk {{ request()->is('pv*') ? 'on' : '' }}"><svg class="i" aria-hidden="true"><use href="#file"/></svg><span>Procès-verbaux (PV)</span></a>
  <a href="{{ url('/recherche') }}" class="lk {{ request()->is('recherche*') ? 'on' : '' }}"><svg class="i" aria-hidden="true"><use href="#search"/></svg><span>Recherche avancée</span></a>
  <a href="{{ url('/etudiants') }}" class="lk {{ request()->is('etudiants*') ? 'on' : '' }}"><svg class="i" aria-hidden="true"><use href="#cap"/></svg><span>Étudiants</span></a>

  <div class="sec">Gestion académique</div>
  <button class="lk" aria-expanded="{{ request()->is('academique*') ? 'true' : 'false' }}" aria-controls="m1" data-toggle><svg class="i" aria-hidden="true"><use href="#cap"/></svg><span>Gestion académique</span><svg class="i chev" aria-hidden="true"><use href="#down"/></svg></button>
  <div class="sub {{ request()->is('academique*') ? 'open' : '' }}" id="m1">
   <a href="{{ url('/academique/filieres') }}">Filières</a>
   <a href="{{ url('/academique/niveaux') }}">Niveaux</a>
   <a href="{{ url('/academique/matieres') }}">Matières</a>
  </div>

  <div class="sec">Administration</div>
  <button class="lk" aria-expanded="{{ request()->is('admin*') ? 'true' : 'false' }}" aria-controls="m2" data-toggle><svg class="i" aria-hidden="true"><use href="#shield"/></svg><span>Administrateurs</span><svg class="i chev" aria-hidden="true"><use href="#down"/></svg></button>
  <div class="sub {{ request()->is('admin*') ? 'open' : '' }}" id="m2">
   <a href="{{ url('/admin/utilisateurs') }}">Utilisateurs</a>
   <a href="{{ url('/admin/roles') }}">Rôles et droits</a>
  </div>

  <div class="sec">Préférences</div>
  <a href="{{ url('/parametres') }}" class="lk {{ request()->is('parametres*') ? 'on' : '' }}"><svg class="i" aria-hidden="true"><use href="#cog"/></svg><span>Paramètres</span></a>
  <form method="POST" action="{{ route('logout') }}">@csrf
   <button type="submit" class="lk"><svg class="i" aria-hidden="true"><use href="#out"/></svg><span>Déconnexion</span></button>
  </form>
 </nav>
</aside>