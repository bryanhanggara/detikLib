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
            <h1>Books</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Books

                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <form action="" method="get" class="col-md-4">
                                    @csrf
                                    <input class="form-control"
                                    name="name"
                                    type="search"
                                    placeholder="Search"
                                    aria-label="Search"
                                    data-width="250">
                                <button class="btn"
                                    type="submit"></button>
                                </form>
                                <div class="form-group" class="col-4">
                                    <select name="" id="" class="form-control">
                                        <option value="">All</option>
                                        @foreach ($categories as $item)
                                            <option value="">{{$item->name_categorie}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table-striped table"
                                    id="table-1">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Book Category</th>
                                            <th>Description</th>
                                            <th>Stok</th>
                                            <th>e-Book</th>
                                            <th>Cover</th>
                                            <th>More</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $item)
                                        <tr>
                                             <td>{{$item->book_title}}</td>
                                             <td>{{$item->category->name_categorie}}</td>
                                             <td>{{$item->description}}</td>
                                             <td>{{$item->stok}}</td>
                                             <td>
                                                <iframe src="{{ asset('storage/' . $item->file_book) }}" width="100%" height="200"></iframe>
                                                <a href="{{ asset('storage/' . $item->file_book) }}">Open PDF</a>
                                             </td>
                                             <td>
                                                <img src="{{asset('storage/' . $item->book_cover)}}" alt="cover" width="100%" height="200">
                                             </td>
                                             <td>
                                                 <a href="" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                                {{-- <a href="{{route('books.edit', $item->id)}}" class="btn btn-warning"><i class="fa fa-pen"></i></a>
                                                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('destroyForm').submit();"><i class="fa fa-trash"></i></a>
                                                <form id="destroyForm" action="{{ route('books.destroy', $item->id) }}" method="post" style="display: none;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"></button> --}}
                                                </form>
                                             </td>
                                        </tr>
                                    @endforeach
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
