<x-app-layout title="Regions">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Regions
        </h2>

        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Provinsi</th>
                            <th class="px-4 py-3">Kabupaten</th>
                            <th class="px-4 py-3" colspan="2">Menu</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($regions as $region)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                {{ $region->id }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $region->provinsi }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                {{ $region->kabupaten }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <form action="{{ route('admin.regions.delete', $region) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('admin.regions.put', $region) }}">
                                    
                                    <button type="submit"
                                        class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Edit
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

            {{ $regions->links('admin.pagination') }}


        </div>

        <div class="mt-6">
            <a href="{{ route('admin.regions.add') }}">
                <button
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Tambah Daerah
                </button>
            </a>
        </div>

    </div>

</x-app-layout>