@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('rekapstatuskelulusan.update', $report_f3->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-6">
						<div class="form-group">
								<label for="nim">Mahasiswa</label>
								<select name="nim" class="form-control @error('nim') is-invalid @enderror">
									<option value="">Pilih Mahasiswa</option>
									@foreach($mahasiswa as $i)
										<option value="{{ $i->nim }}" {{ old('nim', @$report_f3->nim)==$i->nim ? 'selected' : '' }}>{{ $i->nim }} - {{ $i->nama }}</option>
                 					 @endforeach
								</select>
								@error('nim')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<input type="hidden" name="nama_mahasiswa" value="-">
							<div class="form-group">
								<label for="prodi">Prodi</label>
								<input type="text" class="form-control @error('prodi') is-invalid @enderror" name="prodi" value="{{ old('prodi') ?? $report_f3->prodi  }}">
								@error('prodi')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jenjang">Jenjang</label>
								<select class="form-control @error('jenjang') is-invalid @enderror" name="jenjang" value="{{ old('jenjang') ?? $report_f3->jenjang  }}">
									<option value="">Pilih</option>
									<option value="D4" {{ old('jenjang', @$report_f3->jenjang) == 'D4' ? 'selected' : '' }}>D4</option>
								</select>
								@error('jenjang')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="semester">Semester</label>
								<select type="text" class="form-control @error('semester') is-invalid @enderror" name="semester">
									<option value="">Pilih</option>
									<option value="1" {{ old('semester', @$report_f3->semester) == '1' ? 'selected' : '' }}>1</option>
									<option value="2" {{ old('semester', @$report_f3->semester) == '2' ? 'selected' : '' }}>2</option>
									<option value="3" {{ old('semester', @$report_f3->semester) == '3' ? 'selected' : '' }}>3</option>
									<option value="4" {{ old('semester', @$report_f3->semester) == '4' ? 'selected' : '' }}>4</option>
									<option value="5" {{ old('semester', @$report_f3->semester) == '5' ? 'selected' : '' }}>5</option>
									<option value="6" {{ old('semester', @$report_f3->semester) == '6' ? 'selected' : '' }}>6</option>
									<option value="7" {{ old('semester', @$report_f3->semester) == '7' ? 'selected' : '' }}>7</option>
									<option value="8" {{ old('semester', @$report_f3->semester) == '8' ? 'selected' : '' }}>8</option>	
								</select>
								@error('semester')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<select name="kelas" value="{{ old('kelas') }}" class="form-control @error('kelas') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="32RTHH" {{ old('kelas', @$report_f3->kelas)=='32RTHH' ? 'selected' : '' }}>32RTHH</option>
								</select>
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
								<input type="number" class="form-control @error('jumlah_mahasiswa') is-invalid @enderror" name="jumlah_mahasiswa" value="{{ old('jumlah_mahasiswa') ?? $report_f3->jumlah_mahasiswa  }}">
								@error('jumlah_mahasiswa')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<input type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ old('tahun') ?? $report_f3->tahun  }}">
								@error('tahun')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="status_l">Status L</label>
								<input type="number" class="form-control" name="status_l" value="{{ old('status_l') ?? $report_f3->status_l  }}">
							</div>
							<div class="form-group">
								<label for="status_lp">Status LP</label>
								<input type="number" class="form-control" name="status_lp" value="{{ old('status_lp') ?? $report_f3->status_lp  }}">
							</div>
							<div class="form-group">
								<label for="status_ct">Status CT</label>
								<input type="number" class="form-control" name="status_ct" value="{{ old('status_ct') ?? $report_f3->status_ct  }}">
							</div>
							<div class="form-group">
								<label for="status_ml">Status ML</label>
								<input type="number" class="form-control" name="status_ml" value="{{ old('status_ml') ?? $report_f3->status_ml  }}">
							</div>
							<div class="form-group">
								<label for="status_md">Status MD</label>
								<input type="number" class="form-control" name="status_md" value="{{ old('status_md') ?? $report_f3->status_md  }}">
							</div>
							<div class="form-group">
								<label for="status_do">Status DO</label>
								<input type="number" class="form-control" name="status_do" value="{{ old('status_do') ?? $report_f3->status_do  }}">
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') ?? $report_f3->keterangan  }}">
								@error('keterangan')
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