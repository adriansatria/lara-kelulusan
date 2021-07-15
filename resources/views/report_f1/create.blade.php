@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('rekapkehadirandosen.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nip">Dosen</label>
								<select class="form-select form-control @error('nip') is-invalid @enderror" name="nip">
									<option value="">PILIH</option>
									@foreach($dosen as $i)
										<option value="{{ $i->nip }}">{{ $i->nip }} - {{ $i->nama_dosen }}</option>
                  @endforeach
								</select>
								@error('nip')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<input type="hidden" name="nama_dosen" value="-">
							<div class="form-group">
								<label for="mata_kuliah">Mata Kuliah</label>
								<select name="mata_kuliah" value="{{ old('mata_kuliah') }}" class="form-control @error('mata_kuliah') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="Bahasa Inggris untuk TIK 2">Bahasa Inggris untuk TIK 2</option>
								</select>
								@error('mata_kuliah')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<select name="kelas" value="{{ old('kelas') }}" class="form-control @error('kelas') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="32RTHH">32RTHH</option>
								</select>
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kpk">% Kehadiran per Kelas</label>
								<input type="text" class="form-control @error('kpk') is-invalid @enderror" name="kpk" value="{{ old('kpk') }}">
								@error('kpk')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="jpm">JPM</label>
								<input type="number" class="form-control @error('jpm') is-invalid @enderror" name="jpm" value="{{ old('jpm') }}">
								@error('jpm')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="rata_kehadiran">Rata-rata % Kehadiran per SMT</label>
								<input type="text" class="form-control @error('rata_kehadiran') is-invalid @enderror" name="rata_kehadiran" value="{{ old('rata_kehadiran') }}">
								@error('rata_kehadiran')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}">
								@error('tahun')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="float-right">
                        <a href="{{ route('rekapkehadirandosen') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection