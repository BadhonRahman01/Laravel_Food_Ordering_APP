@extends('welcome2')
@section('title', 'Menu Index')
@section('content')
    <div class="row py-5">
        <div class="col-lg-12 margin-tb py-3">
            <div class="pull-left">
                <h2>Menu List</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('menus.create') }}"> Create New Menu</a>
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
            <th>Serial No</th>
            <th>Menu ID</th>
            <th>Name</th>
            <th>Category ID</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($menus as $menu)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $menu->menu_id }}</td>
            <td>{{ $menu->name }}</td>
            <td>{{ $menu->category_id }}</td>
            <td>
                <form action="{{ route('menus.destroy',$menu->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('menus.show',$menu->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('menus.edit',$menu->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $menus->links() !!}
      
@endsection

