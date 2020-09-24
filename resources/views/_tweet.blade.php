<div class="flex p-4 {{$loop->last ? '' : 'border-b border-b-grey-400'}}">
    <div class="mr-2 flex-shrink-0">
        {{-- <img src="https://picsum.photos/seed/picsum/50" alt="avatar" class="rounded-full mr-2"> --}}
        <a href="{{route('profile', $tweet->user)}}">
            <img src="{{$tweet->user->avatar}}" alt="avatar" class="rounded-full h-16 w-16 mr-2" width="50" height="50">
        </a>
    </div>

    <div>
        <h5 class="font-bold-mb-4">
            <a href="{{route('profile', $tweet->user)}}">
                {{$tweet->user->name}}
            </a>  
        </h5>

        <p class="text-sm">
            {{$tweet->body}}
        </p>

        <div class="flex">
            <form method="POST" action="/tweets/{{$tweet->id}}/like">
                @csrf

                <div class="flex items-center mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="text-grey-500 mr-1 w-3"><path d="M11 0h1v3l3 7v8a2 2 0 0 1-2 2H5c-1.1 0-2.31-.84-2.7-1.88L0 12v-2a2 2 0 0 1 2-2h7V2a2 2 0 0 1 2-2zm6 10h3v10h-3V10z"/></svg>
    
                    <button type="submit" class="text-xs">
                        {{$tweet->likes ?: 0}}
                    </button>
                </div>
            </form>

            <form method="POST" action="/tweets/{{$tweet->id}}/like">
                @csrf
                @method('DELETE')

                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="text-grey-500 mr-1 w-3"><path d="M11 20a2 2 0 0 1-2-2v-6H2a2 2 0 0 1-2-2V8l2.3-6.12A3.11 3.11 0 0 1 5 0h8a2 2 0 0 1 2 2v8l-3 7v3h-1zm6-10V0h3v10h-3z"/></svg>
    
                    <button type="submit" class="text-xs">
                        {{$tweet->dislikes ?: 0}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>