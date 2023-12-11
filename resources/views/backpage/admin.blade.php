@extends('layouts.indexAdmin')
@section('content')
<title>Admin Pages</title>
<section class="flex">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-gray-300 w-1/5 min-h-screen">
            <div class="py-4 px-6">
                <h2 class="text-xl font-semibold">Dashboard Admin Pages</h2>
            </div>
            <div class="px-6 py-6">
                <a href="" class="my-4 text-gray-400 hover:text-gray-600 duration-300">AdminPage</a>

            </div>
        </aside>


    <!-- Main Content -->
  <main class="w-4/5 p-6">
            <!-- Search Bar -->
            <div class="flex items-center mb-6 ">
                <form action="" class="flex " method="GET">
                    <input type="text" name="search" placeholder="Find Data..." class="border border-gray-300 px-3 py-2 rounded-md w-[50rem]">
                    <button type="submit" class="bg-gray-700 text-white px-4 py-2 ml-2 rounded-md">Find</button>
                </form>

            </div>
            
            <!-- Admin Content -->
            <div class="bg-white shadow-md rounded-md p-4">
                <h1 class="text-xl font-semibold mb-4">Welcome to Admin Pages</h1>
            </div>

            <div>
                    <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1 ">
                    <div class="grid grid-cols-12">
                    <div class="col-span-6 p-4">
                    
                    <a href="{{ route('adminpage.create') }}">
                    <button class="px-4 py-1 text-sm rounded text-purple-600 font-semibold border border-purple200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outlinenone">Create</button>
                    </a>

                  


                   
                    </div>

                  


                
                    </div>
                    <div class="py-2 align-middle inline-block min-w-full sm:px-4 lg:px-4">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200" id="myTable">
                                <thead class="bg-gray-50 ">
                                <tr class="bg-gray-700 text-white">
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray500 uppercase tracking-wider border-2">
                                    No
                                    </th>
                                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray500 uppercase tracking-wider border-2 ">
                                    Name
                                    </th>
                                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray500 uppercase tracking-wider border-2 ">
                                    Deskripsi
                                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray500 uppercase tracking-wider border-2 ">
                                    Latitude
                                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray500 uppercase tracking-wider border-2 ">
                                    Longitude
                                    </th>
                                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray500 uppercase tracking-wider border-2 ">
                                    Image
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray500 uppercase tracking-wider border-2">
                                    Action
                                    </th>
                                </tr>
                                </thead>



                                <tbody class="bg-white divide-y divide-gray-200 ">
                                @php
                                    $counter = 1; 
                                @endphp

                                    @foreach ($dataPicups as $picup)
                                    <tr class="">
                                        <!-- Data -->
                                        <td class="text-center border-2">{{ $counter }}</td> <!-- Menampilkan nomor urut -->
                                        <td class="text-center border-2">{{ $picup['nama'] }}</td>
                                        <td class="text-center border-2">{{ $picup['deskripsi'] }}</td>
                                    @foreach ($dataMaps as $map)
                                    @if ($map['id'] === $picup['id_maps'])
                                        <td class="text-center border-2">{{ $map['latitude'] }}</td>
                                        <td class="text-center border-2">  {{ $map['longitude'] }}</td>
                                    @endif
                                    @endforeach
                                        <td class="text-center border-2">
                                            <img src="" alt="image" class="w-[50px]">
                                        </td>

                                   

                                       

                                        <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium border-2 text-center">
                                            <form action="" method="POST">
                                            <!-- Form lengkap dengan token csrf untuk method(DELETE)-->
                                            @csrf 
                                            @method('DELETE')
                                            <!-- link untuk edit-->
                                                <a href="{{ route('adminpage.edit', $picup['id']) }}" class="text-indigo600 hover:text-indigo-900">Edit</a>
                                                <!-- button action untuk delete-->
                                                <button class="text-red-600 hover:text-red-900"
                                                onclick="return confirm('Anda Yakin ?')"
                                                type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                 
                                   
                                
                                    @php $counter++; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                                
                        </div>
                       
                    </div>
                    </div>
            </div>



        </main>
      
</section>

{{-- @foreach($data as $item)
    <p>{{ $item['nama'] }}</p>
    
@endforeach --}}

{{-- <!-- Loop untuk menampilkan data dari tabel Picups -->
@foreach ($dataPicups as $picup)
    <p>Nama Picup: {{ $picup['nama'] }}</p>
    <p>Deskripsi Picup: {{ $picup['deskripsi'] }}</p>

    <!-- Loop untuk menampilkan data dari tabel Maps yang terkait dengan setiap Picup -->
    @foreach ($dataMaps as $map)
        @if ($map['id'] === $picup['id_maps'])
            <p>Nama Maps: {{ $map['nama_maps'] }}</p>
            <p>Latitude: {{ $map['latitude'] }}</p>
            <p>Longitude: {{ $map['longitude'] }}</p>
        @endif
    @endforeach
@endforeach --}}


  

@endsection