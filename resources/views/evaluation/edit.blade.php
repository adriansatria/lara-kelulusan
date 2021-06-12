@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_dosen">Nama Dosen</label>
								<input type="text" class="form-control @error('nama_dosen') is-invalid @enderror" name="nama_dosen" value="{{ old('nama_dosen') ?? $evaluation->nama_dosen }}">
								@error('nama_dosen')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="mata_kuliah">Mata Kuliah</label>
								<input type="text" class="form-control @error('mata_kuliah') is-invalid @enderror" name="mata_kuliah" value="{{ old('mata_kuliah') ?? $evaluation->mata_kuliah }}">
								@error('mata_kuliah')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<input type="text" class="form-control @error('kelas') is-invalid @enderror" name="kelas" value="{{ old('kelas') ?? $evaluation->kelas }}">
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="nama_mahasiswa">Nama Mahasiswa</label>
								<input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') ?? $evaluation->nama_mahasiswa }}">
								@error('nama_mahasiswa')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="nim">NIM</label>
								<input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') ?? $evaluation->nim }}">
								@error('nim')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nilai_akhir">nilai_akhir</label>
								<select name="nilai_akhir" class="form-control @error('nilai_akhir') is-invalid @enderror">
									@if($evaluation->nilai_akhir == 'D')
									<option value="{{ $evaluation->nilai_akhir  }}">{{ $evaluation->nilai_akhir  }}</option>
									<option value="E">E</option>
									@elseif($evaluation->nilai_akhir == 'E')
									<option value="{{ $evaluation->nilai_akhir  }}">{{ $evaluation->nilai_akhir  }}</option>
									<option value="D">D</option>
									@endif
								</select>
								@error('nilai_akhir')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kemungkinan_perbaikan">Kemungkinan Perbaikan</label>
								<select name="kemungkinan_perbaikan" class="form-control @error('kemungkinan_perbaikan') is-invalid @enderror">
									@if($evaluation->kemungkinan_perbaikan == 'Bisa')
									<option value="{{ $evaluation->kemungkinan_perbaikan  }}">{{ $evaluation->kemungkinan_perbaikan  }}</option>
									{{-- <option value="Bisa">Bisa</option> --}}
									<option value="Tidak Bisa">Tidak Bisa</option>
									@elseif($evaluation->kemungkinan_perbaikan == 'Tidak Bisa')
									<option value="{{ $evaluation->kemungkinan_perbaikan  }}">{{ $evaluation->kemungkinan_perbaikan  }}</option>
									<option value="Bisa">Bisa</option>
									@endif
								</select>
								@error('kemungkinan_perbaikan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') ?? $evaluation->keterangan }}">
								@error('keterangan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') ?? $evaluation->tahun }}">
								@error('tahun')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection