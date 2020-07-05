@extends('layouts.master')
@section('title',$article->judul)
    
@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <!-- /.card-header -->
          <!-- form start -->
            <div class="card-body">
              <h3>Judul : {{$article->judul}}</h3>
              <h6>Slug : {{$article->slug}}</h6>
              <p>{{$article->isi}}</p>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              @foreach ($tags as $tag)
                <a href="" class="btn btn-success">{{$tag->name}}</a>
              @endforeach
            </div>
          
        </div>
        <!-- /.card -->

        

      </div>
      <!--/.col (left) -->
      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
  @endsection

  