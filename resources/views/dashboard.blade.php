<x-layout>
    <div class="py-8">
        <h1 class="font-bold text-2xl mb-4">
            Olá, {{ auth()->user()->name }}! Seus Hábitos de Hoje:
        </h1>

        <ul class="flex flex-col gap-3">
            @forelse($habits as $habit)
                <li class="bg-white p-4 border-2 habit-shadow-lg flex justify-between items-center">
                    <span class="font-bold text-lg">{{ $habit->name }}</span>
                </li>
            @empty
                <p>Você ainda não tem nenhum hábito cadastrado.</p>
            @endforelse
        </ul>
    </div>
</x-layout>