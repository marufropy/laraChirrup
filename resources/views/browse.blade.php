@component('components.app')
    <div>
        @foreach ($users as $user)
            <a href="{{ $user->path() }}" class="flex items-center mb-5">
                <img src="{{$user->avatar}}" alt="avatar" width="60" class="mr-4 rounded-full h-16 w-16">


                <div>
                    <h4 class="font-bold">
                        {{'@'.$user->username}}
                    </h4>
                </div>
            </a>
        @endforeach

        {{$users->links()}}
    </div>                 
@endcomponent