<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Tugas
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm rounded-lg">

            <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                    <input type="text" name="title" id="title"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                        required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                </div>

                <div>
                    <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                    <input type="datetime-local" name="deadline" id="deadline"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-green-600 text-black text-sm font-medium rounded-md hover:bg-green-700">
                        Simpan
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
