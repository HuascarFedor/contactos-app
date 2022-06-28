@if ($message = Session::get('succes'))
    <div 
        x-data="{ show:false }"
        x-init="()=>{
            setTimeout(() => show=true, 100);
            setTimeout(() => show=false, 3000);    
        }"
        x-show="show"
        
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"

        class="bg-white fixed top-0 w-full flex justify-end p-12 z-50"
    >
        <div class="alert alert-success shadow-lg lg:w-1/3">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{ $message }}</span>
            </div>
        </div>
    </div>
@endif