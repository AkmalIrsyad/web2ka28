    @extends('app/app')

    @section('content')
    <div class="container mx-auto p-4 pb-20">
        <!-- Back to Dashboard Button -->
    <div class="mb-4">
        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-100 text-black rounded-lg border-black border-2 hover:bg-gray-950 hover:text-white hover:transition-colors duration-300">
            Back
        </a>
    </div>
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Post Image -->
            <img class="w-full h-66 object-cover" src="{{url('foto').'/'.$data->foto}}" alt="Post Image">

            <div class="p-6">
                <!-- Post Title -->
                <h1 class="text-2xl font-bold text-gray-800">{{$data->judul_info}}</h1>

                <!-- Post Description -->
                <p class="mt-4 text-gray-600">{{$data->deskripsi}}</p>

                <!-- Comments Section -->
                <div class="mt-6 ">
                    <h2 class="text-xl font-semibold text-gray-800">Komentar</h2>
                    @foreach ($data->comments()->get() as $comment)
                    <h2 class="text-xl font-semibold text-gray-800"></h2>
                    <div class="mt-4 space-y-4">
                        <!-- Comment -->
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <div class="flex items-center space-x-4">
                                <img class="w-10 h-10 rounded-full" src="https://via.placeholder.com/50" alt="User Avatar">
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-800">{{$comment->user->name}}</h3>
                                    <p class="text-sm text-gray-600">{{ $comment->comment}}</p>
                                    <p class="text-xs text-gray-400">Created at: {{$comment->created_at}}</p>
                                </div>
                                {{-- Delete Auth --}}
                                @if($comment->user_id === auth()->id())
                            <div>
                    <!-- Delete Button -->
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" px-3 h-1/2 font-semibold tracking-wider border-2 border-black bg-gray-100 text-black hover:bg-gray-950 hover:text-white transition-colors duration-300 rounded-lg">
                        Delete
                    </button>
                    </form>
                </div>
                @endif
                            </div>
                        </div>
                        @endforeach
                        <div class="mt-6">
                            <h2 class="text-xl font-semibold text-gray-800">Tambahkan Komentar</h2>
                            @auth
                            <form action="{{ route('comments.store', $data) }}" method="POST" class="mt-4">
                                <div class="flex flex-col space-y-4">
                                    @csrf
                                    <input type="hidden" name="info_id" value="{{$data->id}}">
                                    <textarea name="comment" class="w-full p-4 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Tulis komentar Anda..."></textarea>
                                    {{-- <button type="submit" class="self-end px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600">Kirim</button> --}}
                                </div>
                                <button class="mt-4 px-6 h-12 uppercase font-semibold tracking-wider border-2 border-black bg-gray-100 text-black hover:bg-gray-950 hover:text-white transition-colors duration-300 rounded-lg" type="submit">
                                    submit
                                </button>
                            </form>
                            @endauth
                            @guest
                            <div class="flex flex-col space-y-4 mt-4">
                                <textarea class="w-full p-4 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Tulis komentar Anda..." disabled></textarea>
                                <a href="{{ route('login') }}" class="mt-4 px-6 h-12 uppercase font-semibold tracking-wider border-2 border-black bg-gray-100 text-black hover:bg-gray-950 hover:text-white transition-colors duration-300 rounded-lg text-center">
                                    Login for Comment
                                </a>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
