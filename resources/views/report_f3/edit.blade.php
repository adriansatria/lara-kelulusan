@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('f3s.update', $report_f3->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="col-sm-2">
								<div class="form-group">
									<label for="nim">NIM</label>
									<input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') ?? $report_f3->nim  }}">
									@error('nim')
									<div class="text-danger">{{ $message }}</div>
									@enderror
								</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label for="nama_mahasiswa">Nama Mahasiswa</label>
								<input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" name="nama_mahasiswa" value="{{ old('nama_mahasiswa') ?? $report_f3->nama_mahasiswa  }}">
								@error('nama_mahasiswa')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-sm-1">
							<div class="form-group">
								<label for="izin">Izin</label>
								<input type="text" class="form-control @error('izin') is-invalid @enderror" name="izin" value="{{ old('izin') ?? $report_f3->izin  }}">
								@error('izin')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-sm-1">
							<div class="form-group">
								<label for="tidak_izin">Tidak Izin</label>
								<input type="text" class="form-control @error('tidak_izin') is-invalid @enderror" name="tidak_izin" value="{{ old('tidak_izin') ?? $report_f3->tidak_izin  }}">
								@error('tidak_izin')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="jumlah">Jumlah</label>
								<input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" value="{{ old('jumlah') ?? $report_f3->jumlah  }}">
								@error('jumlah')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-sm">
							<div class="form-group">
								<label for="kelakuan">Kelakuan</label>
								<input type="text" class="form-control @error('kelakuan') is-invalid @enderror" name="kelakuan" value="{{ old('kelakuan') ?? $report_f3->kelakuan  }}">
								@error('kelakuan')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="status_lulus_lalu">Status Lulus SMT Sebelumnya</label>
								<input type="text" class="form-control @error('status_lulus_lalu') is-invalid @enderror" name="status_lulus_lalu" value="{{ old('status_lulus_lalu') ?? $report_f3->status_lulus_lalu  }}">
								@error('status_lulus_lalu')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="status_lulus_baru">Status Lulus SMT Sekarang</label>
								<input type="text" class="form-control @error('status_lulus_baru') is-invalid @enderror" name="status_lulus_baru" value="{{ old('status_lulus_baru') ?? $report_f3->status_lulus_baru  }}">
								@error('status_lulus_baru')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label for="amxsks">AM X SKS</label>
								<input type="text" class="form-control @error('amxsks') is-invalid @enderror" name="amxsks" value="{{ old('amxsks') ?? $report_f3->amxsks  }}">
								@error('amxsks')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label for="ip">IP</label>
								<input type="text" class="form-control @error('ip') is-invalid @enderror" name="ip" value="{{ old('ip') ?? $report_f3->ip  }}">
								@error('ip')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label for="kapita_selekta2">Kap. Selekta 2</label>
								<input type="text" class="form-control @error('kapita_selekta2') is-invalid @enderror" name="kapita_selekta2" value="{{ old('kapita_selekta2') ?? $report_f3->kapita_selekta2  }}">
								@error('kapita_selekta2')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<label for="k3">3</label>
								<input type="text" class="form-control @error('k3') is-invalid @enderror" name="k3" value="{{ old('k3') ?? $report_f3->k3  }}">
								@error('k3')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="metodologi_penelitian2">Metodologi Penelitian 2</label>
								<input type="text" class="form-control @error('metodologi_penelitian2') is-invalid @enderror" name="metodologi_penelitian2" value="{{ old('metodologi_penelitian2') ?? $report_f3->metodologi_penelitian2  }}">
								@error('metodologi_penelitian2')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="k2">2</label>
								<input type="text" class="form-control @error('k2') is-invalid @enderror" name="k2" value="{{ old('k2') ?? $report_f3->k2  }}">
								@error('k2')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label for="bahasa_inggris_komunikasi2">Bahasa Inggris Komunikasi 2</label>
								<input type="text" class="form-control @error('bahasa_inggris_komunikasi2') is-invalid @enderror" name="bahasa_inggris_komunikasi2" value="{{ old('bahasa_inggris_komunikasi2') ?? $report_f3->bahasa_inggris_komunikasi2  }}">
								@error('bahasa_inggris_komunikasi2')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="k2_2">2</label>
								<input type="text" class="form-control @error('k2_2') is-invalid @enderror" name="k2_2" value="{{ old('k2_2') ?? $report_f3->k2_2  }}">
								@error('k2_2')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="tugas_akhir">Tugas Akhir</label>
								<input type="text" class="form-control @error('tugas_akhir') is-invalid @enderror" name="tugas_akhir" value="{{ old('tugas_akhir') ?? $report_f3->tugas_akhir  }}">
								@error('tugas_akhir')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="k6">6</label>
								<input type="text" class="form-control @error('k6') is-invalid @enderror" name="k6" value="{{ old('k6') ?? $report_f3->k6  }}">
								@error('k6')
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