<div id="left-menu">
  <div class="sub-left-menu scroll" style="float:left;width:230px;">
    <ul class="nav nav-list">
      <li><div class="left-bg"></div></li>
      <li class="time">
        <h1 class="animated fadeInLeft">21:00</h1>
        <p class="animated fadeInRight">Sat,October 1st 2029</p>
      </li>
      <li class="{{ Request::is('dimes') ? 'active' : '' }} ripple">
        <a href="/dimes" class="tree-toggle nav-header"><span class="fa-home fa"></span> Dîmes
          <span class="fa-angle-right fa right-arrow text-right"></span>
        </a>
      </li>
      <li class="{{ Request::is('communes', 'communes/create', 'communes/show') ? 'active' : '' }} ripple">
        <a href="/communes" class="tree-toggle nav-header"><span class="fa-home fa"></span> Communes
          <span class="fa-angle-right fa right-arrow text-right"></span>
        </a>
      </li>
      <li class="{{ Request::is('titres', 'titres/create', 'titres/show') ? 'active' : '' }} ripple">
        <a href="/titres" class="tree-toggle nav-header"><span class="fa-home fa"></span> Titres
          <span class="fa-angle-right fa right-arrow text-right"></span>
        </a>
      </li>
      <li class="{{ Request::is('membres') ? 'active' : '' }} ripple">
        <a href="/membres" class="tree-toggle nav-header"><span class="fa-home fa"></span> Membres
          <span class="fa-angle-right fa right-arrow text-right"></span>
        </a>
      </li>
    </ul>

  </div>
</div>
