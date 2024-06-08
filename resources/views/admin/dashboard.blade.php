@extends('app/app')

@section('content')
  <!-- Projects Section -->

    {{--  --}}
    <section id="projects" class="container mx-auto p-8 mt-16">
        <h2 class="text-3xl font-semibold mb-8 text-center">
          <span class="hover:bg-gray-900 hover:text-gray-100 transition-colors duration-300">Informasi Seputar Kampus</span>
        </h2>
        <a href="/admin/dashboard/create" class="px-6 h-12 uppercase font-semibold tracking-wider border-2 border-black bg-gray-100 text-black hover:bg-gray-950 hover:text-gray-100 transition-colors duration-300 rounded-lg" type="submit">
            Add Post
        </a>

        <div class="flex flex-col lg:flex-row mt-3">
            <!-- Cards Section -->
            <div class="flex flex-col space-y-4 lg:w-1/4">
                <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-gray-800">
                    <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.9" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                      </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">User</h3>
                    <p class="text-lg mt-2 font-semibold text-indigo-700 dark:text-indigo-500">{{$users}}</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
                    <div class="bg-indigo-600 h-2.5 rounded-full dark:bg-indigo-500" style="width: {{$usersProgress}}%"></div>
                </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg dark:bg-gray-800">
                    <svg class="w-[48px] h-[48px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.8" d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z"/>
                      </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Post</h3>
                    <p class="text-lg font-semibold mt-2 text-gray-700 dark:text-gray-400">{{$post}}</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
                    <div class="bg-gray-600 h-2.5 rounded-full dark:bg-gray-300" style="width:{{$postProgress}}%"></div>
                </div>
                </div>
            </div>

            <!-- Table Section -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-3 lg:mt-0 lg:ml-4 lg:w-3/4">
                <!-- Search Form -->
            <form action="" method="get" class="mb-4">
                <div class="flex items-center">
                    <input type="text" name="search" placeholder="Cari judul info..." class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-200" autocomplete="off" autofocus />
                    <button type="submit" class="ml-2 px-4 py-2 bg-gray-950 text-white rounded-lg hover:bg-gray-700 transition-colors duration-200">Search</button>
                </div>
            </form>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Postingan admin
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Postingan ini akan tampil di Halaman dashboard user, Kemudian user Bisa Comment di postingan</p>
                    </caption>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-16 py-3">
                                <span class="sr-only">Image</span>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul Info
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                @if ($item->foto)
                                <img src="{{url('foto').'/'.$item->foto}}" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
                                @endif
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                                {{$item->judul_info}}
                            </td>
                            <td class="px-6 py-4 items-center">
                                <a href="{{url('/artikel/'.$item->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline ms-2">Detail</a>
                                <a href="/admin/artikel/{{$item->id}}/edit" class="font-medium text-amber-600 dark:text-amber-500 hover:underline ms-2">Edit</a>
                                <form action="{{ route('artikel.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-2">
                                    Delete
                                </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
  {{ $data->links() }}
  </div>
</section>
@endsection


