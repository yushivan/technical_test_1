<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Tugas
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm rounded-lg">

            <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="title" id="title"
                        value="{{ old('title', $task->title) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description', $task->description) }}</textarea>
                </div>

                <div>
                    <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                    <input type="datetime-local" name="deadline" id="deadline"
                        value="{{ old('deadline', $task->deadline?->format('Y-m-d\TH:i')) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_completed" id="is_completed" value="1"
                        {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}
                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                    <label for="is_completed" class="ml-2 block text-sm text-gray-700">Sudah Selesai</label>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-black text-sm font-medium rounded-md hover:bg-blue-700">
                        Update
                    </button>
                    <a href="{{ route('tasks.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-gray-300 text-sm text-gray-800 rounded-md hover:bg-gray-400">
                        Kembali
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
