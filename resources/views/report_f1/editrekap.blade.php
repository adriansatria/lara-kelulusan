@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('rekapkehadirandosen.update', $report_f1->id) }}" method="POST">
          @method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nip">Dosen</label>
								<select class="form-select form-control @error('nip') is-invalid @enderror" name="nip">
									<option value="">PILIH</option>
									@foreach($dosen as $i)
										<option value="{{ $i->nip }}" {{ old('nip', @$report_f1->nip)==$i->nip ? 'selected' : '' }}>{{ $i->nip }} - {{ $i->nama_dosen }}</option>
                  @endforeach
								</select>
								@error('nip')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<input type="hidden" name="nama_dosen" value="-">
							<div class="form-group">
								<label for="mata_kuliah">Mata Kuliah</label>
								<select name="mata_kuliah" class="form-control @error('mata_kuliah') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="Bahasa Inggris untuk TIK 2" {{ old('mata_kuliah', @$report_f1->mata_kuliah)=='Bahasa Inggris untuk TIK 2' ? 'selected' : '' }}>Bahasa Inggris untuk TIK 2</option>
								</select>
								@error('mata_kuliah')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="32RTHH" {{ old('kelas', @$report_f1->kelas)=='32RTHH' ? 'selected' : '' }}>32RTHH</option>
								</select>
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="kpk">% Kehadiran per Kelas</label>
								<input type="text" class="form-control @error('kpk') is-invalid @enderror" name="kpk" value="{{ old('kpk') ?? $report_f1->kpk }}">
								@error('kpk')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="jpm">JPM</label>
								<input type="number" class="form-control @error('jpm') is-invalid @enderror" name="jpm" value="{{ old('jpm') ?? $report_f1->jpm }}">
								@error('jpm')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="rata_kehadiran">Rata-rata % Kehadiran per SMT</label>
								<input type="text" class="form-control @error('rata_kehadiran') is-invalid @enderror" name="rata_kehadiran" value="{{ old('rata_kehadiran') ?? $report_f1->rata_kehadiran }}">
								@error('rata_kehadiran')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<select type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                    <option selected>PILIH</option>
                                    <option value="2017/2018" {{ old('tahun', @$report_f1->tahun) == '2017/2018' ? 'selected' : '' }}>2017/2018</option>
                                    <option value="2018/2019" {{ old('tahun', @$report_f1->tahun) == '2018/2019' ? 'selected' : '' }}>2018/2019</option>
                                    <option value="2019/2020" {{ old('tahun', @$report_f1->tahun) == '2019/2020' ? 'selected' : '' }}>2019/2020</option>
                                    <option value="2020/2021" {{ old('tahun', @$report_f1->tahun) == '2020/2021' ? 'selected' : '' }}>2020/2021</option>
                                    <option value="2021/2022" {{ old('tahun', @$report_f1->tahun) == '2021/2022' ? 'selected' : '' }}>2021/2022</option>
								</select>
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