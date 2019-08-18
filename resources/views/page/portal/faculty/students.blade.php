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
          <li><a href="{{route('faculty.sectionDetails',$facultyStudentList[0]->c_student_courseId)}}">Section Details</a></li>
          
          <li><a href="{{route('faculty.sectionDetails.uploadSlide',$facultyStudentList[0]->c_student_courseId )}}">upload slide</a></li>
          <li class="selected" ><a href="{{route('faculty.sectionDetails.students',$facultyStudentList[0]->c_student_courseId )}}">Students</a></li>
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
        <!-- previous slides starts -->
        <?php
        if(count($facultyStudentList) > 0)
         {
          ?>


<table style="width:600px;table-layout:fixed" align="left" border="1" cellspacing="8" > 
  <tr align="center">
      
      <td colspan="1" >STUDENTS</td>
      
    </tr>
  
    @foreach ($facultyStudentList as $s) 
    
       <tr >
      
       <td width="30%"  bgcolor="#64e885"><mark> {{$s->c_student_student}}</mark>  <a href="">✍</a> </td> 
       
       
        </tr>
        
       @endforeach
   
    
  </table>
  <?php
}?>

    
        <!-- previous slides ends -->


<form   method="post">
        <table style="width:600px;table-layout:fixed" align="right" border="1" cellspacing="8" > 
  <tr align="center">
      
      <td colspan="2" >GRADES BY SEMESTER</td>
      
    </tr>
  
   <tr >
      
       <td width="30%" colspan="2" bgcolor="#64e885"><mark> <input type="text"  name="g_student"></mark> </td> 
       
       
       
        </tr>

        <tr >
      
       <td width="30%"  bgcolor="#64e885">MID: <mark>A</mark> </td>
       <td width="30%"  bgcolor="#64e885"><mark> <input type="text" class="a" name="g_mid"></mark> </td> 
        
       
       
        </tr>

        <tr >
      
       <td width="30%"  bgcolor="#64e885">Final: <mark>A</mark> </td>
       <td width="30%"  bgcolor="#64e885"><mark> <input type="text" class="a" name="g_final"></mark> </td> 
        
       
       
        </tr>
        <tr >
      
       
       <td width="30%" colspan="2" bgcolor="#64e885"> <input class="submit" type="submit" name="name" value="Submit" /> </td> 
        
       
       
        </tr>
        
   
   
    
  </table>
       
        </form>







  





        
        
     
      @endsection



      
<style> 
select {
  width: 100%;
  
  border: none;
  border-radius: 4px;
  background-color: #f1f1f1;
}

.a {
  width: 100%;
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
  width: 50%;
}



</style>


     