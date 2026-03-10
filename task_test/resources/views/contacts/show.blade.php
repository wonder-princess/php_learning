<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <section class="text-gray-600 body-font relative">

                        {{ $contact->id }}

                        <div class="container px-5 py-24 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">

                                    {{-- Name --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label class="leading-7 text-sm text-gray-600">Name</label>
                                            <div class="w-full rounded border border-gray-300 py-1 px-3">
                                                {{ $contact->name }}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Title --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label class="leading-7 text-sm text-gray-600">Title</label>
                                            <div class="w-full rounded border border-gray-300 py-1 px-3">
                                                {{ $contact->title }}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- URL --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label class="leading-7 text-sm text-gray-600">HP</label>
                                            @if($contact->url)
                                                <div class="w-full rounded border border-gray-300 py-1 px-3">
                                                    {{ $contact->url }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- Gender --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label class="leading-7 text-sm text-gray-600">Gender</label>
                                            <div class="w-full rounded border border-gray-300 py-1 px-3">
                                                {{ $gender }}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Age --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label class="leading-7 text-sm text-gray-600">Age</label>
                                            <div class="w-full rounded border border-gray-300 py-1 px-3">
                                                {{ $age }}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label class="leading-7 text-sm text-gray-600">Email</label>
                                            <div class="w-full rounded border border-gray-300 py-1 px-3">
                                                {{ $contact->email }}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Contact --}}
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label class="leading-7 text-sm text-gray-600">Contact</label>
                                            <div class="w-full rounded border border-gray-300 py-1 px-3 h-32">
                                                {{ $contact->contact }}
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Edit --}}
                                    <form method="GET" action="{{ route('contacts.edit', ['id' => $contact->id]) }}">
                                        <div class="p-2 w-full">
                                            <button type="submit"
                                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 hover:bg-indigo-600 rounded text-lg">
                                                Edit
                                            </button>
                                        </div>
                                    </form>

                                    {{-- Delete --}}
                                    <form id="delete_{{ $contact->id }}" method="POST" action="{{ route('contacts.destroy', ['id' => $contact->id]) }}">
                                        @csrf
                                        <div class="p-2 w-full">
                                            <button type="button"
                                                data-id="{{ $contact->id }}"
                                                onclick="deletePost(this)"
                                                class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 hover:bg-red-600 rounded text-lg">
                                                Delete
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </section>

                </div>
            </div>
        </div>
    </div>

    {{-- 確認メッセージ --}}
    <script>
    function deletePost(e){
        'use strict'
        if(confirm('本当に削除していいですか？')){
            document.getElementById('delete_' + e.dataset.id).submit()
        }
    }
    </script>

</x-app-layout>
