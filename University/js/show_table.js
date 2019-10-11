
$('body').on('click','.close-overlay-edit',function(){
    $('.overlay-edit').hide();
})



$('body').on('click','.close-overlay-add',function(){
    $('.overlay-add').hide();
})




$('.btn-edit-user').on('click',function(){
   var id = $(this).data('id');

    xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            $('.overlay-edit').show();
            $('.form-edit').html(xml.responseText);
            
        }
      }
      xml.open("GET", "ajaxUser.php?val=showEdit&id="+id+"", true);
      xml.send();
});





$('.btn-add-user').on('click',function(){
   $('.overlay-add').show();
   
});






$('.btn-save-add').on('click',function(){
     var first = $('.FName').val();
    var last = $('.LName').val();
    var Birth = $('.Birth').val();
    var Prem = $('.Prem').val();
    var Address = $('.Address').val();
    var Username = $('.Username').val();
    var pass = $('.Password').val();
    if(first == '' || last == '' || Birth == '' || Address == '' || Username == '' || pass == ''){
        
        if(first == ''){
          $('.FName').css('border-color','red');
        }if(last == ''){
          $('.LName').css('border-color','red');
        }
        if(Birth == ''){
          $('.Birth').css('border-color','red');
        }if(Address == ''){
          $('.Address').css('border-color','red');
        }if(Username == ''){
          $('.Username').css('border-color','red');
        }if(pass == ''){
          $('.Password').css('border-color','red');
        }
    }else{
      fd = new FormData();
    xml = new XMLHttpRequest();
    
    fd.append('first',first);
    fd.append('last',last);
    fd.append('Birth',Birth);
    fd.append('Prem',Prem);
    fd.append('Address',Address);
    fd.append('Username',Username);
    fd.append('pass',pass);

    xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
           
            location.reload();
            
            
        }
      }
      xml.open("POST", "ajaxUser.php?val=addUser", true);
      xml.send(fd);
    }
})





$('body').on('click','.btn-save-edit',function(){
    var id = $('.page-edit-header').data('id')
    var first = $('.FName').val();
    var last = $('.LName').val();
    var Birth = $('.Birth').val();
    var Prem = $('.Prem').val();
    var Address = $('.Address').val();
    var Username = $('.Username').val();
    var pass = $('.Password').val();
    console.log(Prem);
    fd = new FormData();
    xml = new XMLHttpRequest();
    
    fd.append('first',first);
    fd.append('last',last);
    fd.append('Birth',Birth);
    fd.append('Prem',Prem);
    fd.append('Address',Address);
    fd.append('Username',Username);
    fd.append('pass',pass);
    xml.onreadystatechange = function(){
        if (xml.readyState == 4 && xml.status == 200) {
           
            location.reload();
        }
    }
    xml.open("POST", "ajaxUser.php?val=saveEdit&id="+id+"", true);
    xml.send(fd);


    // Delete Employee


})





$('.btn-delete-user').on('click',function(){
   var id = $(this).data('id');
   var r = confirm('Are you sure you want to delete this record');
   if(r == true){
    xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            location.reload();
            
            
        }
      }
      xml.open("GET", "ajaxUser.php?val=deleteRow&id="+id+"", true);
      xml.send();
   }
   
})




$('.btn-add-user').on('click',function(){
    
})







// Student page




$('body').on('click','.close-overlay-edit-std',function(){
    $('.overlay-edit-std').hide();
})


$('.btn-edit-std').on('click',function(){
    var student_id = $(this).data('studentid');
        console.log(student_id)
     xml = new XMLHttpRequest();
     xml.onreadystatechange = function() {
         if (xml.readyState == 4 && xml.status == 200) {
             $('.overlay-edit-std').show();
             $('.form-edit-std').html(xml.responseText);
             
         }
       }
       xml.open("GET", "ajaxStd.php?val=showEdit&id="+student_id+"", true);
       xml.send();
 });




