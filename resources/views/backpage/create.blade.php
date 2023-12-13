<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Data and Edit</title>
</head>
<body>
    <form enctype="multipart/form-data" method="POST" action="{{ isset($pic['id'])?route('adminpage.update',$pic['id']):route('adminpage.store') }} ">

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li> {{ $item }} </li>
            @endforeach
        </ul>
    </div>
        
    @endif

    @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>        
    @endif

        @csrf
        @if(isset($pic['id']))
            @method('PUT')
        @endif
            <div>
                <div>
                    <label for="picup_nama">Nama Picup:</label>
                    <input type="text" id="picup_nama" name="picup_nama"  value="{{ (isset($pic['picup_nama'])?$pic['picup_nama']:old('picup_nama')) }}"><br><br>
                    @error('picup_nama')
                    <div>{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="picup_deskripsi">Deskripsi Picup:</label>
                    <input type="text" id="picup_deskripsi" name="picup_deskripsi" value="{{ isset($pic['picup_deskripsi'])?$pic['picup_deskripsi']:old('picup_deskripsi') }}"><br><br>
                    @error('picup_deskripsi')
                    <div>{{$message}}</div>
                    @enderror
                </div>

                <div>
                    <label for="no_telepon">Nomor Telepon:</label>
                    <input type="text" id="no_telepon" name="no_telepon" value="{{ isset($pic['no_telepon']) ? $pic['no_telepon'] : old('no_telepon') }}"><br><br>
                    @error('no_telepon')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="alamat">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" value="{{ isset($pic['alamat']) ? $pic['alamat'] : old('alamat') }}"><br><br>
                    @error('alamat')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="harga">Harga:</label>
                    <input type="text" id="harga" name="harga" value="{{ isset($pic['harga']) ? $pic['harga'] : old('harga') }}"><br><br>
                    @error('harga')
                        <div>{{ $message }}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="nama_maps">Nama Maps:</label>
                    <input type="text" id="nama_maps" name="nama_maps" value="{{ isset($pic['nama_maps'])?$pic['nama_maps']:old('nama_maps') }}"><br><br>
                    @error('nama_maps')
                    <div>{{$message}}</div>
                    @enderror
                </div>
                
                <div>
                    <label for="maps_latitude">Latitude Maps:</label>
                    <input type="text" id="maps_latitude" name="maps_latitude" value="{{ isset($pic['maps_latitude'])?$pic['maps_latitude']:old('maps_latitude') }}"><br><br>
                    @error('maps_latitude')
                    <div>{{$message}}</div>
                    @enderror 
                </div>
                
                <div>
                    <label for="maps_longitude">Longitude Maps:</label>
                    <input type="text" id="maps_longitude" name="maps_longitude" value="{{ isset($pic['maps_longitude'])?$pic['maps_longitude']:old('maps_longitude') }}"><br><br>
                    @error('maps_longitude')
                    <div>{{$message}}</div>
                    @enderror 
                </div>
            
                <button type="submit">Submit</button>
            </div>
    </form>
</body>
</html>
