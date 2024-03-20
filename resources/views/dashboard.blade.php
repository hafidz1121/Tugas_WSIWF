@extends('layouts.app')

@section('content')  
<div class="card">
    <div class="card-header">Dashboard</div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>Selamat Datang, <b>{{ $nama }} !</b></p>
            <footer class="blockquote-footer">
                Anda Login Sebagai 
                <cite title="Source Title">
                    <b>{{ ucfirst($role) }}</b>
                </cite>
            </footer>
        </blockquote>
    </div>
</div>
@endsection