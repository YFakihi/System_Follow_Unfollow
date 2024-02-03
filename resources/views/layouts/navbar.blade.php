<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">FollowBook</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Account
          </a>
          
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @guest
                <a class="dropdown-item" href="{{route('register')}}">Rgester</a>
                <a class="dropdown-item" href="{{route('login')}}">Login</a>
            @endguest
            
            <div class="dropdown-divider"></div>
            @auth
                <a class="dropdown-item" href="#">{{auth()->user()->name}}</a>
            <a class="dropdown-item" onclick="document.getElementById('logoutform').submit();" href="#">Logout</a>

            <form id="logoutform" action="{{route('logout')}}" method="post">
              @csrf
            </form>
            @endauth
            
          </div>
        </li>
      
      </ul>
 
    </div>
  </nav>
