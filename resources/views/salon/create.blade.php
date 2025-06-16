@extends('layouts.header')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 shadow rounded">
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">Register Your Salon</h2>

    <form action="{{ route('salon.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block font-medium">Salon Name</label>
            <input type="text" name="name" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Salon Image</label>
            <input type="file" name="image" accept="image/*" required class="w-full">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Location</label>
            <input type="text" name="location" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Services (comma separated)</label>
            <input type="text" name="services" required class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-medium">Description</label>
            <textarea name="description" rows="4" class="w-full border px-3 py-2 rounded"></textarea>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
            Submit and Pay
        </button>
    </form>
</div>
@endsection
