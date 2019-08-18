@extends('page.layout.main')

@section('title')
UMS-portal-SectionDetails
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li><a href="/portal/faculty/tsf">update TSF</a></li>
          <li class="selected"><a href="{{route('faculty.sectionDetails',$facultyCourseDetails[0]->c_faculty_id )}}">Section Details</a></li>
          <li><a href="{{route('faculty.sectionDetails.uploadSlide',$facultyCourseDetails[0]->c_faculty_id )}}">upload slide</a></li>
          <li><a href="{{route('faculty.sectionDetails.students',$facultyCourseDetails[0]->c_faculty_id )}}">Students</a></li>
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
      
        <!-- insert the page content here -->
        


    
<table  cellspacing="10" > 
  <tr >
    @foreach ($facultyCourseDetails as $s) 
    
       
       <td bgcolor="#1bf798"> COURSE: <mark>{{$s->c_faculty_name}}</mark></td>
       <td bgcolor="#c2c0c0">ID: <mark>{{$s->c_faculty_id}}</mark></td>
       <td bgcolor="#22e0e0">SEMESTER: <mark>{{$s->c_faculty_semester}}</mark></td>
       <td bgcolor="#faa693">SECTION: <mark>{{$s->c_faculty_section}}</mark></td>
       <td bgcolor="#64e885">STUDENTs: <mark>{{$s->c_faculty_capacity}}</mark></td>
       
        
        
       @endforeach
   </tr>
    
  </table>

<!-- notice starts  -->

<table style="width:520px;table-layout:fixed" align="left"  >
    
    <tr style="outline: thin solid" align="center">
      
      <td colspan="2" >PREVIOUS NOTICES</td>
      
    </tr>

    @foreach ($CourseNotice as $s) 
      <tr style="outline: thin solid" >
        

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>{{$s->n_course_title}}</h2>
    </div>
    <div class="modal-body">
      <p>{{$s->n_course_notice}}</p>
      <p>on {{$s->n_course_date}}</p>
    </div>
    <div class="modal-footer">
      <h3>Best Regards,<br>
 {{$facultyCourseDetails[0]->c_faculty_faculty}}, <br>
Faculty, <br>
{{session('dept')}} Department, <br>
UMS
</h3>
    </div>
  </div>

</div>




        
        <td id="myBtn" style="font-size:20px;" >{{$s->n_course_title}}<sub> on {{$s->n_course_date}}</sub></td>
        <td><a href="{{route('faculty.sectionDetails.removeNotice',$s->n_id )}}">REMOVE</a></td>
      </tr>
       
        
        
      
       @endforeach
   
    </table>

<!-- notice ends  -->







<table  align="center"  >
   <tr style="outline: thin solid" align="center">
      
      <td colspan="2" >ADD NOTICES</td>
      
    </tr>
  <form   method="post">
    
    

    <tr style="outline: thin solid" ><td> <p><input class="a" placeholder="Write notice title here *"  name="n_course_title"></p></td>
     
     <td><input  class="b" type='date' id='hasta' name="n_course_date" value='<?php echo date('Y-m-d');?>'></td></tr>
     <br>

            <tr style="outline: thin solid" ><td><p><textarea placeholder="Write notice description here *"  name="n_course_notice"></textarea></p></td>

            

            <td><p ><span></span><input class="submit" type="submit" name="name" value="Submit" /></p> </td></tr>
          
        
          </form>
        </table>


 <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>





        
        
     
      @endsection



      <style type="text/css">
        textarea {
          display: inline;
    margin-left: auto;
    margin-right: auto;
font: 100% arial; 
  width: 500px;
  height: 80px;
}
 .a {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
.b {
  height: : 50%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}

input[type=submit]  {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}


body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #ebf5a2;
  margin: auto;
  padding: 0;
  border: 10px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 1.0s
}

/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #a2f5a3;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #a2b8f5;
  color: white;
}


      </style>



     