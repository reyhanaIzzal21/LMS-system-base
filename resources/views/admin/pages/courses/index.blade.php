@extends('admin.layouts.app')


@section('content')
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Courses</h1>
            <a href="{{ route('courses.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded">Add Course</a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif


        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="w-full text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="p-3">Title</th>
                        <th class="p-3">Category</th>
                        <th class="p-3">Author</th>
                        <th class="p-3">Type</th>
                        <th class="p-3">Ready</th>
                        <th class="p-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr class="border-t">
                            <td class="p-3">{{ $course->title }}</td>
                            <td class="p-3">{{ $course->category->name }}</td>
                            <td class="p-3">{{ $course->user->name }}</td>
                            <td class="p-3">
                                @if ($course->is_premium)
                                    <span class="text-red-600 font-semibold">Premium</span>
                                @else
                                    <span class="text-green-600 font-semibold">Free</span>
                                @endif
                            </td>
                            <td class="p-3">{{ $course->is_ready ? 'Yes' : 'No' }}</td>
                            <td class="p-3 flex gap-2">
                                <a href="{{ route('courses.edit', $course->id) }}" class="text-blue-600">Edit</a>
                                <a href="{{ route('courses.show', $course->slug) }}" class="text-green-600">View</a>
                                <button type="button"
                                    onclick="openDeleteModal(
                                    '{{ route('courses.destroy', $course->id) }}',
                                    'Apakah anda yakin ingin menghapus <strong>{{ $course->title }}</strong>? Tindakan ini tidak dapat dibatalkan.')"
                                    class="rounded bg-red-500 px-3 py-1 text-white hover:bg-red-600">
                                    Delete
                                </button>

                                <form method="POST" action="{{ route('courses.set-ready', $course->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="is_ready" value="{{ $course->is_ready ? 0 : 1 }}">
                                    <button type="submit"
                                        class="px-3 py-1 rounded text-white
                                        {{ $course->is_ready ? 'bg-green-500' : 'bg-gray-500' }}">
                                        {{ $course->is_ready ? 'Draft Course' : 'Publish Course' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-500">No courses found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
