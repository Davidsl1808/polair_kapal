

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Riwayat') }}
            
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
                                    <h2 class="fw-bold mb-4">Daftar Riwayat Parkir keluar</h2>
                                    
                                </div>
                                {{-- <div class="pull-right">
                                    <a class="btn btn-success mb-3" href="{{ route('member.create') }}"> Create New Member</a>
                                </div> --}}
                            </div>
                        </div>
                        
                        {{-- @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif --}}
                        <div class="d-flex justify-content-start mb-4">
                            <a class="btn btn-primary" href="{{ URL::to('generate-pdfParkir') }}">Export to PDF</a>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nomor Polisi</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Bayar</th>
                                <th>Petugas</th>
                                <th>Status</th>
                                
                                
                                {{-- <th width="280px">Action</th> --}}
                            </tr>
                            @foreach ($riwayatParkir as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->kendaraan->nama_kategori }}</td>
                                <td>{{ $p->No_pol }}</td>
                                <td>{{ $p->jam_masuk }}</td>
                                <td>{{ $p->jam_keluar }}</td>
                                <td>{{ $p->bayar }}</td>
                                <td>{{ $p->petugas->username }}</td>
                                <td>{{ $p->status_member }}</td>
                                
                                {{-- <td>
                                    <form action="{{ route('member.destroy',$p->id) }}" method="POST">
                        
                        
                                        <a class="btn btn-primary" href="{{ route('member.edit',$p->id) }}">Edit</a>
                        
                                        @csrf
                                        @method('DELETE')
                          
                                        <button type="submit" class="btn btn-warning text-danger">Delete</button>
                                    </form>
                                </td> --}}
                            </tr>
                            @endforeach
                        </table>
                        
                        {{-- {!! $riwayatParkir->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>