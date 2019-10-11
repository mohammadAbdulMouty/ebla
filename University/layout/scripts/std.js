$('.closeupdateEma').on('click',function(){
        $('.overlay-editEmail').hide();
})

$('.editEmail').on('click',function(){
    $('.overlay-editEmail').show();
})

$('.saveupdateEma').on('click',function(){
    val = $('.overlay-editEmail').children('input').val();
    xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
        if (xml.readyState == 4 && xml.status == 200) {
            if(xml.responseText == 'Invalid email format'){
                $('.overlay-editEmail').animate({
                    height:'+=30px'
                },2,function(){
                    $('.email-error').show();
                    $('.email-error').html('Invalid email format');
                });
              
            }else{
                $('.emailval').html(xml.responseText);
                $('.overlay-editEmail').hide();
            }
            
        }
      }
      xml.open("GET", "ajaxstdChange.php?val=changeEmail&em="+val, true);
      xml.send();
})

$('.closeupdatepho').on('click',function(){
        $('.overlay-editphone').hide();
})

$('.editphone').on('click',function(){
    $('.overlay-editphone').show();
})

$('.saveupdatepho').on('click',function(){
    val = $('.overlay-editphone').children('input').val();
    xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
       if (xml.readyState == 4 && xml.status == 200) {
            if(xml.responseText == 'Invalid phone format'){
                $('.overlay-editphone').animate({
                    height:'+=30px'
                },2,function(){
                    $('.phone-error').show();
                    $('.phone-error').html('Invalid phone format');
                });
              
            }else{
                $('.phoneval').html(xml.responseText);
                $('.overlay-editphone').hide();
            }
            console.log(xml.responseText)
        }
      }
      xml.open("GET", "ajaxstdChange.php?val=changePhone&ph="+val, true);
      xml.send();
})
$('.cloasenewpass').on('click',function(){
        $('.overlay-changepass').hide();
})

$('.changpass').on('click',function(){
    $('.overlay-changepass').show();
})

$('.savepassword').on('click',function(){
    oldpass = $('.oldpass').val();
    newpass = $('.newpass').val();
    confirmpass = $('.confirmpass').val();
    fd = new FormData();
    fd.append('old',oldpass);
    fd.append('new',newpass);
    fd.append('confirm',confirmpass);
    xml = new XMLHttpRequest();
    xml.onreadystatechange = function() {
       if (xml.readyState == 4 && xml.status == 200) {
        if(xml.responseText !=''){
                $('.overlay-changepass').animate({
                    height:'+=30px'
                },2,function(){
                    $('.pass-error').show();
                    $('.pass-error').html(xml.responseText);
                });
              
            }
           
            
        }
      }
      xml.open("POST", "ajaxstdChange.php?val=changepass", true);
      xml.send(fd);
})


$('.showpass').on('click',function(){
    if($(this).next('input').attr('type')=='password'){
        $(this).next('input').attr('type','text');
        $(this).removeClass('fa-eye');
        $(this).addClass('fa-eye-slash');
    }else{
        $(this).next('input').attr('type','password');
        $(this).removeClass('fa-eye-slash');
        $(this).addClass('fa-eye');
    }

})
$('.nextyear').on('click',function(){
        var i = $(this).data('id');
        nextdata = i+1;
        console.log(nextdata)
        $('.table-avg[data-sid="'+nextdata+'"]').show();
        $('.table-avg[data-sid="'+nextdata+'"]').siblings().hide();

})
$('.prevyear').on('click',function(){
        var i = $(this).data('id');
        prevdata = i-1;
        console.log(prevdata)
        $('.table-avg[data-sid="'+prevdata+'"]').show();
    $('.table-avg[data-sid="'+prevdata+'"]').siblings().hide();

})


$('.btn-clacFutAvg').on('click',function(){

    sum = 0;
 sumMark = 0;
 hours = 0;
 futurehours = 0;
 s = 0;
 $point =0;
 sum23 =0;
 totalsum=0;
    var elements = $('.row-data');
   
    $arrayMark = new Array();
    $arrayhours = new Array();
    $arraysum = new Array();
   elements.each(function(){
       
       if($(this).find('.new-mark').val()== ''){
           
           if($(this).find('.mark').html() != 'لايوجد علامة'){
               
               point = parseFloat($(this).data('point'));
               sumMark +=parseInt($(this).find('.mark').html());
               hours += parseInt($(this).find('.coursHours').html());
               hoursclc = parseInt($(this).find('.coursHours').html());
            //    console.log(point*hoursclc);
               $arraysum.push(point*hoursclc);
               sum23 += point *hoursclc;
           
           }
       }else{
           hours += parseInt($(this).find('.coursHours').html());
            sumMark += parseInt($(this).find('.new-mark').val());
            $arrayMark.push($(this).find('.new-mark').val());
            $arrayhours.push($(this).find('.coursHours').html());
            
           
       }
   })
if($arrayhours.length != 0){
fd =new FormData();
fd.append('mark[]',$arrayMark);
fd.append('hours[]',$arrayhours);
xml = new XMLHttpRequest();
xml.onreadystatechange = function() {
    if (xml.readyState == 4 && xml.status == 200) {
        s = xml.responseText;
        totalsum = parseFloat(sum23)+parseFloat(s);
        console.log(sum23);
        console.log(s);
        console.log(totalsum);
        avg = totalsum/hours;

        console.log(hours);
        $('.futureAvg').html((avg).toFixed(2));
        console.log(xml.responseText)
    }
  }
  xml.open("POST", "ajaxpointmark.php", true);
  xml.send(fd);
}else{
    


avg = totalsum/hours;
//console.log(avg)   
//    console.log(i);
//    console.log(sumMark);
console.log(sum23);
$('.futureAvg').html((sum23/hours).toFixed(2));
}

// console.log(sum23);


// totalsum = sum23 +s;
// console.log($arrayMark);
// console.log(s);
// avg = totalsum/hours;
// //console.log(avg)   
// //    console.log(i);
// //    console.log(sumMark);
// //    console.log(hours);
// $('.futureAvg').html((avg).toFixed(2));

})


$('.btn-resetAvg').on ('click',function(){
    var elements = $('.row-data');
    elements.each(function(){
        $(this).find('.new-mark').val('');

    });
    $('.futureAvg').html('-');
})