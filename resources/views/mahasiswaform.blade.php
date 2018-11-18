<!DOCTYPE html>
<html>
<body>

<h2>Tambah Data Mahasiswa</h2>

<form method="POST" action="{{asset('mahasiswa-update/{id}')}}">
  NIM:<br>
  <input type="text" name="nim" >
  <br>
  Nama:<br>
  <input type="text" name="nama" >
  <br><br>
  <input type="submit" value="Submit">
  <input type="hidden" name="_token" value="{{csrf_token()}}">



</form> 



</body>
</html>