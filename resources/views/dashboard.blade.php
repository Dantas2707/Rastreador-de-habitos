<x-layout>
    <div class="py-8">
        <h1 class="font-bold text-2xl mb-4">
            Olá, {{ auth()->user()->name }}! Seus Hábitos de Hoje:
        </h1>

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