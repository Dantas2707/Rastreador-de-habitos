<x-layout>
    <section class="bg-white max-w-md mx-auto p-8 border-2 mt-12 habit-shadow-lg">
        <h1 class="font-bold text-2xl mb-4">Novo Hábito</h1>

        <form action="{{ route('habits.store') }}" method="POST" class="flex flex-col gap-4">
            @csrf

            <div>
                <label class="block font-bold mb-1">Nome do Hábito</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Ex: Correr 5km"
                       class="w-full p-2 border-2 @error('name') border-red-500 @enderror">
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex gap-2 mt-2">
                <a href="{{ route('habits.index') }}" class="p-2 border-2 text-center flex-1">
                    Cancelar
                </a>
                <button type="submit" class="bg-[#FF521B] text-white p-2 habit-btn habit-shadow-lg flex-1">
                    Salvar
                </button>
            </div>
        </form>
    </section>
</x-layout>