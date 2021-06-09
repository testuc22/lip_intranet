@extends('layouts.admin-app')
@section('title', 'Users-Listng')
@section('content')
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Users Listing</h6>
	    </div>
	    <div class="card-body">
	        <div class="table-responsive">
	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	                <thead>
	                    <tr>
	                        <th>first Name</th>
	                        <th>Last Name</th>
	                        <th>Email</th>
	                        <th>Phone Number</th>
	                        <th>Designation</th>
	                        <th>Created By</th>
	                        <th>Status</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@foreach ($users as $user)
	                		<tr>
	                			<td>{{$user->first_name}}</td>
	                			<td>{{$user->last_name}}</td>
	                			<td>{{$user->email}}</td>
	                			<td>{{$user->phone_number}}</td>
	                			<td>{{$user->role->name}}</td>
	                			<td>{{$user->createdBy->name}}</td>
	                			<td>
	                				<label class="switch">
	                				  <input class="toggle-class" data-id="{{$user->id}}" type="checkbox" {{ $user->status ? 'checked' : '' }}>
	                				  <span class="slider round"></span>
	                				</label>
	                			</td>
	                			<td style="display: flex;">
	                				@if (Auth::user()->role_id == 1)
	                					<a href="{{ route('admin.edit.user.info', ['id'=>$user->id]) }}" class="btn btn-primary btn-sm">Edit</a>
	                					<form method="POST" action="{{ route('admin.delete.user', ['id' => $user->id]) }}">
	                					  @csrf
	                					  @method('DELETE')
	                					  <button type="submit" class="btn btn-danger btn-sm">
	                					    Delete
	                					  </button>
	                					</form>
	                				</td>
	                				@endif
	                				@if (Auth::user()->role_id == 2)
	                					<form method="POST" action="{{ route('admin.delete.user', ['id' => $user->id]) }}">
	                					  @csrf
	                					  @method('DELETE')
	                					  <button type="submit" class="btn btn-danger btn-sm">
	                					    Delete
	                					  </button>
	                					</form>
	                				@endif
	                			</td>
	                		</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
@endsection
@section('scripts')
	<script>
		$(function() {
			$('.toggle-class').change(function() {
				var status = $(this).prop('checked') == true ? 1 : 0; 
				var id = $(this).data('id');
				var url = '{{ route('admin.user.status')}}';
				url = url.replace(':id', id);
				$.ajax({
		            type: "POST",
		            dataType: "json",
		            url: url,
		            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
		            data: {'status': status, 'user_id': id},
		            success: function(data){
		              console.log(data.success)
		              swal("Done!", data.success, "success");
		            }
		        });
			});
		});
	</script>
@endsection