//edit the student


 $('body').on('click','.btn-save-edit-std',function(){
     console.log('hi')
    var id = $('.page-edit-headerstd').data('id');
 var first = $('.fName').val();
var last = $('.lName').val();
var mom = $('.momName').val();
var fatN = $('.fatName').val();
var gen = $('.gender').val();
var natNum = $('.natiNum').val();
var addrStd = $('.addressSTd').val();
var phone = $('.phone').val();
var yearReg = $('.yearReg').val();
var email = $('.email').val();
var depid = $('.depid').val();
var bacRate = $('.bacRate').val();
var degid = $('.degId').val();
var pass = $('.pass').val();
var passC = $('.passconfig').val();
xml = new XMLHttpRequest();
    if(pass == passC){
        fd = new FormData();
        fd.append('first',first);
        fd.append('last',last);
        fd.append('mom',mom);
        fd.append('fatN',fatN);
        fd.append('gen',gen);
        fd.append('natNum',natNum);
        fd.append('addrStd',addrStd);
        fd.append('phone',phone);
        fd.append('yearReg',yearReg);
        fd.append('email',email);
        fd.append('depid',depid);
        fd.append('bacRate',bacRate);
        fd.append('degid',degid);
        fd.append('pass',pass);
       
        
        xml.onreadystatechange = function(){
            if (xml.readyState == 4 && xml.status == 200) {
                    console.log(xml.responseText)
                    location.reload();
                }
    }
    xml.open("POST", "ajaxStd.php?val=saveEditstd&student_id="+id+"", true);
    xml.send(fd);
    }else{
        $('.pass').css('border-color','#f00');
        $('.passconfig').css('border-color','#f00');
        alert('the password not correct')
    }


 })







 $('body').on('click','.showpass .fa-eye,.showpass .fa-eye-slash',function(){
    
    var input = $(this).next('input');
    if(input.attr('type') == 'password'){
     $(this).addClass('fa-eye-slash');
     $(this).removeClass('fa-eye');
    
     input.attr('type','text');
    }else if(input.attr('type') == 'text'){
     $(this).addClass('fa-eye');
     $(this).removeClass('fa-eye-slash');
    
     input.attr('type','password');
    }
    
 })




//delete the student



 $('.btn-delete-std').on('click',function(){
    var id = $(this).data('studentid');
    var r = confirm('Are you sure you want to delete this record');
    if(r == true){
     xml = new XMLHttpRequest();
     xml.onreadystatechange = function() {
         if (xml.readyState == 4 && xml.status == 200) {
             location.reload();
             
             
         }
       }
       xml.open("GET", "ajaxStd.php?val=deleteRow&id="+id+"", true);
       xml.send();
    }
    
 })



 //add the student



 $('.btn-add-std').on('click',function(){
    $('.overlay-add-std').show();
    
 });




 $('body').on('click','.close-overlay-add-std',function(){
    $('.overlay-add-std').hide();
})




$('body').on('click','.btn-save-add-std',function(){


var id = $('.studentid').val();
var first = $('.fName').val();
var last = $('.lName').val();
var mom = $('.momName').val();
var fatN = $('.fatName').val();
var gen = $('.gender').val();
var natNum = $('.natiNum').val();
var addrStd = $('.addressSTd').val();
var birthday = $('.birthday').val();
var phone = $('.phone').val();
var yearReg = $('.yearReg').val();
var email = $('.email').val();
var depid = $('.depid').val();
var bacRate = $('.bacRate').val();
var degid = $('.degId').val();
var pass = $('.pass').val();
var passC = $('.passconfig').val();

xml = new XMLHttpRequest();
    if(pass == passC){
        fd = new FormData();
        fd.append('first',first);
        fd.append('last',last);
        fd.append('mom',mom);
        fd.append('fatN',fatN);
        fd.append('gen',gen);
        fd.append('natNum',natNum);
        fd.append('addrStd',addrStd);
        fd.append('birthday',birthday);
        fd.append('phone',phone);
        fd.append('yearReg',yearReg);
        fd.append('email',email);
        fd.append('depid',depid);
        fd.append('bacRate',bacRate);
        fd.append('degid',degid);
        fd.append('pass',pass);
        fd.append('id',id);
       
        
        xml.onreadystatechange = function(){
            if (xml.readyState == 4 && xml.status == 200) {
                    console.log(xml.responseText)
                    
                }
    }
    xml.open("POST", "ajaxStd.php?val=addstd", true);
    xml.send(fd);
    }else{
        $('.pass').css('border-color','#f00');
        $('.passconfig').css('border-color','#f00');
        alert('the password not correct')
    }
    location.reload();

})






