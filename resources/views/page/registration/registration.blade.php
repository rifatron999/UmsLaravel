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
          <li class="selected"><a href="/registration">Register</a></li>
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
            <p><span>Name</span><input placeholder="The Username should be unique" class="contact" type="text" name="u_name" value="" /></p>

            <p><span>Email Address</span><input placeholder="*"class="contact" type="email" name="ut_email" value="" /></p>

            <p><span>Contact Number</span><input placeholder="The Contact number should be unique" class="contact" type="number" name="ut_phone" value="" /></p>

            <p><span>DOB</span><input  class="contact" type="date" name="ut_dob" value="" /></p>

            <p><span>Picture</span><input class="contact" type="file" name="ut_pic" value="" /></p>







            <p>
              <span>Gender</span>
              <select name="ut_gender" >
  <option value="male"  >Male</option>
  <option value="female"  >Female</option>
  
              </select  >
            </p>

<script>
function myFunction() {
  var x = document.getElementById("mySelect").value;
  
  if(x == 'register'){
  document.getElementById("mySelect2").disabled=true;
  }
  else{document.getElementById("mySelect2").disabled=false;}

}
</script>

            <p>
              <span>Request Type</span>
 <select name="ut_type" id="mySelect" onchange="myFunction()">
  
  <option value="faculty"  >Faculty</option>
 <option value="student"  >Student</option>
 <option  value="register" >Register</option>
  
              </select>
            </p>




            <p>
              <span>Department</span>
              <select name="ut_dept" id="mySelect2">
                <?php

                for ($x = 0; $x <(count($t_department)); $x++) {
    echo "<option value='".$t_department[$x]->d_name."'>".$t_department[$x]->d_name."</option>";
 }
       ?>

  
              </select>
            </p>

            <p><span>Password</span><input placeholder="*" class="contact" type="Password" name="ut_password" value="" /></p>
            <p><span>Confirm Password</span><input placeholder="*" class="contact" type="Password" name="utc_password" value="" /></p>

            

          

            
            
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" /></p>
          </div>
        </form>
      

      
   </div>
  @endsection





