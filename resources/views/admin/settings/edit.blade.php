@extends('admin.layouts.app')
@section('content')
<div class="page-content">
   <div class="container-fluid">
      <div class="row ledger-add-form">
         <div class="col-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div>
                     <h4>🌾 Edit Settings</h4>
                  </div>
                  <a href="{{ route('admin.settings.index') }}" class="btn btn-primary" >
                  ⬅ Back
                  </a>
               </div>
               <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('post')
                  <div class="mb-3">
                     <label for="key" class="form-label">Key <span class="text-danger">*</span></label>
                     <input type="text" name="key" id="key" class="form-control" value="{{ old('key', $setting->key) }}" required>
                     @error('key')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <div class="mb-3">
                     <label for="value" class="form-label">Value</label>
                     <textarea name="value" id="value" class="form-control" rows="6">{{ old('value', $setting->value) }}</textarea>
                     @error('value')
                     <div class="text-danger">{{ $message }}</div>
                     @enderror
                  </div>
                  <button type="submit" class="btn btn-success">Update</button>
                  
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
   document.addEventListener("DOMContentLoaded", function() {
       ClassicEditor
           .create(document.querySelector('#value'))
           .catch(error => {
               console.error(error);
           });
   });
</script>
@endsection