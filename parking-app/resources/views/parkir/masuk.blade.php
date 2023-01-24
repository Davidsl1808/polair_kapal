<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <div class="container mt-5">           
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left mb-3">
                                    <h2>Add New Masuk</h2>
                                    {{$kategori}}
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary mb-3" href="{{ route('member.index') }}"> Back</a>
                                </div>
                            </div>
                        </div>
                           
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('gagal'))
                            <div class="alert alert-danger">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form action="{{ route('parkir.store') }}" method="POST">
                            @csrf
                            
                       
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-5">
                                        <strong>No Polisi:</strong>
                                        <input id="nospace" onkeypress="return event.which != 32" type="text" style="text-transform:uppercase;" name="No_pol"  class="form-control" placeholder="Nomor Polisi">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-5">
                                        <strong>Kategori:</strong>
                                        <select class="form-select" name="id_kategori" aria-label="Default select example">
                                            <option selected>Open this select menu</option>
                                            @foreach ($kategori as $item)
                                                <option value="{{$item->id}}">{{$item->nama_kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mb-5">
                                        <strong>Jam Masuk:</strong>
                                        <input type="datetime-local" name="jam_masuk"  class="form-control" placeholder="Nomor Polisi">
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                  <button type="submit" class="btn btn-primary ">Tambah</button>
                                </div>
                            </div>
                       
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script>
            $('#nospace').keydown(function(e) {
                if (e.keyCode == 32) {
                    return false;
                }
            });
        </script>
    </div>
</x-app-layout>