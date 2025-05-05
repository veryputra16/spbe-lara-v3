@extends('layouts.app')

@section('title', 'Hak Akses')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Hak Akses</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Hak Akses</div>
            </div>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Edit Profile') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <form action="{{ route('hakakses.index') }}" method="GET">
                                            <div class="input-group">
                                                <input type="text" name="search" class="form-control"
                                                    placeholder="Cari Berdasarkan Nama...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" style="margin-left:5px;"
                                                        type="submit">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            {{-- <th>Email</th> --}}
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hakakses as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->username }}</td>
                                                <td>{{ $item->name }}</td>
                                                {{-- <td>{{ $item->email }}</td> --}}
                                                <td>{{ $item->role }}</td>

                                                <td>
                                                    <a href="{{ route('hakakses.edit', $item->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form action="{{ route('hakakses.delete', $item->id) }}" method="POST"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td> <!-- Add Edit and Delete buttons for each row -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
