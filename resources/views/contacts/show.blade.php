<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Show Contact') }}
            </h2>
            <a href="{{ route('contacts.index') }}" class="btn btn-outline btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   
                    <div class="mx-auto card w-full md:w-96 bg-base-100 shadow-xl">
                        <figure>
                            <img class="w-full object-cover" src="{{ $contact->getUrlPathAttribute() }}" alt="Album">
                        </figure>
                        <div class="card-body">
                            <div class="card-actions justify-end">
                                <a href="{{ route('contacts.edit', ['contact' => $contact]) }}" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </a>
                                <form 
                                    action="{{ route('contacts.destroy', ['contact' => $contact]) }}" 
                                    method="post"
                                >
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-error">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <h2 class="card-title">{{ $contact->name }}</h2>
                            <form action="{{ route('phones.store') }}" method="post" class="grid grid-cols-4 gap-4">
                                <div class="col-span-3">
                                    <div class="mb-2">
                                        @csrf
                                        <input 
                                            type="hidden" 
                                            name="contact_id"
                                            value="{{ $contact->id }}"
                                        >
                                        <input 
                                            type="text" 
                                            name="description" 
                                            placeholder="Descripción"
                                            class="input input-bordered input-sm w-full"
                                        >
                                        @error('description')
                                            <div class="mt-1 p-1 alert alert-warning shadow-lg">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                                    <span>{{ $message }}</span>
                                                </div>
                                            </div> 
                                        @enderror
                                    </div>
                                    <div>
                                        <input 
                                            type="text" 
                                            name="number" 
                                            placeholder="Número"
                                            class="input input-bordered input-sm w-full"
                                        >
                                        @error('number')
                                            <div class="mt-1 p-1 alert alert-warning shadow-lg">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                                    <span>{{ $message }}</span>
                                                </div>
                                            </div> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="flex items-center justify-end">
                                    <button class="btn btn-primary" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            <div class="grid grid-cols-4 gap-4">
                                @foreach ($contact->phones as $phone)
                                    <div class="col-span-3">
                                        <div>{{ $phone->description }}</div>    
                                        <div>{{ $phone->number }}</div>    
                                    </div>
                                    <div class="flex justify-end">
                                        <form action="{{ route('phones.destroy', ['phone' => $phone]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-error" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>