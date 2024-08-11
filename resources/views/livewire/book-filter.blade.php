<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <input type="text" wire:model.live="search" class="form-control" placeholder="Search by book title...">
                    </div>
                    <div class="form-group" class="col-4">
                        <select wire:model.live="category" class="form-control">
                            <option value="">All</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{$item->name_categorie}}</option>
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
                            @forelse ($books as $item)
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
                            @empty
                            <tr>
                                <td colspan="12" class="text-center">
                                    Data Kosong
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="float-right">
                
                </div>
            </div>
        </div>
    </div>
</div>