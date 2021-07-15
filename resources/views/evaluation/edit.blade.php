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
								<select type="text" class="form-control @error('nama_dosen') is-invalid @enderror" name="nama_dosen">
									<option value="">PILIH</option>
									@foreach($dosen as $i)
									<option value="{{ $i->nama_dosen }}" {{ old('nama_dosen', @$evaluation->nama_dosen)==$i->nama_dosen ? 'selected' : '' }}>{{ $i->nip }} - {{ $i->nama_dosen }}</option>
									@endforeach
								</select>
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
								<select name="kelas" value="{{ old('kelas') }}" class="form-control @error('kelas') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="32RTHH" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>32RTHH</option>
								</select>
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="nim">Mahasiswa</label>
								<select name="nim" class="form-control @error('nim') is-invalid @enderror">
									<option value="">Pilih Mahasiswa</option>
									@foreach($mahasiswa as $i)
										<option value="{{ $i->nim }}" {{ old('nim', @$evaluation->nim)==$i->nim ? 'selected' : '' }}>{{ $i->nim }} - {{ $i->nama }}</option>
               					   @endforeach
								</select>
								@error('nim')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<input type="hidden" name="nama_mahasiswa" value="-">
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nilai_akhir">Nilai Akhir</label>
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
								<textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') ?? $evaluation->keterangan }}"></textarea>
								@error('keterangan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<select type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                    <option selected>Pilih</option>
                                    <option value="2017/2018" {{ old('tahun', @$evaluation->tahun) == '2017/2018' ? 'selected' : '' }}>2017/2018</option>
                                    <option value="2018/2019" {{ old('tahun', @$evaluation->tahun) == '2018/2019' ? 'selected' : '' }}>2018/2019</option>
                                    <option value="2019/2020" {{ old('tahun', @$evaluation->tahun) == '2019/2020' ? 'selected' : '' }}>2019/2020</option>
                                    <option value="2020/2021" {{ old('tahun', @$evaluation->tahun) == '2020/2021' ? 'selected' : '' }}>2020/2021</option>
                                    <option value="2021/2022" {{ old('tahun', @$evaluation->tahun) == '2021/2022' ? 'selected' : '' }}>2021/2022</option>
								</select>
								@error('tahun')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="float-right">
                        <a href="{{ route('evaluations') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection