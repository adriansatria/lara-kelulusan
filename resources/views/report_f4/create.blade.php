@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('f4s.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
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
								<input type="number" class="form-control @error('semester') is-invalid @enderror" name="semester" value="{{ old('semester') }}">
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
								<label for="sp1">Surat Peringatan I</label>
								<input type="number" class="form-control" name="sp1" value="{{ old('sp1') }}">
							</div>
							<div class="form-group">
								<label for="sp2">Surat Peringatan II</label>
								<input type="number" class="form-control" name="sp2" value="{{ old('sp2') }}">
							</div>
							<div class="form-group">
								<label for="sp3">Surat Peringatan III</label>
								<input type="number" class="form-control" name="sp3" value="{{ old('sp3') }}">
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}">
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
                        <a href="{{ route('f4s') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection