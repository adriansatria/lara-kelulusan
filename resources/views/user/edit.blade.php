@extends('layouts.app')

@section('content')


<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('users.update', $user->id) }}" method="POST">
					@method('PATCH')
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="name">Nama User</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}">
								@error('name')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') ?? $user->username }}">
								@error('username')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}">
								@error('email')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<label for="password">Password Baru</label>
								<input type="password" class="form-control" name="password">
							</div>
							<div class="form-group">
								<label for="level">Level</label>
								<select name="level" class="form-control @error('level') is-invalid @enderror">
									@if($user->level == 'Admin')
									<option value="{{ $user->level }}">{{ $user->level }}</option>
									<option value="Petugas">Petugas</option>
									<option value="Kaprodi">Kaprodi</option>
									<option value="Kajur">Kajur</option>
									<option value="Dosen">Dosen</option>
									@elseif($user->level == 'Petugas')
									<option value="{{ $user->level }}">{{ $user->level }}</option>
									<option value="Admin">Admin</option>
									<option value="Kaprodi">Kaprodi</option>
									<option value="Kajur">Kajur</option>
									<option value="Dosen">Dosen</option>
									@elseif($user->level == 'Kaprodi')
									<option value="{{ $user->level }}">{{ $user->level }}</option>
									<option value="Admin">Admin</option>
									<option value="Kajur">Kajur</option>
									<option value="Dosen">Dosen</option>
									@elseif($user->level == 'Kajur')
									<option value="{{ $user->level }}">{{ $user->level }}</option>
									<option value="Admin">Admin</option>
									<option value="Petugas">Petugas</option>
									<option value="Kaprodi">Kaprodi</option>
									<option value="Dosen">Dosen</option>
									@elseif($user->level == 'Dosen')
									<option value="{{ $user->level }}">{{ $user->level }}</option>
									<option value="Admin">Admin</option>
									<option value="Petugas">Petugas</option>
									<option value="Kaprodi">Kaprodi</option>
									<option value="Kajur">Kajur</option>
									@endif
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