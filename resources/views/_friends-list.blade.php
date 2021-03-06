<div class="bg-purple-200 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Friends</h3>

    <ul>
        @forelse (auth()->user()->follows as $user)
            <li class="mb-4">
                <div>
                    {{-- <img src="https://picsum.photos/seed/picsum/40" alt="avatar" class="rounded-full mr-2"> --}}
                    <a href="{{route('profile', $user)}}" class="flex items-center text-sm">
                        <img src="{{$user->avatar}}" alt="avatar" class="rounded-full h-10 w-10 mr-2" width="40" height="40">
                        {{$user->name}}
                    </a>             
                </div>
            </li>
        @empty
            <li>Following None yet!</li>        
        @endforelse
    </ul>
</div>