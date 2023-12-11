<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body class="bg-light">
<main class="container">
        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
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

            <form action='' method='post'>
                @csrf

                @if (Route::current()->uri == 'book/{id}')
                @method('put')
                @endif

                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='title' id="judul" 
                        value="{{ isset($data['title'])?$data['title']:old('title') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Pengarang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='author' id="pengarang" 
                        value="{{ isset($data['author'])?$data['author']:old('author') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tanggal_publikasi" class="col-sm-2 col-form-label">Tanggal Publikasi</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control w-50" name='date_public' id="tanggal_publikasi" value="{{ isset($data['date_public'])?$data['date_public']:old('date_public') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit"  class="btn btn-primary" name="submit">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->

        @if (Route::current()->uri == 'book')
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-4">Judul</th>
                        <th class="col-md-3">Pengarang</th>
                        <th class="col-md-2">Tanggal Publikasi</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach ($data as $item)
                        
                   
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['author'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($item['date_public'])->format('H:i:s d/m/Y') }}</td>
                        <td>
                            <a href=" {{ url('book/'.$item['id']) }} " class="btn btn-warning btn-sm">Edit</a>  

                            <form action="{{ url('book/'.$item['id']) }}" method="POST" onsubmit="return confirm('Are you ready to  lus this data')" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                            </form>

                        </td>
                    </tr>
                    @php $i++; @endphp
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- AKHIR DATA -->
        @endif

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>
</html>