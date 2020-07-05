@extends('layouts.master')
@section('title',$title)
    
@section('content')
<div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <!-- /.card-header -->
          <!-- form start -->
        <form role="form" method="POST" action="{{$url}}">
            @csrf
            @if (isset($article))
              @method('PUT')  
            @endif
            <div class="card-body">
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Tambah Judul" value="{{$article->judul ?? ''}}">
              </div>
              <div class="form-group">
                <label for="tag">Tag</label>
                <input type="text" class="form-control" name="tag" id="tag" placeholder="Tambah Tag (gunakan koma untuk pemisah)" value="{{$tag ?? ''}}">
              </div>
              <div class="form-group">
                <label for="artikel">Artikel</label>
                <textarea class="form-control" rows="5" id="artikel" name="artikel" placeholder="Tambah Artikel" style="height: 103px;" value="">{{$article->isi ?? ''}}</textarea>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card -->

        

      </div>
      <!--/.col (left) -->
      
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
  @endsection

  