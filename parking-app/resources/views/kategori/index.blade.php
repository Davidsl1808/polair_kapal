

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kategori') }}
            
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container ">
                        <div class="row">
                            
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2 class="fw-bold mb-4">Daftar Kategori</h2>
                                    
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-success mb-3" href="{{ route('kategori.create') }}"> Create New Kategori</a>
                                </div>
                            </div>
                        </div>
                        
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Harga/Jam</th>
                                
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($kategori as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama_kategori }}</td>
                                <td>{{ $p->harga_jam }}</td>
                                
                                <td>
                                    <form action="{{ route('kategori.destroy',$p->id) }}" method="POST">
                        
                        
                                        <a class="btn btn-primary" href="{{ route('kategori.edit',$p->id) }}">Edit</a>
                        
                                        @csrf
                                        @method('DELETE')
                          
                                        <button type="submit" class="btn btn-warning text-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        
                        {!! $kategori->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>