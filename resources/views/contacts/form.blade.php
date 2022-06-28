<form 
    action="{{ $route }}" 
    method="post"
    class="lg:w-1/2 mx-auto"
>
    @csrf
    @isset($update)
        @method('PUT')
    @endisset
    <div class="mb-2">
        <input 
            type="text" 
            name="name" 
            placeholder="Nombre"
            @isset($update)
                value="{{ old('name') ?? $contact->name }}"
            @endisset    
            class="input input-bordered w-full"
        />
        @error('name')
            <div class="mt-1 p-1 alert alert-warning shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <span>{{ $message }}</span>
                </div>
            </div> 
        @enderror
    </div>
    <div class="mb-2">
        <input 
            type="text" 
            name="phone" 
            placeholder="Teléfono"
            @isset($update)
                value="{{ old('phone') ?? $contact->phone }}"
            @endisset 
            class="input input-bordered w-full"
        />
        @error('phone')
            <div class="mt-1 p-1 alert alert-warning shadow-lg">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <span>{{ $message }}</span>
                </div>
            </div> 
        @enderror
    </div>
    <button class="btn btn-primary">
        @isset($update)
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
        @endisset 
    </button>
</form>