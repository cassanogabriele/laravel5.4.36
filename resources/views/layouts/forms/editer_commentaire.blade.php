<div class="form-group">	
	{!! Form::label('id', 'id Commentaire à modifier', ['class' => 'none']) !!}

	
	<div class="form-controls">		
		{!! Form::textarea('id', null, ['class' => 'none']) !!}
	</div>
	
	{!! Form::label('commentaire', 'Commentaire à modifier') !!}
	
	<div class="form-controls">		
		{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
	</div>
</div>

{!! Form::submit('Sauvegarder', ['class' => 'btn btn-primary'] ) !!}





