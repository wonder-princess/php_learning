<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('お問い合わせ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('contacts.create') }}">create</a><br>
                    <form method="get" action="{{ route('contacts.index') }}">
                        <input type="text" name="search" placeholder="search">
                        <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Search</button>
                    </form>
                </div>
                <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-no-wrap">
                        <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">id</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">name</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">title</th>
                            <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">created_at</th>
                            <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">show</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td class="px-4 py-3"> {{ $contact->id }}</td>
                            <td class="px-4 py-3">{{ $contact->name }}</td>
                            <td class="px-4 py-3">{{ $contact->title }}</td>
                            <td class="px-4 py-3">{{ $contact->created_at }}</td>
                            <td class="px-4 py-3"><a href="{{ route('contacts.show', ['id' => $contact->id]) }}">show</a></td>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $contacts-> links() }}
            </div>
        </div>
    </div>
</x-app-layout>
