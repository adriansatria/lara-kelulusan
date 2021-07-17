@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('rekapipmahasiswa.update', $report_f2->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nim">Mahasiswa</label>
								<select name="nim" class="form-control @error('nim') is-invalid @enderror">
									<option value="">Pilih Mahasiswa</option>
									@foreach($mahasiswa as $i)
										<option value="{{ $i->nim }}" {{ old('nim', @$report_f2->nim)==$i->nim ? 'selected' : '' }}>{{ $i->nim }} - {{ $i->nama }}</option>
                  					@endforeach
								</select>
								@error('nim')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<input type="hidden" name="nama_mahasiswa" value="-">
							<div class="form-group">
								<label for="kelas">Kelas</label>
								<select name="kelas" value="{{ old('kelas') }}" class="form-control @error('kelas') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="TI-1A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-1A</option>
									<option value="TI-1B" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-1B</option>
									<option value="TI-3" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-3</option>
									<option value="TI-3A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-3A</option>
									<option value="TI-5A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-5A</option>
									<option value="TI-5B" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-5B</option>
									<option value="TI-7A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-7A</option>
									<option value="TI-7B" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-7B</option>
									<option value="TI-5A MSU" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-5A MSU</option>
 									<option value="TI-5B MSU" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TI-5B MSU</option>
									<option value="TMD-1" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-1</option>
									<option value="TMD-3" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-3</option>
									<option value="TMD-5" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-5</option>
									<option value="TMD-1 MSU" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-1 MSU</option>
									<option value="TMD-3 MSU" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-3 MSU</option>
 									<option value="TMD-1 Aeu" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-1 Aeu</option>
									<option value="TMD-3 Aeu" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMD-3 Aeu</option>
									<option value="TMJ-3" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMJ-3</option>
 									<option value="TMJ-5" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>TMJ-5</option>
 									<option value="CCIT-1" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT-1</option>
 									<option value="CCIT-3" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT-3</option>
 									<option value="CCIT-5A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT-5A</option>
									<option value="CCIT-5B" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT-5B</option>
									<option value="CCIT-7A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT-7A</option>
									<option value="CCIT SEC 3A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT SEC 3A</option>
									<option value="CCIT SEC 5A" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT SEC 5A</option>
									<option value="CCIT SEC 5B" {{ old('kelas', @$evaluation->kelas)=='32RTHH' ? 'selected' : '' }}>CCIT SEC 5B</option>
								</select>
								@error('kelas')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s1">IP Semester 1</label>
								<input type="text" class="form-control @error('ip_s1') is-invalid @enderror" name="ip_s1" value="{{ old('ip_s1') ?? $report_f2->ip_s1 }}">
								@error('ip_s1')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s2">IP Semester 2</label>
								<input type="text" class="form-control @error('ip_s2') is-invalid @enderror" name="ip_s2" value="{{ old('ip_s2') ?? $report_f2->ip_s2 }}">
								@error('ip_s2')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s3">IP Semester 3</label>
								<input type="text" class="form-control @error('ip_s3') is-invalid @enderror" name="ip_s3" value="{{ old('ip_s3') ?? $report_f2->ip_s3 }}">
								@error('ip_s3')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s4">IP Semester 4</label>
								<input type="text" class="form-control @error('ip_s4') is-invalid @enderror" name="ip_s4" value="{{ old('ip_s4') ?? $report_f2->ip_s4 }}">
								@error('ip_s4')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s5">IP Semester 5</label>
								<input type="text" class="form-control @error('ip_s5') is-invalid @enderror" name="ip_s5" value="{{ old('ip_s5') ?? $report_f2->ip_s5 }}">
								@error('ip_s5')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-6">
							
							<div class="form-group">
								<label for="ip_s6">IP Semester 6</label>
								<input type="text" class="form-control @error('ip_s6') is-invalid @enderror" name="ip_s6" value="{{ old('ip_s6') ?? $report_f2->ip_s6 }}">
								@error('ip_s6')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s7">IP Semester 7</label>
								<input type="text" class="form-control @error('ip_s7') is-invalid @enderror" name="ip_s7" value="{{ old('ip_s7') ?? $report_f2->ip_s7 }}">
								@error('ip_s7')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ip_s8">IP Semester 8</label>
								<input type="text" class="form-control @error('ip_s8') is-invalid @enderror" name="ip_s8" value="{{ old('ip_s8')  ?? $report_f2->ip_s8}}">
								@error('ip_s8')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="ipk">IPK</label>
								<input type="text" class="form-control @error('ipk') is-invalid @enderror" name="ipk" value="{{ old('ipk') ?? $report_f2->ipk }}">
								@error('ipk')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="status">Status</label>
								<select name="status" class="form-control @error('status') is-invalid @enderror">
									@if($report_f2->status == 'L')
									<option value="{{ $report_f2->status }}">{{ $report_f2->status }}</option>
									<option value="LP">LP</option>
									<option value="DO">DO</option>
									<option value="MD">MD</option>
									<option value="CA">CA</option>
									@elseif($report_f2->status == 'LP')
									<option value="{{$report_f2->status}}">{{$report_f2->status}}</option>
									<option value="L">L</option>
									<option value="DO">DO</option>
									<option value="MD">MD</option>
									<option value="CA">CA</option>
									@elseif($report_f2->status == 'DO')
									<option value="{{$report_f2->status}}">{{$report_f2->status}}</option>
									<option value="L">L</option>
									<option value="LP">LP</option>
									<option value="MD">MD</option>
									<option value="CA">CA</option>
									@elseif($report_f2->status == 'MD')
									<option value="{{$report_f2->status}}">{{$report_f2->status}}</option>
									<option value="L">L</option>
									<option value="LP">LP</option>
									<option value="DO">DO</option>
									<option value="CA">CA</option>
									@elseif($report_f2->status == 'CA')
									<option value="{{$report_f2->status}}">{{$report_f2->status}}</option>
									<option value="L">L</option>
									<option value="LP">LP</option>
									<option value="DO">DO</option>
									<option value="MD">MD</option>
									@endif
								</select>
								@error('status')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="prodi">Prodi</label>
								<select name="prodi" class="form-control @error('prodi') is-invalid @enderror">
									<option value="">PILIH</option>
									<option value="TI" {{ old('prodi', @$evaluation->prodi)=='TI' ? 'selected' : '' }}>TI</option>
									<option value="TI CBD" {{ old('prodi', @$evaluation->prodi)=='TI CBD' ? 'selected' : '' }}>TI CBD</option>
									<option value="TI MSU" {{ old('prodi', @$evaluation->prodi)=='TI MSU' ? 'selected' : '' }}>TI MSU</option>
									<option value="TMD" {{ old('prodi', @$evaluation->prodi)=='TMD' ? 'selected' : '' }}>TMD</option>
									<option value="TMD MSU" {{ old('prodi', @$evaluation->prodi)=='TMD MSU' ? 'selected' : '' }}>TMD MSU</option>
									<option value="TMD Aeu" {{ old('prodi', @$evaluation->prodi)=='TMD Aeu' ? 'selected' : '' }}>TMD Aeu</option>
									<option value="TMJ" {{ old('prodi', @$evaluation->prodi)=='TMJ' ? 'selected' : '' }}>TMJ</option>
									<option value="CCIT" {{ old('prodi', @$evaluation->prodi)=='CCIT' ? 'selected' : '' }}>CCIT</option>
									</select>
								@error('prodi')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="tahun">Tahun</label>
								<select type="text" class="form-control @error('tahun') is-invalid @enderror" name="tahun">
                                    <option selected>PILIH</option>
                                    <option value="2017/2018" {{ old('tahun', @$report_f2->tahun) == '2017/2018' ? 'selected' : '' }}>2017/2018</option>
                                    <option value="2018/2019" {{ old('tahun', @$report_f2->tahun) == '2018/2019' ? 'selected' : '' }}>2018/2019</option>
                                    <option value="2019/2020" {{ old('tahun', @$report_f2->tahun) == '2019/2020' ? 'selected' : '' }}>2019/2020</option>
                                    <option value="2020/2021" {{ old('tahun', @$report_f2->tahun) == '2020/2021' ? 'selected' : '' }}>2020/2021</option>
                                    <option value="2021/2022" {{ old('tahun', @$report_f2->tahun) == '2021/2022' ? 'selected' : '' }}>2021/2022</option>
								</select>
								@error('tahun')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="float-right">
                        <a href="{{ route('rekapipmahasiswa') }}" class="btn btn-warning">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>	
	</div>
</div>

@endsection