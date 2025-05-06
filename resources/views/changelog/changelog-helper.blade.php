@extends('layouts.app')

@section('title', $title)

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">{{ $title }}</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4>{{ __($title) }}</h4>
                        </div> --}}
                        <div class="card-body">
                            <div id="accordion">
                                @foreach ($changelogs as $changelog)
                                    <div class="accordion">
                                        <div class="accordion-header {{ !$loop->last ? 'collapsed' : '' }}" role="button"
                                            data-toggle="collapse" data-target="#panel-body-{{ $changelog->id }}"
                                            aria-expanded="{{ $loop->last ? 'true' : 'false' }}">
                                            <h4>{{ $changelog->caption }}</h4>
                                        </div>
                                        <div class="accordion-body collapse {{ $loop->last ? 'show' : '' }}"
                                            id="panel-body-{{ $changelog->id }}" data-parent="#accordion" style="">
                                            @if ($changelog->versi)
                                                <p class="mb-0 font-weight-bold">Version {{ $changelog->versi }}</p>
                                            @endif
                                            <div class="mb-0">{{ $changelog->desc }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
