<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Team') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="flex flex-col">
                <div class="-my-2 sm:-mx-6 lg:-mx-8">
                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="flex justify-between mb-3">
                            <a href="{{ route('teams.create') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">+
                                Add Team</a>
                            <form action="{{ route('teams.index') }}">
                                <x-input type="search" name="search" id="search"></x-input>
                            </form>
                        </div>
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gradient-to-r from-gray-100 to-indigo-200">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Team
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Created At
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse ($teams as $item)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item->description }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span>{{ $item->created_at->format('d, F Y H:i') }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex justify-end">
                                                <a href="{{ route('teams.edit', $item) }}"
                                                    class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                                <form method="POST" action="{{ route('teams.delete', $item) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-indigo-600 hover:text-indigo-900"
                                                        onclick="return confirm('Are you sure?');">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="hover:bg-gray-100">
                                        <td colspan="3" class="px-6 py-4 text-center leading-loose">Not Found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $teams->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
