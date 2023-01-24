

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Belom Bayar') }}
            
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
                                    <h2 class="fw-bold mb-4">Daftar Belom Keluar</h2>
                                    
                                </div>
                                
                                <form class="d-flex mb-4" role="search" method="get" action="">
                                    <input onkeypress="return event.which != 32" class="form-control me-2" name="cari" style="text-transform:uppercase;" type="search" placeholder="Cari No Polisi" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
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
                                <th>No Polisi</th>
                                <th>Kategori</th>
                                <th>Masuk</th>
                                <th>Status Parkir</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($parkirkeluarList as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->No_pol }}</td>
                                <td>{{ $p->kendaraan->nama_kategori }}</td>
                                <td>{{ $p->jam_masuk }}</td>
                                <td>{{ $p->status_parkir }}</td>
                                <td>
                                    <form action="{{ route('users.destroy',$p->id) }}" method="POST">
                        
                        
                                        <a class="btn btn-primary" href="/parkir/bayar/{{$p->id}}">Bayar</a>
                        
                                        @csrf
                                        @method('DELETE')
                          
                                        <button type="submit" class="btn btn-warning text-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        
                        {{-- {!! $parkirkeluarList->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>