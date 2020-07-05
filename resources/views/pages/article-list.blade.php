@extends('layouts.master')

@section('title',"Artikel List")

@section('content')
<a href="{{route('artikel.add-form')}}" class="btn btn-primary mt-2 mb-2"> Tambah Artikel</a>
<div class="card">
    <div class="card-body p-0">
      <table class="table  projects">
          <tbody>
              @foreach ($articles as $article)
              <tr>
                  <td width="85%">
                    <a href="{{route('artikel.detail',['id'=>$article->id])}}">
                        <strong> {{$article->judul}}</strong>
                      </a>
                      <br/>
                  </td>
                  <td>
                    <a href="{{route('artikel.detail',['id'=>$article->id])}}" class="btn btn-success btn-sm m-1">
                      <i class="far fa-eye"></i>
                    </a>
                    <a href="{{route('artikel.edit-form',['id'=>$article->id])}}" class="btn btn-warning btn-sm m-1">
                      <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{route('artikel.delete',['id'=>$article->id])}}" style="display:inline;" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger btn-sm m-1 "><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>
              </tr>
              @endforeach
              
          </tbody>
      </table>
    </div>
  </div>
@endsection
@push('scripts')
<script>
  Swal.fire({
      title: 'Berhasil!',
      text: 'Memasangkan script sweet alert 😊',
      icon: 'success',
      confirmButtonText: 'Cool'
  })
</script>
@endpush