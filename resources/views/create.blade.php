@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card">
				<div class="card-header">{{ __('Criar Atividade') }}</div>
				<div class="card-body">
					<form method="POST" action="{{ route('store.atividade') }}">
						@csrf
						<div class="form-row">
							<div class="col-12">
								<label>Atividade</label>
								<textarea class="form-control" name="atividade" required></textarea>
								@error('atividade')
								<span class="text-danger" role="alert" value="{{ old('atividade') }}">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="col-6">
								<label>Dia da Semana</label>
								<select class="form-control date" name="dia_semana" required>
									@foreach($diasSemana as $key => $dia)
									<option value="{{ $key }}" {{ old('dia_semana') == $key ? 'selected' : ''}}>{{ $dia }}</option>
									@endforeach
								</select>
								@error('dia_semana')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
							<div class="col-6">
								<label>Hora</label>
								<input class="form-control time" value="{{ old('hora') }}" id="time" name="hora" required>
								@error('hora')
								<span class="text-danger" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<hr>
						<button type="submit" class="btn btn-primary">Salvar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('js-scripts')
<script type="text/javascript">
	$(document).ready(function() {
		$('.time').mask('00:00');
	})
</script>
@endpush