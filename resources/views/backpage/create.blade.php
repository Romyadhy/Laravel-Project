<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Data and Edit</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action=" {{route('adminPages.store')}} ">

        {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li> {{ $item }} </li>
            @endforeach
        </ul>
    </div>
        
    @endif --}}
{{-- 
    @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>        
    @endif --}}

        @csrf
        @if(isset($pic['id']))
            @method('PUT')
        @endif

        @method('post')
            <div>
                <div>
                    <label for="nama">Nama Picup:</label>
                    <input type="text" id="nama" name="nama"  value="{{ (isset($pic['nama'])?$pic['deskripsi']:old('nama')) }}"><br><br>
                    @error('nama')
                    <div>{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="deskripsi">Deskripsi Picup:</label>
                    <input type="text" id="deskripsi" name="deskripsi" value="{{ isset($pic['deskripsi'])?$pic['picup_deskripsi']:old('deskripsi') }}"><br><br>
                    @error('deskripsi')
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
                    <label for="latitude">Latitude Maps:</label>
                    <input type="text" id="latitude" name="latitude" value="{{ isset($pic['latitude'])?$pic['latitude']:old('latitude') }}"><br><br>
                    @error('latitude')
                    <div>{{$message}}</div>
                    @enderror 
                </div>
                
                <div>
                    <label for="longitude">Longitude Maps:</label>
                    <input type="text" id="longitude" name="longitude" value="{{ isset($pic['longitude'])?$pic['maps_lolongitudengitude']:old('longitude') }}"><br><br>
                    @error('longitude')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror 
                </div>

                <div class="my-4 text-md">
                    <label class="font-bold">Upload image:</label>:</label>
                    <input class="" type="file" name="image" accept="image/*" value="{{(isset($event))?$event->image:old('image')}}">
                    @error('image')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
            
                <button type="submit">Submit</button>
            </div>
    </form>
</body>
</html>
