@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Books <b class="pull-right"> <a class="btn btn-xs btn-primary" href="{{ url('books/create') }}"> Add New Book </a></b></div>
                <div class="panel-body">
                    <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>ISBN</th>
                        <th class="number-column">Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sno=0; ?>  
                      @forelse($books as $book)
                      <tr>
                        <td>{{ ++$sno }}</td>
                        <td>{{$book['name']}}</td>
                        <td>{{$book['isbn']}}</td>
                        <td class="number-column">{{number_format($book['price'],2)}}</td>
                        <td> 
                          <a href="{{action('BookController@edit', $book['id'])}}" class="btn btn-xs btn-warning">Edit</a>
                        <td> 
                          <form action="{{action('BookController@destroy', $book['id'])}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-xs btn-danger" type="submit">Delete</button>
                          </form> 
                        </td>
                      </tr>
                      @empty
                      <tr class="no-record">
                        <td colspan="6">No Records Found</td>
                      </tr>
                      @endforelse
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
