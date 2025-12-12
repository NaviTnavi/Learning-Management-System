<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('courses.store') }}" class="space-y-6">
                        @csrf

                        <!-- Title -->
                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">
                                Course Title
                            </label>
                            <input 
                                id="title" 
                                type="text" 
                                name="title" 
                                value="{{ old('title') }}"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required 
                                autofocus
                            >
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Short Description -->
                        <div>
                            <label for="short_description" class="block font-medium text-sm text-gray-700">
                                Short Description
                            </label>
                            <input 
                                id="short_description" 
                                type="text" 
                                name="short_description" 
                                value="{{ old('short_description') }}"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required
                                maxlength="500"
                            >
                            <p class="mt-1 text-sm text-gray-500">A brief summary of the course (max 500 characters)</p>
                            @error('short_description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div>
                            <label for="content" class="block font-medium text-sm text-gray-700">
                                Course Content
                            </label>
                            <textarea 
                                id="content" 
                                name="content" 
                                rows="12"
                                class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                required
                            >{{ old('content') }}</textarea>
                            <p class="mt-1 text-sm text-gray-500">Detailed course description, curriculum, prerequisites, etc. (Supports Markdown)</p>
                            @error('content')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center justify-end gap-4">
                            <a 
                                href="{{ route('courses.index') }}" 
                                class="inline-flex items-center px-4 py-2 bg-gray-300 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150"
                            >
                                Cancel
                            </a>
                            <button 
                                type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                Create Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

