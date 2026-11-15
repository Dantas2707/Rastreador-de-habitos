<x-layout>
    <div class="py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="font-bold text-2xl">
                Olá, {{ auth()->user()->name }}! Seus Hábitos de Hoje:
            </h1>
            <a href="{{ route('habits.create') }}" class="bg-[#FF521B] text-white px-4 py-2 habit-btn habit-shadow-lg">
                + Novo Hábito
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-2 border-green-600 text-green-800 p-3 mb-4 font-bold">
                {{ session('success') }}
            </div>
        @endif

        <ul class="flex flex-col gap-3">
            @forelse($habits as $habit)
                <li class="bg-white p-4 border-2 habit-shadow-lg flex justify-between items-center">
                    <form action="{{ route('habits.toggle', $habit->id) }}" method="POST" class="flex items-center gap-3 w-full">
                        @csrf
                        <input type="checkbox" 
                               onchange="this.form.submit()" 
                               {{ $habit->wasCompletedOn() ? 'checked' : '' }}
                               class="w-6 h-6 accent-[#FF521B] cursor-pointer">
                        
                        <span class="font-bold text-lg {{ $habit->wasCompletedOn() ? 'line-through text-gray-400' : '' }}">
                            {{ $habit->name }}
                        </span>
                    </form>
                </li>
            @empty
                <p>Você ainda não tem nenhum hábito cadastrado.</p>
            @endforelse
        </ul>
    </div>
</x-layout>