$('.moreinf').on('click',function(e){
e.preventDefault();
var id = $(this).data('studentid');
xml = new XMLHttpRequest();
xml.onreadystatechange = function(){
    if (xml.readyState == 4 && xml.status == 200) {
        $('.overlay-content').html(xml.responseText);
        $('.overlay-more-user').show();
            
         
        }
}
xml.open("POST", "ajaxStd.php?val=showMore&id="+id+"", true);
xml.send();
})
$('body').on('click','.close-more',function(){
    $('.overlay-more-user').hide();
})











// course Page


$('body').on('click','.close-overlay-edit-cuor',function(){
    $('.overlay-edit-course').hide();
})


$('.btn-edit-cour').on('click',function(){
    var id = $(this).data('courseid');

    console.log(id)
    xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            $('.overlay-edit-course').show();
            $('.form-edit-course').html(xml.responseText);
            
        }
      }
      xml.open("GET", "ajaxCour.php?val=showEdit&id="+id+"", true);
      xml.send();
});



//edit the course



$('body').on('click','.btn-save-edit-cour',function(){
    console.log('hi')
        var id = $('.page-edit-headerstd').data('id');
        var cname = $('.cname').val();
        var Chours = $('.Chours').val();
        var depid = $('.depid').val();
        var gen = $('.general').val();
        var Ess = $('.Essential').val();
        var Semes = $('.semester').val();
        var Clvl= $('.Clvl').val();
        console.log(id,cname,Chours,depid,gen,Ess,Semes,Clvl);
       fd = new FormData();
       fd.append('Cname',cname);
       fd.append('Chours',Chours);
       fd.append('depid',depid);
       fd.append('gen',gen);
       fd.append('Ess',Ess);
       fd.append('Semes',Semes);
       fd.append('Clvl',Clvl);
   
       
       xml.onreadystatechange = function(){
           if (xml.readyState == 4 && xml.status == 200) {
                   console.log(xml.responseText)
                   location.reload();
               }
   }
   xml.open("POST", "ajaxCour.php?val=saveEditcour&course_id="+id+"", true);
   xml.send(fd);

 })



//delete the course



 $('.btn-delete-cour').on('click',function(){
    var id = $(this).data('courseid');
    var r = confirm('Are you sure you want to delete this record');
    if(r == true){
     xml = new XMLHttpRequest();
     xml.onreadystatechange = function() {
         if (xml.readyState == 4 && xml.status == 200) {
             console.log(xml.responseText)
             location.reload();
             
             
         }
       }
       xml.open("GET", "ajaxCour.php?val=deleteRow&id="+id+"", true);
       xml.send();
    }
    
 })




//Add the course


 $('.btn-add-cour').on('click',function(){
    $('.overlay-add-cour').show();
    
 });



 $('body').on('click','.close-overlay-add-cour',function(){
    $('.overlay-add-cour').hide();
})







