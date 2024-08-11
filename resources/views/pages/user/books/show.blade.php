@extends('layouts.app')

@section('title', 'Book Detail')

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
            <h1>Book Detail</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Book

                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">                     
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-striped table"
                                    id="table-1">
                                   
                                   <tbody>
                                        <tr>
                                            <td>Cover</td>
                                            <td>
                                                <img src="{{asset('storage/' . $book->book_cover)}}" alt="cover" width="50%">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Book</td>
                                            <td>{{$book->book_title}}</td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td>{{$book->category->name_categorie}}</td>
                                        </tr>
                                        <tr>
                                            <td>Posted By</td>
                                            <td>{{$book->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Description</td>
                                            <td>{{$book->description}}</td>
                                        </tr>
                                        <tr>
                                            <td>File eBook</td>
                                            <td>
                                                <iframe src="{{ asset('storage/' . $book->file_book) }}" width="100%" height="500"></iframe>
                                                <a href="{{ asset('storage/' . $book->file_book) }}">Open PDF</a>
                                            </td>
                                        </tr>

                                   </tbody>
                                </table>
                            </div>
                            <div class="float-right">
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
