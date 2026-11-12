<x-layout>
    <section class="bg-white max-w-md mx-auto p-8 border-2 mt-12 habit-shadow-lg">
        <h1 class="font-bold text-2xl mb-4">Faça Login</h1>

        <form action="{{ route('auth.login') }}" method="POST" class="flex flex-col gap-4">
            @csrf

            <div>
                <label class="block font-bold mb-1">E-mail</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                       class="w-full p-2 border-2 @error('email') border-red-500 @enderror">
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block font-bold mb-1">Senha</label>
                <input type="password" name="password" 
                       class="w-full p-2 border-2 @error('password') border-red-500 @enderror">
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-[#FF521B] text-white p-2 habit-btn habit-shadow-lg mt-2">
                Entrar
            </button>
        </form>
    </section>
</x-layout>