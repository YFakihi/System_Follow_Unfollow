
@extends('layouts.app')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card-header">
                users
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach ($users as $user)
                        <li class="list-group-item d-flex flex-column">
                        <div class=" d-flex justify-content-between align-item-center">
                            <span class="fw-bold">
                               {{$user->name}}
                             </span>
                             @auth
                             
                             @if (auth()->user()->id !== $user->id)
                            @if ($user->followers->contains(auth()->user()->id))
                             <a href="{{route('unfollow',$user->id)}}" class="btn btn-sm btn-danger">
                                 Unfollow
                             </a>
                             @else
                             <a href="{{route('follow',$user->id)}}" class="btn btn-sm btn-primary">
                                 Follow
                             </a>
                            @endif
                             @endif
                           
                             @endauth
                        
                             
                        </div>
                        <div class="my-2">
                            <span class="badge rounded-pill bg-light text-dark">
                                Followeing :{{$user->followings()->count()}}
                            </span>

                            <span class="badge rounded-pill bg-light text-dark">
                                Followers : {{$user->followers()->count()}}
                            </span>
                        </div>
                        
                    </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
    </div>
@endsection

