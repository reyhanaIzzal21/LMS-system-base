@extends('admin.layouts.app')


@section('content')
    <div class="p-6 max-w-4xl">
        <h1 class="text-2xl font-bold mb-6">Edit Course</h1>


        <form action="{{ route('courses.update', $courseData->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')


            @include('admin.pages.courses.partials.form', ['course' => $courseData])


            <button class="bg-indigo-600 text-white px-6 py-2 rounded">Update</button>
        </form>
    </div>
@endsection
