<div class="form-group">
	{!! Form::label('titre', 'Titre') !!}

	<div class="form-controls">
		{!! Form::text('titre', null, ['class' => 'form-control']) !!}
	</div>
	
	{!! Form::label('texte', 'Texte du billet de blog') !!}

	<div class="form-controls">
		{!! Form::textarea('texte', null, ['class' => 'form-control']) !!}
	</div>
	
	{!! Form::label('categorie_id', 'Choisissez une catégorie') !!}
	
	<div class="form-controls">
		{!! Form::select('categorie_id', $categories, null, ['class' => 'form-control']) !!}
	</div>
</div>

{!! Form::submit('Sauvegarder', ['class' => 'btn btn-primary'] ) !!}





