<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <section class="text-gray-600 body-font relative">
                        <form method="POST" action="{{ route('contacts.store') }}">
                            @csrf
                            <div class="container px-5 py-24 mx-auto">
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">
                                    <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    </div>
                                    <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    </div>
                                    <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="url" class="leading-7 text-sm text-gray-600">HP</label>
                                        <input type="text" id="url" name="url" value="{{ old('url') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    </div>
                                    <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="gender" class="leading-7 text-sm text-gray-600">Gender</label><br>
                                        <input type="radio" id="gender" name="gender" value="0" {{ old('gender') == 0 ? 'checked' : ''}}>male
                                        <input type="radio" id="gender" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : ''}}>female
                                    </div>
                                    </div>
                                    <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="age" class="leading-7 text-sm text-gray-600">Age</label><br>
                                        <select name="age">
                                            <option value="">chose</option>
                                            <option value="1" {{ old('gender') == 1 ? 'selected' : ''}}>~19</option>
                                            <option value="2" {{ old('gender') == 2 ? 'selected' : ''}}>20~29</option>
                                            <option value="3" {{ old('gender') == 3 ? 'selected' : ''}}>30~39</option>
                                            <option value="4" {{ old('gender') == 4 ? 'selected' : ''}}>40~49</option>
                                            <option value="5" {{ old('gender') == 5 ? 'selected' : ''}}>50~59</option>
                                            <option value="6" {{ old('gender') == 6 ? 'selected' : ''}}>60~</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    </div>
                                    <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="contact" class="leading-7 text-sm text-gray-600">Contact</label>
                                        <textarea id="contact" name="contact" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('contact') }}</textarea>
                                    </div>
                                    </div>
                                    <div class="p-2 w-full">
                                    <div class="relative">
                                        <label for="gender" class="leading-7 text-sm text-gray-600">Gender</label><br>
                                        <input type="checkbox" id="caution" name="caution">Please check the notes/precautions.
                                       </div>
                                    </div>
                                    <div class="p-2 w-full">
                                    <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
