@extends('layouts.app')

@section('content')

<div class="m-4">
    <h4 style="font-weight: bold">{{ $title }}</h4>
    <p>{{ $detail }}</p>
</div>

<div class="row">
	<div class="col-12">
		@if(session()->has('add'))
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ session()->get('add')}}
		</div>
		@elseif(session()->has('update'))
		<div class="alert alert-primary alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ session()->get('update')}}
		</div>
		@elseif(session()->has('delete'))
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ session()->get('delete')}}
		</div>
		@endif

		<div class="card border border-secondary m-4">
			<div class="card-body">
				<table id="example1" class="table table-bordered display nowrap" width="100%">
                <div class="col-12">
						@if(session('level') == 'Admin')
						<div class="float-right ml-2">
							<a href="{{ route('users.create') }}" class="btn btn border border-secondary" style="background: rgb(235, 235, 235)"><i class="fas fa-plus"></i> Add User</a>
							{{-- <a href="" class="btn btn-secondary"><i class="fas fa-file-excel"></i> Export to Excel</a> --}}
						</div>
						@endif
					</div>
					<thead>
						<tr style="background: rgb(235, 235, 235); text-align: center">
							<th style="width: 20px">NO</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Level</th>
							@if(session('level') == 'Admin')
							<th width="55px">Actions</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td>{{$loop->iteration}}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->username }}</td>
							<td>{{ $user->level }}</td>
							@if(session('level') == 'Admin')
							<td>
								<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
								<form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this?')"><i class="fas fa-trash"></i></button>
								</form>
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
</div>

@endsection