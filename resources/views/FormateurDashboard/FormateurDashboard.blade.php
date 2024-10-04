@extends('formateur')
@section('formateurtitle', 'Dashboard')
@section('contentFormateur')
    <div class="w-10/12 ml-0  md:w-10/12 md:mr-64 lg:ml-10 lg:w-11/12 xl:w-11/12 flex flex-col justify-center md:justify-start lg:justify-center items-center">
        <div class="w-full mt-10  flex-1 justify-start p-10 md:mr-5 lg:mr-0 ml-5 lg:ml-0">
            <h1 class="text-3xl font-bold text-gray-900">Welcome to the Dashboard</h1>
            <p class="mt-4 text-gray-700">This is the content area. Click the links in the sidebar to navigate.</p>
        </div>
        <div class="w-full bg-white py-2 pb-4 px-1 ml-16 lg:ml-0 mr-0 md:mr-5 lg:mr-0">
            <div class="flex justify-between items-center w-full py-4">
                <h1 class="text-lg lg:text-2xl font-semibold text-gray-800 flex justify-start items-center"><i class="fa-regular fa-calendar-days mx-3"></i>Overview</h1>            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3  ">
                <div class="py-2 px-4 lg:py-4 lg:px-7 flex flex-col justify-start items-center bg-blue-100 font-semibold rounded-lg mx-2 h-44">
                    <div class="flex justify-between items-start w-full">
                        <h1 class="font-semibold text-blue-600 text-sm lg:text-md">Totale sells</h1>
                        <p class="bg-blue-700 text-white p-2 rounded-md text-sm lg:text-md"><i class="fa-solid fa-cart-shopping"></i></p>
                    </div>
                    <h1 class="text-4xl lg:text-5xl mt-7 lg:mt-5">{{$totalTurns}}$</h1>
                </div>
                <div class="py-2 px-4 lg:py-4 lg:px-7 flex flex-col justify-start items-center bg-red-100 font-semibold rounded-lg mx-2 h-44">
                    <div class="flex justify-between items-start w-full">
                        <h1 class="font-semibold text-red-600 text-sm lg:text-md">Profits</h1>
                        <p class="bg-red-700 text-white p-2 rounded-md text-sm lg:text-md"><i class="fa-solid fa-cart-shopping"></i></p>
                    </div>
                    <h1 class="text-4xl lg:text-5xl mt-7 lg:mt-5">{{$profits}}$</h1>
                </div>
                <div class="py-2 px-4 lg:py-4 lg:px-7 flex flex-col justify-start items-center bg-purple-100 font-semibold rounded-lg mx-2 h-44">
                    <div class="flex justify-between items-start w-full">
                        <h1 class="font-semibold text-purple-600 text-sm lg:text-md">Customers</h1>
                        <p class="bg-purple-700 text-white p-2 rounded-md text-sm lg:text-md"><i class="fa-solid fa-cart-shopping"></i></p>
                    </div>
                    <h1 class="text-4xl lg:text-5xl mt-7 lg:mt-5">{{$customers}}</h1>
                </div>
            </div>
        </div>
        <div class="flex flex-col bg-white w-full mt-10 ml-16 lg:ml-0 mr-0 md:mr-5 lg:mr-0">
            <div class="grid grid-cols-1 lg:grid-cols-2 w-full mb-3 py-2 pt-4 justify-between ">
                <h1 class=" text-md lg:text-2xl font-semibold flex justify-start items-center text-gray-800"><i class="fa-regular fa-newspaper mx-3"></i>Detailed report</h1>

                <a href="{{ route('export.pdf') }}" class="lg:w-6/12 flex justify-center mt-1 items-center py-2 px-5 mx-3 lg:ml-40 bg-purple-100 text-purple-600 font-semibold rounded-md"><i class="fa-solid fa-arrow-up-from-bracket mr-3"></i>Export</a>
            </div>
            <table class="text-center w-full border border-gray-100 text-xs">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-4 font-semibold">#</th>
                        <th class="py-4 font-semibold">Course</th>
                        <th class="py-4 font-semibold">Category</th>
                        <th class="py-4 font-semibold">Price</th>
                        <th class="py-4 font-semibold">Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courseFormateur as $item)
                        <tr class=" border-b border-gray-100">
                            <td class="py-4">{{ $item->id }}</td>
                            <td class="py-4">{{ $item->titre }}</td>
                            <td class="py-4">{{ $item->categorie }}</td>
                            <td class="py-4">{{ $item->prix }} MAD</td>
                            <td class="py-4 text-center">
                                <span class="

                                    text-green-600 text-xs py-1 px-2 bg-green-100 font-semibold rounded-full
                                    {{-- // $item->status == 'rejected' ? 'text-red-600 px-3 bg-red-100 font-semibold rounded-full' : 
                                    // ($item->status == 'under review' ? 'text-blue-600 px-3 bg-blue-100 font-semibold rounded-full' : 
                                    // ($item->status == 'published' ? 'text-green-600 py-1 px-3 bg-green-100 font-semibold rounded-full' : ''))  --}}
                                ">
                                    {{-- {{ $item->status }} --}}

                                    published
                                </span>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection