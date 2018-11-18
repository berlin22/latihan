<!DOCTYPE html>
<html>
<body>

<h2>Edit Data Mahasiswa</h2>

<form method="POST" action="{{asset('mahasiswa-update/'.Crypt::encrypt($mahasiswa->id))}}">
  NIM:<br>
  <input type="text" value="{{$mahasiswa->nim}}" name="nim">
  <br>
  Nama:<br>
  <input type="text" value="{{$mahasiswa->nama}}" name="nama">
  <br><br>
  <input type="submit" value="Submit">
  <input type="hidden" name="_token" value="{{csrf_token()}}">



</form> 



</body>
</html>