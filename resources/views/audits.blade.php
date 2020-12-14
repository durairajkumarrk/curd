@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b> Audit Log for Books </b></div>
                <div class="panel-body">
                <table class="table" >
                    <thead class="thead-dark">
                      <tr>
                        <th>Id</th>
                        <th>Action</th>
                        <th>User</th>
                        <th>Time</th>
                        <th>Old Values</th>
                        <th>New Values</th>
                      </tr>
                    </thead>
                    <tbody id="audits">
                      @forelse($audits as $audit)
                        <tr>
                          <td>{{ $audit->auditable_id }}</td>
                          <td>{{ $audit->event }}</td>
                          <td>{{ $audit->user->name }}</td>
                          <td>{{ date('d/m/y h:i:s A',strtotime($audit->created_at)) }}</td>
                          <td>
                            <table class="table">
                              @foreach($audit->old_values as $attribute => $value)
                                <tr>
                                  <td><b>{{ $attribute }}</b></td>
                                  <td>{{ $value }}</td>
                                </tr>
                              @endforeach
                            </table>
                          </td>
                          <td>
                            <table class="table">
                              @foreach($audit->new_values as $attribute => $value)
                                <tr>
                                  <td><b>{{ $attribute }}</b></td>
                                  <td>{{ $value }}</td>
                                </tr>
                              @endforeach
                            </table>
                          </td>
                        </tr>
                      @empty
                        <tr class="no-record"> <td colspan="6">No Records Found</td></tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
