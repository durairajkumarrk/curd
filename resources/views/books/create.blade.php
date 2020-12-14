@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Books <b class="pull-right"> <a class="btn btn-xs btn-primary"href="{{ url('books') }}"> View All Book </a></b></div>

                <div class="panel-body">
                  <form method="post" action="{{url('books')}}">
                    <div class="form-group row">
                      {{csrf_field()}}
                      <label for="formName" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="formName" placeholder="Name" name="name" value="{{ old('name') }}">
                          @if($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="formIsbn" class="col-sm-2 col-form-label col-form-label-sm">ISBN</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="formIsbn" placeholder="ISBN" name="isbn" value="{{ old('isbn') }}">
                          @if($errors->has('isbn'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('isbn') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="formPrice" class="col-sm-2 col-form-label col-form-label-sm">Price</label>
                      <div class="col-sm-10">
                        <input type="number" min="0" class="form-control form-control-lg" id="formPrice" placeholder="Price" name="price" value="{{ old('price') }}" step=".01">
                          @if($errors->has('price'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('price') }}</strong>
                              </span>
                          @endif
                      </div>
                    </div>
                    <div class="form-group row ">
                      <div class="col-md-2"></div>
                      <div class="col-md-10">
                        <input type="submit" class="btn btn-block btn-sm btn-primary ">
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
