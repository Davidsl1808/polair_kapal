

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
                            
                            <tr>
                                <td>1</td>
                                <td>{{ $Data_kendaraan->kendaraan->nama_kategori }}</td>
                                <td>{{ $Data_kendaraan->No_pol }}</td>
                                <td>{{ $Data_kendaraan->jam_masuk }}</td>
                                <td>{{ $Data_kendaraan->jam_keluar }}</td>
                                <td>{{ $Data_kendaraan->bayar }}</td>
                                <td>{{ $Data_kendaraan->petugas->username }}</td>
                                <td>{{ $Data_kendaraan->status_member }}</td>
                                
                                {{-- <td>
                                    <form action="{{ route('member.destroy',$p->id) }}" method="POST">
                        
                        
                                        <a class="btn btn-primary" href="{{ route('member.edit',$p->id) }}">Edit</a>
                        
                                        @csrf
                                        @method('DELETE')
                          
                                        <button type="submit" class="btn btn-warning text-danger">Delete</button>
                                    </form>
                                </td> --}}
                            </tr>
                         
                        </table>
                        <div class="card" style="width: 30rem;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Nomor Polisi</h2>
                                    </div>
                                    <div class="col-1">
                                        <h2>:</h2>
                                    </div>
                                    <div class="col-7">
                                        <h2>{{ $Data_kendaraan->No_pol }}</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Kategori</h2>
                                    </div>
                                    <div class="col-1">
                                        <h2>:</h2>
                                    </div>
                                    <div class="col-7">
                                        <h2>{{ $Data_kendaraan->kendaraan->nama_kategori }}</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Jam Masul</h2>
                                    </div>
                                    <div class="col-1">
                                        <h2>:</h2>
                                    </div>
                                    <div class="col-7">
                                        <h2>{{ $Data_kendaraan->jam_masuk }}</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Jam KEluar</h2>
                                    </div>
                                    <div class="col-1">
                                        <h2>:</h2>
                                    </div>
                                    <div class="col-7">
                                        <h2>{{ $Data_kendaraan->jam_keluar }}</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Status</h2>
                                    </div>
                                    <div class="col-1">
                                        <h2>:</h2>
                                    </div>
                                    <div class="col-7">
                                        <h2>{{ $Data_kendaraan->status_member }}</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h2>Total Harga</h2>
                                    </div>
                                    <div class="col-1">
                                        <h2>:</h2>
                                    </div>
                                    <div class="col-7">
                                        <h2>{{ $Data_kendaraan->bayar }}</h2>
                                    </div>
                                </div>
                            </div>
                            
                            <form action="/parkir/refund/{{$Data_kendaraan->id}}" method="post">
                                @csrf
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-5">
                                        <strong>Bayar:</strong>
                                        <input type="number" name="refund"  class="form-control" placeholder="Harga/Jam">
                                    </div>
                                </div>
                                {{-- <a class="btn btn-primary" href="{{ route('parkir.bayar',$Data_kendaraan->id) }}">Edit</a> --}}
                                {{-- <a class="btn btn-primary" href="/parkir/refund/{{$Data_kendaraan->id}}">Edit</a> --}}
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary ">Tambah</button>
                                </div>
                            </form>
                        </div>
                        {{-- {!! $riwayatParkir->links() !!} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>