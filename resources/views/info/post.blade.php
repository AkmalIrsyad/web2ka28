@extends('app/app')

@section('content')
<div class="container">
    
    <div class="card mt-5">
        <div class="card-body">
            <h3 class="text-center"><a href="https://santrikoding.com">www.santrikoding.com</a></h3>
            <h5 class="text-center my-4">Laravel Eloquent Relationship : One To Many</h5>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Judul Post</th>
                        <th>Komentar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($post as $item)
                        <tr>
                            <td>{{ $item->judul_info }}</td>
                            <td>
                                @foreach($item->comments()->get() as $comment)
                                    <div class="card shadow-sm mb-2">
                                        <div class="card-body">
                                            <i class="fa fa-comments"></i> {{ $comment->comment }}
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
