@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('users.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="name">Nama User</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
								@error('name')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
								@error('username')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
								@error('email')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
								@error('password')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="level">Level</label>
								<select name="level" class="form-control @error('level') is-invalid @enderror">
									<option value="">Pilih Level</option>
									<option value="Admin">Admin</option>
									<option value="Petugas">Petugas Evaluasi</option>
									<option value="Kajur">Kajur</option>
									<option value="kaprodi">Kaprodi</option>
									<option value="Dosen">Dosen</option>
								</select>
								@error('level')
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