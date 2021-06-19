@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('f3s.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_mahasiswa">Nama Mahasiswa</label>
								<input type="text" class="form-control" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') }}">
							</div>
							<div class="form-group">
								<label for="nim">NIM</label>
								<input type="text" class="form-control" name="nim" value="{{ old('nim') }}">
							</div>
							<div class="form-group">
								<label for="prodi">Prodi</label>
								<input type="text" class="form-control @error('prodi') is-invalid @enderror" name="prodi" value="{{ old('prodi') }}">
								@error('prodi')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jenjang">Jenjang</label>
								<input type="text" class="form-control @error('jenjang') is-invalid @enderror" name="jenjang" value="{{ old('jenjang') }}">
								@error('jenjang')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="semester">Semester</label>
								<input type="text" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{ old('semester') }}">
								@error('semester')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') }}">
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
								<input type="number" class="form-control @error('jumlah_mahasiswa') is-invalid @enderror" name="jumlah_mahasiswa" value="{{ old('jumlah_mahasiswa') }}">
								@error('jumlah_mahasiswa')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="status_l">Status L</label>
								<input type="number" class="form-control" name="status_l" value="{{ old('status_l') }}">
							</div>
							<div class="form-group">
								<label for="status_lp">Status LP</label>
								<input type="number" class="form-control" name="status_lp" value="{{ old('status_lp') }}">
							</div>
							<div class="form-group">
								<label for="status_ct">Status CT</label>
								<input type="number" class="form-control" name="status_ct" value="{{ old('status_ct') }}">
							</div>
							<div class="form-group">
								<label for="status_ml">Status ML</label>
								<input type="number" class="form-control" name="status_ml" value="{{ old('status_ml') }}">
							</div>
							<div class="form-group">
								<label for="status_md">Status MD</label>
								<input type="number" class="form-control" name="status_md" value="{{ old('status_md') }}">
							</div>
							<div class="form-group">
								<label for="status_do">Status DO</label>
								<input type="number" class="form-control" name="status_do" value="{{ old('status_do') }}">
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') }}">
								@error('tahun')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="float-right">
                        <a href="{{ route('rekapstatuskelulusan') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection