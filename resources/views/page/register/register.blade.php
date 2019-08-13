@extends('page.layout.main')

@section('title')
UMS-Register
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="examples.html">Examples</a></li>
          <li ><a href="/page/admin">A Page</a></li>
          <li><a href="another_page.html">Another Page</a></li>
          <li><a href="contact.html">Contact Us</a></li>
          <li><a href="/login">Login</a></li>
          <li class="selected"><a href="/register">Register</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        
     


     <form action="#" method="post">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="ut_name" value="" /></p>

            <p><span>Email Address</span><input class="contact" type="email" name="ut_email" value="" /></p>

            
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" /></p>
          </div>
        </form>
      

      
	 </div>
	@endsection