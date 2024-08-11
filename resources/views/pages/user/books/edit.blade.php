@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Books</a></div>
                <div class="breadcrumb-item">Add Book</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Add Book</h2>

            <div class="card">
                <form action="{{route('books.update', $book->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-6">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('book_title')
                                is-invalid
                            @enderror"
                                    name="book_title" value="{{$book->book_title}}">
                                @error('book_title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Categori</label>
                                <select name="category_id" class="form-control" value="{{$book->category_id}}">
                                    <option value="{{$book->category_id}}"> {{ $book->category->name_categorie ?? 'Select Category' }}</option>
                                    @foreach ($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name_categorie}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control"  cols="30" rows="10">{{$book->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number"
                                class="form-control @error('stok')
                            is-invalid
                        @enderror"
                                name="stok" value="{{$book->stok}}">
                            @error('stok')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label>File e-Book</label>
                                <input type="file"
                                    class="form-control @error('file_book')
                                is-invalid
                            @enderror"
                                    name="file_book">
                                @error('file_book')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label>Cover</label>
                                <input type="file"
                                    class="form-control @error('book_cover')
                                is-invalid
                            @enderror"
                                    name="book_cover">
                                @error('book_cover')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>

@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
