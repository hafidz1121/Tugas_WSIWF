@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h4 class="mt-2">Data User</h4>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('user.store') }}" class="btn btn-success">
                    Add Data User
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="myTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)    
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td class="text-center">
                        <div class="row">
                            <div class="col-sm-6 text-end">
                                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-warning">
                                    Update
                                </a>
                            </div>

                            <div class="col-sm-6 text-start">
                                <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST">
                                    @csrf
        
                                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection