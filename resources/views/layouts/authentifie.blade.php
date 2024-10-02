<div class="text-left">	
	@if(Auth::check())
		
	<b>Bonjour</b> :	<strong><span style="color:red;">{{ Auth::user()->name }}</span></strong>
	
	<br><br>
	
	
	<a href="{{ url('/logout') }}" class="btn btn-warning"> Se déconnecter</a>
	
	@else
		
	<a href="{{ url('/login') }}" class="btn btn-warning"> Se connecter</a>
	
	@endif
</div>