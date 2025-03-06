@props(['categories'])
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
  <div class="flex justify-center">
    <div class="w-full max-w-4xl">
      <div class="bg-white shadow-lg rounded-lg">
        <div class="grid grid-cols-4">
          <div class="col-span-3">
            <div class="bg-gray-200 px-4 py-2 text-lg font-semibold">{{ __('Manage Category') }}</div>
          </div>
          <div class="col-span-1">

            <!-- Modal toggle -->
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
              Add
            </button>

            <!-- Main modal -->
            <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">
                      Create New Product
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-modal">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                  </div>
                  <!-- Modal body -->
                  <form class="p-4 md:p-5" action="{{route('postAddCategory')}}" method="post" enctype="multipart/form-data">
                    @csrf()
                    <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Category Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type category name" required="">
                      </div>
                      <div class="col-span-2">
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Product Image</label>
                        <input type="file" name="image" id="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required="">
                      </div>
                      <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product Description</label>
                        <textarea id="description" rows="4" name="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write product description here"></textarea>
                      </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                      </svg>
                      Add new category
                    </button>
                  </form>
                </div>
              </div>
            </div>


          </div>
        </div>

        <div class="p-4">
          <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
              <tr class="bg-gray-100">
                <th class="px-4 py-2 border border-gray-300 text-left">id</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Category</th>
                <th class="px-4 py-2 border border-gray-300 text-left">Action</th>
              </tr>
            </thead>
            @foreach($categories as $index => $category)
            <tbody>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 border border-gray-300">{{$index +1}}</td>
                <td class="px-4 py-2 border border-gray-300">{{$category->name}}</td>
                <td class="px-4 py-2 border border-gray-300 flex">
                  <a href="{{route('categories.edit', $category->id)}}"><button class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-blue-600">Edit</button></a>
                  <form action="{{route('categories.destroy', $category->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                    @csrf
                    @method("DELETE")
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                  </form>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>

        <div class="px-4 py-2 text-center text-gray-600">
          Categories List
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection