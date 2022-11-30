
@extends('banners.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Banner</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('banners.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
        There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('banners.update',$banner->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Banner ID:</strong>
                    <input type="integer" name="banner_id" value="{{ $banner->banner_id }}" class="form-control" placeholder="ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $banner->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image URL:</strong>
                    {{-- <input type="url" name="imageUrl" value="{{ $category->imageUrl }}" class="form-control" placeholder="imageUrl" hidden> --}}
                    <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="imageUrl" accept="image/*"></span>
                    {{-- <textarea class="form-control" style="height:150px" name="imageUrl" placeholder="URL">{{ $banners->imageUrl }}</textarea> --}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Redirection URL:</strong>
                    <input type="url" name="redirectUrl" value="{{ $banner->redirectUrl }}" class="form-control" placeholder="URL">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category ID:</strong>
                    <input type="integer" name="category_id" value="{{ $banner->category_id }}" class="form-control" placeholder="ID">
                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        @foreach ($categories as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message  }}
                        </div>
                      @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection