<!DOCTYPE html>
<html>
<head>
    <title>LAporan Riwayat Parkir</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>
  
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
            <td>{{ $p->petugas->name }}</td>
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
  
</body>
</html>
