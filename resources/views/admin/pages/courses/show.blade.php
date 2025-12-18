@extends('admin.layouts.app')


@section('content')
    <div class="p-6 max-w-4xl">
        <h1 class="text-3xl font-bold mb-4">{{ $course->title }}</h1>


        @if ($course->photo)
            <img src="{{ asset('storage/' . $course->photo) }}" class="w-full rounded mb-4">
        @endif


        <p class="mb-2"><strong>Category:</strong> {{ $course->category->name }}</p>
        <p class="mb-2"><strong>Author:</strong> {{ $course->user->name }}</p>
        <p class="mb-2"><strong>Type:</strong> {{ $course->is_premium ? 'Premium' : 'Free' }}</p>


        @if ($course->is_premium)
            <p><strong>Price:</strong> {{ number_format($course->price) }}</p>
            @if ($course->promotional_price)
                <p><strong>Promo:</strong> {{ number_format($course->promotional_price) }}</p>
            @endif
        @endif


        <div class="mt-6">
            <h2 class="text-xl font-semibold">Description</h2>
            <p class="mt-2">{{ $course->description }}</p>
        </div>
    </div>
@endsection
