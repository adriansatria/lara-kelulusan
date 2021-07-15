@extends('layouts.app')

@section('content')

<div class="m-4">
	<h2 style="font-weight:bold">Evaluasi</h2>
</div>

<div class="row">
	<div class="col-12">
		<div class="card border border-secondary m-4">
			<div class="card-body">
				<form action="{{ route('evaluations.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_dosen">Nama Dosen</label>
								<select type="text" class="form-control @error('nama_dosen') is-invalid @enderror" name="nama_dosen">
									@if(session('level') == 'Dosen')
										@foreach($dosen as $i)
											@if($i->nama_dosen == $nama_dosen_login)
												<option value="{{ $i->nama_dosen }}" selected="">{{ $i->nip }} - {{ $i->nama_dosen }}</option>
											@endif
										@endforeach
                  @else
                  	<option value="">PILIH</option>
										@foreach($dosen as $i)
											<option value="{{ $i->nama_dosen }}">{{ $i->nip }} - {{ $i->nama_dosen }}</option>
										@endforeach
									@endif
								</select>
								@error('nama_dosen')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="mata_kuliah">Mata Kuliah</label>
								<input type="text" class="form-control @error('mata_kuliah') is-invalid @enderror" name="mata_kuliah" value="{{ old('mata_kuliah') }}">
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
								<label for="nim">Mahasiswa</label>
								<select name="nim" class="form-control @error('nim') is-invalid @enderror">
									<option value="">Pilih Mahasiswa</option>
									@foreach($mahasiswa as $i)
										<option value="{{ $i->nim }}">{{ $i->nim }} - {{ $i->nama }}</option>
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
									<option value="">Nilai Akhir</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
									<option value="E">E</option>
								</select>
								@error('nilai_akhir')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kemungkinan_perbaikan">Kemungkinan Perbaikan</label>
								<select name="kemungkinan_perbaikan" class="form-control @error('kemungkinan_perbaikan') is-invalid @enderror">
									<option value="">Kemungkinan Perbaikan</option>
									<option value="Bisa">Bisa</option>
									<option value="Tidak Bisa">Tidak Bisa</option>
								</select>
								@error('kemungkinan_perbaikan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan">{{ old('keterangan') }}</textarea>
								@error('keterangan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<select type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                    <option selected>PILIH</option>
                                    <option value="2017/2018">2017/2018</option>
                                    <option value="2018/2019">2018/2019</option>
                                    <option value="2019/2020">2019/2020</option>
                                    <option value="2020/2021">2020/2021</option>
                                    <option value="2021/2022">2021/2022</option>
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
					<!-- <button type="submit" class="btn btn border border-secondary" style="background: rgb(235, 235, 235);">Save</button> -->
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection