<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <textarea name="body" class="w-full" placeholder="What's Up?"></textarea>

        <hr class="my-4">

        <footer class="flex justify-between">
            {{-- <img src="https://picsum.photos/seed/picsum/40" alt="avatar" class="rounded-full mr-2"> --}}
            <img src="{{auth()->user()->avatar}}" alt="avatar" class="rounded-full mr-2" width="50" height="50">

            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Chirrup!</button>
        </footer>
    </form>

    @error('body')
        <p class="text-red-500 text-sm mt-2">{{$message}}</p>
    @enderror
</div>