@extends ('layouts.app')

@section('title', 'Message Edit Page')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <h2>Contact us</h2>
           <!-- Errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <!-- Success Data -->
            @if (session('msg'))
                 <div class="alert alert-success">
                 {{ session('msg') }}
            </div>
            @endif
            <form method="post" action="/contact/update/{{$single['id']}}">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name'): $single['name'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('name')
                    <div id="emailHelp" class="form-text alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="text" name="email" value="{{ old('email') ? old('email'): $single['email'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    @error('email')
                    <div id="emailHelp" class="form-text alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Subject</label>
                    <input type="text" name="subject" value="{{ old('subject') ? old('subject'): $single['subject'] }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Message</label>
                    <textarea name="message" id="" cols="30" rows="10" class="form-control">{{ old('message') ? old('message'): $single['message'] }}</textarea>

                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>


        </div>
    </div>
</div>
@endsection