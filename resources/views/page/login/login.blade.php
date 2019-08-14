@extends('page.layout.main')

@section('title')
UMS-Login
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="examples.html">Examples</a></li>
          <li ><a href="/page/admin">A Page</a></li>
          <li><a href="another_page.html">Another Page</a></li>
          <li><a href="contact.html">Contact Us</a></li>
          <li class="selected"><a href="/login">Login</a></li>
          <li><a href="/registration">Register</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
<font color="red">
        @foreach($errors->all() as $err)
  ⚠️{{$err}} <br>
@endforeach

  <div>
    {{session('msg')}}
  </div>
     
      </font>
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
       

      <form  method="post">
	<!--	{{csrf_field()}}-->
	<!--<input type="hidden" name="_token" value="{{csrf_token()}}"> -->
		@csrf
		
			
          <div class="form_settings">
            <p><span>Username</span><input class="contact" type="text" name="u_name" value="" /></p>

            <p><span>Password</span><input class="contact" type="Password" name="u_password" value="" /></p>

            
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" /></p>
          </div>
      
				
					
				
	</form>
	 </div>
	@endsection