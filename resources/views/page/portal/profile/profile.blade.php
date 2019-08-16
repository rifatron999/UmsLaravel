@extends('page.layout.main')

@section('title')
UMS-Profile
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li> <a href="/portal">portal</a></li>
          <li class="selected">><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li><a href="/portal/faculty/tsf">update TSF</a></li>
          <li><a href="/portal/preRegistration">pre registration</a></li>
          <li><a href="/logout">Logout</a></li>
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
          <div class="form_settings">
            <p><span>Name</span><input placeholder="The Username should be unique" class="contact" type="text" name="u_name" value="{{session('username')}}" /></p>

            <p><span>Email Address</span><input placeholder="*"class="contact" type="email" name="u_email" value="{{session('u_email')}}" /></p>

            <p><span>Contact Number</span><input placeholder="The Contact number should be unique" class="contact" type="number" name="u_phone" value="{{session('u_phone')}}" /></p>

            <p><span>DOB</span><input  class="contact" type="date" name="u_dob" value="" /></p>

            <p><span>Picture</span><input class="contact" type="file" name="u_pic" value="" /></p>

            <p><span>Password</span><input placeholder="*" class="contact" type="Password" name="u_password" value="{{session('u_password')}}" /></p>
            <p><span>Confirm Password</span><input placeholder="*" class="contact" type="Password" name="uc_password" value="" /></p>

            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="Update" /></p>
          </div>
        </form>
      

      
   </div>
  @endsection





