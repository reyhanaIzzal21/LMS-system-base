@extends('admin.layouts.app')


@section('content')
    <div class="p-6 max-w-4xl">
        <h1 class="text-2xl font-bold mb-6">Create Course</h1>


        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf


            @include('admin.pages.courses.partials.form')


            <button class="bg-indigo-600 text-white px-6 py-2 rounded">Save</button>
        </form>
    </div>
@endsection
