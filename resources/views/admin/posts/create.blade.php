@extends('layouts.app')
@section('content')
<form action="{{route('admin.posts.store')}}" method="post">
  @if($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach($errors->all() as $error)
                      <li>{{$error}}</li> 
                  @endforeach
              </ul>
          </div>
      @endif
  @csrf
  <div class="mb-3">
    <label for="titolo" class="form-label">Titolo</label>
    <input type="text" name="title" class="form-control" id="titolo" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
  <label for="category" class="form-label">Categoria</label>
  <select name="category_id" id="category" class="form-control">
      <option value="">
          - - Seleziona una categoria - - 
      </option>
      @foreach($categories as $category)
          <option value="{{$category->id}}" 
          @if($category->id == old('category_id'))
          selected
          @endif>
          {{$category->name}}
          </option>
      @endforeach
  </select>
  </div>
  <div class="form-floating">
    <label for="descrizione" class="form-label">Descrizione</label>
    <textarea class="form-control" name="content" id="descrizione" style="height: 100px"></textarea>
</div>
  <button type="submit" class="btn btn-primary mt-5">Submit</button>
</form>
@endsection