@extends('app/app')
@section('content')
        <div class="w-full max-w-md mx-auto bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Submit Info</h2>
            <div class="mb-4">
                <ul>
                </ul>
            </div>
        <form method="POST" action="/admin/artikel/{{$data->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-4">
                @if ($data->foto)
                <div class="mb-3">
                    <img style="max-width:150px; max-height:150px" src="{{ url('foto').'/'. $data->foto}}"/>
                    </div>
                @endif

    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-950 focus:outline-none dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="foto">
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

            </div>
            <div class="mb-4">
                <label for="title" class="block text-gray-700"></label>
                <input type="text" id="title" name="judul_info" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-600" value="{{$data->judul_info}}">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Deskripsi</label>
                <textarea id="description" name="deskripsi" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-600" rows="4">{{$data->deskripsi}}</textarea>
            </div>
            <button class="px-6 h-12 uppercase font-semibold tracking-wider border-2 border-black bg-gray-100 text-black hover:bg-gray-950 hover:text-gray-100 transition-colors duration-300 rounded-lg" type="submit">Submit</button>
        </form>
    </div>

@endsection
