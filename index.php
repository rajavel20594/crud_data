<!DOCTYPE html>
<html lang="en">
   <head>
      <title>CRUD </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
      <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
   </head>
   <body >
      <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
         <ul class="navbar-nav">
            <li class="nav-item active" id="li_crud">
               <a class="nav-link" href="#" id="nav-crud">CRUD</a>
            </li>
            <li class="nav-item" id="li_about">
               <a class="nav-link" href="#" id="nav-about">About</a>
            </li>
         </ul>
      </nav>
      <br></br>
      <div class="container">
         <div class="row " >
            <div class="col-md-6 crud">
               <h2>CREATE DATA</h2>
            </div>
            <div class="col-md-6 text-center rightcrud" id="tableheaddiv" >
               <h2>TABLE</h2>
            </div>
         </div>
         <div class="row " >
            <div class="col-md-6 crud">
               <form action="#" >
                  <div class="form-group" id="namediv">
                     <label for="name">Name:</label>
                     <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" onchange="myfunction(value)">
                  </div>
                  <div class="form-group" id="phonediv" >
                     <label for="phone" >Phone Number:</label>
                     <input type="number" class="form-control" id="phone" placeholder="Enter phone number" name="phone" pattern="[0-9]{10}" required>
                  </div>
                  <div class="form-group "id="iddiv">
                     <label for="id">Id:</label>
                     <input class="form-control" type="text" id="id" placeholder="Enter the Id value" name="id"> 
                     </label>
                  </div>
                  <div>
                     <table>
                        <div class="form-group" id="dobdiv" >
                           <label for="date" >Date of Birth:</label>
                           <input type="date" class="form-control" id="dob"  name="dob">
                        </div>
                        <div>
                           <label>Gender :</label>
                        </div>
                        <div class="form-group radio">
                           <label class="radio-inline"><input type="radio" name="gender" id="genderMale" value="male" checked> Male</label>
                           <label class="radio-inline"><input type="radio" name="gender" id="genderFemale" value="female" > Female</label>    
                        </div>
                  </div>
                  <div>
                  <label>Nationality</label>
                  <select class="form-control bfh-countries" id="nation" name="nation"> 
                  <option selected disabled>--Select City--</option>
                  
                  <option value="Afghanistan">Afghanistan</option>
                  <option value="Ć…land Islands">Ć…land Islands</option>
                  <option value="Albania">Albania</option>
                  <option value="Algeria">Algeria</option>
                  <option value="Australia">Australia</option>
                  <option value="Austria">Austria</option>
                  <option value="Azerbaijan">Azerbaijan</option>
                  <option value="Bahamas">Bahamas</option>
                  <option value="Bahrain">Bahrain</option>
                  <option value="Bangladesh">Bangladesh</option>
                  <option value="Canada">Canada</option>
                  <option value="Canada">Canada</option>
                  <option value="Iceland">Iceland</option>
                  <option value="India">India</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                  <option value="Iraq">Iraq</option>
                  <option value="Ireland">Ireland</option>
                  <option value="Isle of Man">Isle of Man</option>
                  <option value="Israel">Israel</option>
                  <option value="Ukraine">Ukraine</option>
                  <option value="United Arab Emirates">United Arab Emirates</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Zambia">Zambia</option>
                  <option value="Zimbabwe">Zimbabwe</option>
                  </select>
                  </tr>  
                  </div>
                  </table>
            </div>
            <div class="float-right">
               <button type="button" class="btn btn-primary" id="reset">Reset</button>
               <button type="submit" class="btn btn-primary" id="submit">Submit</button>
               <button type="update" class="btn btn-primary" id="update">update</button>
               <button type="delete" class="btn btn-primary" id="delete">Delete</button>
            </div>
            </form>
         </div>
         <div class="col-md-6 rightcrud" id="tablediv">
            <table class="table table-bordered text-center" >
               <thead>
                  <tr>
                     <th>Id</th>
                     <th>Name</th>
                     <th>Phone</th>
                     <th>Dob</th>
                     <th>Gender</th>
                     <th>nationality</th>
                     <th >Edit </th>
                     <th> Delete</th>
                  </tr>
               </thead>
               <tbody id="tbody"></tbody>
            </table>
         </div>
      </div>
      </div>
      <script
         src="https://code.jquery.com/jquery-3.6.0.js"
         integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
         crossorigin="anonymous"></script>
      <script>
         function myfunction(value)
         {
           
            //alert(value);
            var custom_method = "user_all_data";
            var name = $("#name").val();
            $.ajax({
               type: "GET",
               url: "restcrud.php",
               data: {
                  name: name,
                  custom_method: custom_method
               },
               success: function myfunction(res)
                {
                  console.log(res);
                  
                 if(res > 0)
                  {
                  //   if(confirm("hi")) {
                  //    alert("hi");
                  //    return;
                  //   }
                   alert("aleready exist")
                     $("#submit").hide();       
                  }
                  else{
                     $("#submit").show();  
                  }
                 
               }
         });
         } 
         $("#submit").click(function() {
            var name = $("#name").val();
            var phone = $("#phone").val();
            var dob=$("#dob").val();
            var gender = document.getElementsByName('gender');
            for (var radio of gender)
            {
               if (radio.checked) {
                     var gender = radio.value;
               }
            }
            var nationlity=$("#nation").val()
            var custom_method = "create";
         
            if (name == '' || phone == '' ) {
               alert("Please fill all fields.");
               return false;
            } else if(phone.length >10)
            {
               alert("Password More than 10 digit");
               return false;
            }
            else if(phone.length <10)
            {
               alert("password less than 10 digit")
               return false;
            }
            
          
         
            $.ajax({
               type: "POST",
               url: "restcrud.php",
               data: {
                  name: name,
                  phone: phone,
                  dob: dob,
                  gender: gender,
                  nationlity: nationlity,
                  custom_method: custom_method
               },
               cache: false,
               success: function(result) {
                  console.log(result);
                  alert(result);
                  location.reload();
               },
               error: function(xhr, status, error) {
                  console.error(xhr);
               }
            });
         });
         
         $(document).ready(function($) {
            //on page load, get all data from db using ajax
            document.getElementById("update").style.display = "none";
            document.getElementById("iddiv").style.display = "none";
            document.getElementById("delete").style.display = "none";
            // radiobutton=document.getElementById("genderMale");
            // radiobutton.checked=true;
            //document.getElementById("tbody").style.display = "none";
            //document.getElementById("tableheaddiv").style.display = "none";
          //   document.getElementsByClassName("abtdiv")[1].style.display = "none";
           //$("#tablediv").hide();
            //  $("#nav-about").click(function() {
             
            var custom_method = "get_all_data";
            $.ajax({
               type: "GET",
               url: "restcrud.php",
               data: {
                  custom_method: custom_method
               },
               success: function(res) {
                  console.log(res);
                  var table_tr = ''
         
                  $.each(JSON.parse(res), function(i, item) {
                     table_tr += '<tr><td>' + item.id + '</td><td>' + item.name + '</td><td>' + item.phone + '</td><td>' + item.dob + '</td><td>' + item.gender + '</td><td>' + item.nationlity + '</td><td> <i class="fa fa-edit" style="color:blue;" title="edit" onclick="editFunction(' + item.id + ',\'' + item.name + '\',' + item.phone + ',\'' + item.dob + '\',\'' + item.gender +'\',\'' + item.nationlity +'\')"></i></td><td><i class="fa fa-times" style="color:red;"title="delete" onclick="deleteFunction(' + item.id + ')"></i></td></tr>';
                  });
                  $('#tbody').append(table_tr);
               }
            });
         });
         function editFunction(id, name, phone, dob,gender,nation) {
            document.getElementById("name").value = name;
            document.getElementById("phone").value = phone;
            document.getElementById("id").value = id; //
            document.getElementById("dob").value = dob; 
            if(gender == "male") {
               // genderMale
               document.getElementById("genderMale").checked = true;
            } else {
               document.getElementById("genderFemale").checked = true;
            }
           
             $("#nation").val(nation);
            
               
            
           
            // document.getElementById("id").value = id; 
            document.getElementById("update").style.display = "inline"; //javascript
            document.getElementById("submit").style.display = "none";
         }
         
         function deleteFunction(id)
         {  
            if(confirm("Are you sure on Delete"))
            {
               var custom_method = "delete";
               $.ajax({
                  type: "POST",
                  url: "restcrud.php",
                  data: {
                     id:id,
                     custom_method: custom_method
                  },
                  cache: false,
                  success: function(result) {
                     alert(result);
                     location.reload();
                  },
                  error: function(xhr, status, error) {
                     console.error(xhr);
                  }
               });
            }
           
         }
         
         $("#update").click(function() {
            var name = $("#name").val();
            var phone = $("#phone").val();
            var id =$("#id").val();
            var dob=$("#dob").val();
            var custom_method = "update";
         
            if (name == '' || phone == '') {
               alert("Please fill all fields.");
               return false;
            }
         
            $.ajax({
               type: "POST",
               url: "restcrud.php",
               data: {
                  name: name,
                  phone: phone,
                  id:id,
                  dob:dob,
                  custom_method: custom_method
               },
               cache: false,
               success: function(result) {
                  alert(result);
                  location.reload();
               },
               error: function(xhr, status, error) {
                  console.error(xhr);
               }
            });
         });
         
         $("#nav-crud").click(function(){
            // $(".abtdiv").hide();//jquery hide syntax
             $(".crud").show();
             $("#li_about").removeClass().addClass("nav-item");
             $("#li_crud").removeClass().addClass("nav-item active");
            //  $("#tablediv").hide();
            //  $("#tableheaddiv").hide();
             $(".rightcrud").hide();
         });
            $(".rightcrud").hide();
            //   $("#tablediv").hide();
            //  $("#tableheaddiv").hide();
         
         $("#nav-about").click(function(){
            $(".crud").hide();//.class and #id call
           
            //document.getElementById("tableheaddiv").style.display = "show";
            $("#li_about").removeClass().addClass("nav-item active");// active
            $("#li_crud").removeClass().addClass("nav-item");
            // $("#tableheaddiv").show()
            // $("#tablediv").show();
            $(".rightcrud").show();
            
         });
         $("#reset").click(function(){
           if(confirm("Are you sure on Reset All data"))
           {
            document.location.reload(true);
           }
         });
      </script>
   </body>
</html>