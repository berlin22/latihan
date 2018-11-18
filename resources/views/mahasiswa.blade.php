<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
	<title></title>
	<style>
table {
    border-collapse: collapse;
    width: 70%;
    position: center;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head>

<body>

<div class="d1" style="position: relative; left: 15%; top:40px;">
<a href="{{asset('mahasiswa-tambah')}}" ali> Tambah</a>
<table>
<tbody>
		<!-- @foreach($mahasiswa as $row)
		{{$row->nama}}
		@endforeach -->
	<tr>
		<td>id</td>
		<td>nim</td>
		<td>nama</td>
		<td>Action</td>
	</tr>
	@foreach($mahasiswa as $row)
	<tr>
	
		<td>
		{{$row->id}}
		</td>
		<td>{{$row->nim}}</td>
		<td>{{$row->nama}}</td>
		<!-- <td> <a href="{{asset('mahasiswa-hapus')}}/{{$row->id}}"> hapus</td> -->
		<td> <a href="{{asset('mahasiswa-hapus/'.Crypt::encrypt($row->id))}}" onclick="return confirm('are you sure ?')"> hapus </a> | <a href="{{asset('mahasiswa-edit')}}/{{$row->id}}"> Edit </a>
		</td>
	</tr>
	@endforeach
</tbody>
</table>
@if(Session::get('message')!='')
<script >
	alert('{{Session::get('message')}}');
</script>
@endif
</div>
</body>
</html>