$('body').on('click','.btn-save-add-cour',function(){

    var id = $('.courseid').val();
    var Cname = $('.Cname').val();
    var Chours = $('.Chours').val();
    var depid = $('.depid').val();
    var gen = $('.general').val();
    var Ess = $('.Essential').val();
    var Semes = $('.semester').val();
    var Clvl= $('.Clvl').val();
    console.log(id,Cname,Chours,depid,gen,Ess,Semes,Clvl)
    xml = new XMLHttpRequest();
        fd = new FormData();
            fd.append('Cname',Cname);
            fd.append('id',id);
            fd.append('Chours',Chours);
            fd.append('depid',depid);
            
            fd.append('gen',gen);
            fd.append('Ess',Ess);
            fd.append('Semes',Semes);
            fd.append('Clvl',Clvl);

            xml.onreadystatechange = function(){
                if (xml.readyState == 4 && xml.status == 200) {
                        console.log(xml.responseText)
                        
                    }
        }
        xml.open("POST", "ajaxCour.php?val=addcour", true);
        xml.send(fd);
        })






        $('.sname').on('keyup',function(){
            val = $(this).val();
            xml = new XMLHttpRequest();
            xml.onreadystatechange = function(){
                if (xml.readyState == 4 && xml.status == 200) {
                        if(val != ''){
                            $('.auto-complete').show();
                            $('.auto-complete').html(xml.responseText);
                        }else{
                            $('.auto-complete').hide();
                            $('.auto-complete').html('');
                        }
                           
                        
                        
                    }
        }
        xml.open("POST", "ajaxAddMark.php?val=autoComp&value="+val, true);
        xml.send();
        })




        $('body').on('click','.studentSearFou',function(){
            $('.auto-complete').hide();
            $('.auto-complete').html('');
            studentid = $(this).data('sid');
            xml = new XMLHttpRequest();
            xml.onreadystatechange = function(){
                if (xml.readyState == 4 && xml.status == 200) {
                        
                    }
        }
        xml.open("POST", "ajaxAddMark.php?val=showStud&stdid="+studentid, true);
        xml.send();
        })




        $('body').on('click','.studentSearFou',function(){
            studentid = $(this).children('span.idstudent').html();
            xml = new XMLHttpRequest();
            xml.onreadystatechange = function(){
                if (xml.readyState == 4 && xml.status == 200) {
                    $('.container-student').html(xml.responseText);

                }
            }
            xml.open("POST", "ajaxAddMark.php?val=showstd&value="+studentid, true);
            xml.send();
        })





        $('body').on('keyup','.searchcourse',function(){
            val = $(this).val();
            xml = new XMLHttpRequest();
            xml.onreadystatechange = function(){
                if (xml.readyState == 4 && xml.status == 200) {
                        if(val != ''){
                            $('.showCourse').show();
                            $('.showCourse').html(xml.responseText);
                        }else{
                            $('.showCourse').hide();
                            $('.showCourse').html('');
                        }
                        
                    }
        }
        xml.open("POST", "ajaxAddMark.php?val=autoCompCourse&value="+val, true);
        xml.send();
        })






        $('body').on('click','.courseName',function(){
            stdid = $('.container-student').find('.elementaco').first().data('id');
            courseName =$(this).html();
            courseid = $(this).data('cid');
           
            xml = new XMLHttpRequest();
            xml.onreadystatechange = function(){
                if (xml.readyState == 4 && xml.status == 200) {
                    
                    $('.showCourse').hide();
                    $('.showCourse').html('');
                    $('.searchcourse').data('dsd',courseid);
                    $('.searchcourse').val(courseName)
      
                    
                    


                }
            }
            xml.open("POST", "ajaxAddMark.php?val=addMark&value="+stdid+"&couid="+courseid, true);
            xml.send();
        });







        $('body').on('click','.btn-save-reqister',function(){
            stdid = $('.container-student').find('.elementaco').first().data('id');
            yeaid = $('.yearid').val();
            semid = $('.semesterid').val();
           
            console.log(stdid,yeaid,semid);
            
            xml = new XMLHttpRequest();
            xml.onreadystatechange = function(){
                if (xml.readyState == 4 && xml.status == 200) {
                    console.log(xml.responseText)

                }
            }
            xml.open("POST", "ajaxAddMark.php?val=savecourse&stdid="+stdid+"&year="+yeaid+"&sems="+semid, true);
            xml.send();
        })
        
        







        $('.Cname').on('keyup',function(){
            val = $(this).val();
            xml = new XMLHttpRequest();
            xml.onreadystatechange = function(){
                if (xml.readyState == 4 && xml.status == 200) {
                        if(val != ''){
                            $('.auto-complete1').show();
                            $('.auto-complete1').html(xml.responseText);
                        }else{
                            $('.auto-complete1').hide();
                            $('.auto-complete1').html('');
                        }
                           
                        
                        
                    }
        }
        xml.open("POST", "ajaxAddMark2.php?val=autoComp&value="+val, true);
        xml.send();
        })
        $('body').on('click','.CourseSearFou',function(){
            idcourse = $(this).data('sid');
            xml = new XMLHttpRequest(); 
            xml.onreadystatechange = function(){
                if (xml.readyState == 4 && xml.status == 200) {
                    $('.auto-complete1').hide();
                    console.log(xml.responseText)
                    $('.container-student').html(xml.responseText)
                }
            }
            xml.open("POST", "ajaxAddMark2.php?val=showMark&value="+idcourse, true);
            xml.send();
        })