@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
      <h1>Tables</h1>
    </div>
    <div class="container-fluid">
      <hr>
      @if (Session::has('errors'))
      <div class="alert alert-success">{{session('errors')}}</div>
      @endif
      <div class="row-fluid">
        <div class="span12">
         
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
              <h5>View Category</h5>
            </div>
            <div class="widget-content nopadding">
              <table class="table table-bordered data-table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Url</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        
                    
                  <tr class="gradeX">
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->url}}</td>
                    <td class="center"><a href="{{url('/admin/edit-category',$item->id)}}" class="btn btn-primary btn-mini">Edit</a> <a href="{{url('/admin/add-category')}}" class="btn btn-danger btn-mini">Delete</a></td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection