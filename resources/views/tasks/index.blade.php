<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Tugas
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('tasks.create') }}"
                   class="inline-block px-4 py-2 text-black rounded">
                    + Tambah Tugas
                </a>
            </div>

            <div class="bg-white shadow-sm rounded-lg divide-y">
                @forelse ($tasks as $task)
                    <div class="p-4 flex justify-between items-center">
                        <div>
                            <div class="font-semibold text-gray-800">{{ $task->title }}</div>
                            <div class="text-sm text-gray-500">{{ $task->deadline?->format('d M Y H:i') }}</div>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('tasks.edit', $task) }}"
                               class="px-3 py-1 bg-gray-200 text-sm rounded hover:bg-gray-300">Edit</a>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-4 text-gray-600">
                        Belum ada tugas.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
