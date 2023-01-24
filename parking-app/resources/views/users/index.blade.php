

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar PEtugas') }}
            
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
                                    <h2 class="fw-bold mb-4">Daftar Petugas Kita</h2>
                                    
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-success mb-3" href="{{ route('users.create') }}"> Create New Petugas</a>
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
                                <th>Name</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($users as $p)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->username }}</td>
                                <td>{{ $p->role }}</td>
                                <td>
                                    <form action="{{ route('users.destroy',$p->id) }}" method="POST">
                        
                        
                                        <a class="btn btn-primary" href="{{ route('users.edit',$p->id) }}">Edit</a>
                        
                                        @csrf
                                        @method('DELETE')
                          
                                        <button type="submit" class="btn btn-warning text-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>