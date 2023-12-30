@extends ('layouts.app')

@section('title', 'Contact list Page')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <h2>Contact list</h2>
            @if(session('msg'))
                    <div class="alert alert-success">{{session('msg')}}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messages as $item)
                    <tr>
                        <td scope="row">{{$item['id']}}</td>
                        <td scope="row">{{$item->name}}</td>
                        <td scope="row">{{$item['email']}}</td>
                        <td scope="row">{{$item['subject']}}</td>
                        <td scope="row">{{$item->message}}</td>
                        <td><a href="/contact/edit/{{$item['id']}}">Edit</a> | <a href="/contact/delete/{{$item['id']}}">Delete</a></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection