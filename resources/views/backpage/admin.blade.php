@extends('layouts.indexAdmin')
@section('content')
<title>Admin Pages</title>
{{-- <section class="flex">
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
                                    {{-- <th scope="col" class="px-6 py-3  text-xs font-medium text-gray500 uppercase tracking-wider border-2 ">
                                    Image
                                    </th> --}}
                                    {{-- <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray500 uppercase tracking-wider border-2">
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
                                    @endforeach --}}
                                        {{-- <td class="text-center border-2">
                                            <img src="" alt="image" class="w-[50px]">
                                        </td> --}}

                                   

                                       

                                        {{-- <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium border-2 text-center">
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
 --}} 

 <section class="min-h-screen bg-gray-900 flex">

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

    <!-- Sidebar -->
    <aside class="bg-gray-800 text-gray-300 w-1/5 min-h-screen">
        <div class="py-4 px-6">
            <h2 class="text-xl font-semibold">Dashboard</h2>
        </div>
        <div class="px-6 py-6">
            <a href="" class="my-4 text-gray-400 hover:text-gray-600 duration-300">AdminPage</a>

        </div>
    </aside>

    

    <main class="flex-1">
    <!-- Start block -->
        <div class="mx-auto max-w-screen-2xl px-4 lg:px-12 pt-20">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="flex-1 flex items-center space-x-2">
                        <h5>
                            <span class="text-white">All Products</span>
                        </h5>
                        <button type="button" class="group" data-tooltip-target="results-tooltip">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">More info</span>
                        </button>
                        <div id="results-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Showing 1-100 of 436 results
                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" placeholder="Search for products" required="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <a href="{{ route('adminPages.create') }}" type="button" id="createProductButton" data-modal-toggle="createProductModal" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add product
                        </a>
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-1.5 -ml-1 text-gray-400" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd" />
                            </svg>
                            Filter options
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        {{-- <div class="flex items-center space-x-3 w-full md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                Actions
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                        </div> --}}
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="text-center">
                                {{-- <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th> --}}

                                <th scope="col" class="p-4">No</th>
                                <th scope="col" class="p-4">Nama Perusahaan</th>
                                {{-- <th scope="col" class="p-4">Logo</th> --}}
                                <th scope="col" class="p-4">No Telp</th>
                                <th scope="col" class="p-4">Alamat Perusahaan</th>
                                <th scope="col" class="p-4">Deskripsi</th>
                                <th scope="col" class="p-4">Images</th>
                                <th scope="col" class="p-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                                $counter = 1; 
                            @endphp

                            @foreach ($picups as $picup)
                            
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                          
                                {{-- <td class="p-4 w-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox" onclick="event.stopPropagation()" class="w-4 h-4 text-primary-600 bg-gray-100 rounded border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td> --}}
                                <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center mr-3">
                                        {{ $counter }}
                                    </div>
                                </td>
                               
                                <td scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center mr-3">
                                        {{ $picup['nama'] }}
                                    </div>
                                </td>
                                {{-- <td class="px-4 py-3">
                                        <img src="https://flowbite.s3.amazonaws.com/blocks/application-ui/products/imac-front-image.png" alt="iMac Front Image" class="h-8 w-auto mr-3">
                                </td> --}}
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center">
                                        {{ $picup['no_telepon'] }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $picup['alamat'] }}
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $picup['deskripsi'] }}
                                </td>

                                <td class="text-center border-2">
                                    <img src="{{ asset('images/'.$picup->image) }}" alt="image" class="w-[50px]">
                                </td>
                                
                                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center space-x-4">
                                        <a href="" type="button" data-drawer-target="drawer-update-product" data-drawer-show="drawer-update-product" aria-controls="drawer-update-product" class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                            </svg>
                                            Edit
                                        </a>
                                        {{-- <button type="button" data-drawer-target="drawer-read-product-advanced" data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced" class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                            </svg>
                                            Preview
                                        </button> --}}
                                        {{-- <button>
                                        <form data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                            </svg>
                                            Delete
                                        </form>
                                        </button> --}}

                                        <form action="" method="POST" onsubmit="return confirm('Are you ready to  lus this data')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                                @php $counter++; @endphp
                            </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                </nav>
            </div>
        </div>
    </main>
</section>

@endsection