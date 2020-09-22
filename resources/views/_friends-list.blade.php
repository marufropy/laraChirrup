<div class="bg-gray-200 rounded-lg py-4 px-6">
    <h3 class="font-bold text-xl mb-4">Friends</h3>

    <ul>
        @foreach (auth()->user()->follows as $user)
            <li class="mb-4">
                <div>
                    {{-- <img src="https://picsum.photos/seed/picsum/40" alt="avatar" class="rounded-full mr-2"> --}}
                    <a href="{{route('profile', $user)}}" class="flex items-center text-sm">
                        <img src="{{$user->avatar}}" alt="avatar" class="rounded-full mr-2" width="40" height="40">
                        {{$user->name}}
                    </a>             
                </div>
            </li>        
        @endforeach
    </ul>
</div>