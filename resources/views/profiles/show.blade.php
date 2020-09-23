@component('components.app')
    <header class="mb-8 relative">
        <div class="relative">
            <img class="mb-8" src="/images/banner.jpg" alt="" style="border-radius: 20px">

            <img src="{{$user->avatar}}" alt="" class="rounded-full h-40 w-40 mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" style="left: 50%" width="150">
        </div>

        <div class="flex justify-between items-center mb-4">
            <div style="max-width: 250px">
                <h2 class="font-bold text-2xl mb-0">
                    {{$user->name}}
                </h2>

                <p class="text-sm">
                    Joined {{$user->created_at->diffForHumans()}}
                </p>
            </div>

            <div class="flex">
                @if (auth()->user()->is($user))
                    <a href="{{$user->path('edit')}}" class="bg-purple-500 hover:bg-purple-700 rounded-full border border-grey-500 py-2 px-4 text-white text-xs mr-2">
                        Edit Profile
                    </a>
                @endif
                
                @unless (auth()->user()->is($user))
                    <form method="POST" action="/profiles/{{$user->username}}/follow">
                        @csrf

                        <button type="submit" class="bg-purple-500 hover:bg-purple-700 rounded-full shadow py-2 px-4 text-white text-xs">
                            {{auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}
                        </button>
                    </form>
                @endunless
            </div>
        </div>

        <p class="text-sm text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse tenetur quasi iste, quis id odit eos doloremque soluta ex sit porro similique commodi beatae voluptate aliquam nihil exercitationem illum vero?
        </p>
    </header>

    @include('_timeline',[
        'tweets' => $tweets
    ])
@endcomponent
