 <div class="profile clearfix">
     <div class="profile_pic">
         @if (auth()->check())

             @if (auth()->user()->photo)
                 <img src="{{ asset('storage/photos/' . auth()->user()->photo) }}" class="img-circle profile_img">
             @else
                 <img src="{{ asset('assets/images/user.jpg') }}" class="img-circle profile_img">
             @endif
         @else
             <img src="{{ asset('assets/images/user.jpg') }}" class="img-circle profile_img">
             {{ 'Guest User' }}
         @endif
     </div>
     <div class="profile_info">
         <span>Welcome,</span>
         <h2>{{ auth()->user()->name }}</h2>
     </div>
 </div>
