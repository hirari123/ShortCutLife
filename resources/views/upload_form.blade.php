<!-- 画像のアップロードフォームの表示画面 -->

@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="POST" action="{{ route('upload_image') }}" enctype="multipart/form-data">
  @csrf
  <input type="file" name="image" accept="image/png, image/jpeg">

  <p>
    Preview:<br>
    <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width: 200px;">
  </p>

  <script>
   function previewImage(obj)
   {
     var fileReader = new FileReader();
     fileReader.onload = (function() {
       document.getElementById('preview').src = fileReader.result;
     });
     fileReader.readAsDataURL(obj.files[0]);
   }
  </script>

  <input type="submit" value="アップロード">
</form>