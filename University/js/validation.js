function FormValidation(){
    //First Name Validation 
    var fn=document.getElementById('firstname').value;
    var pw=document.getElementById('password').value;

    if(fn == "" && pw==""){
        alert('Please Enter User Name & password');
        document.getElementById('firstname').style.borderColor = "red";
        document.getElementById('password').style.borderColor = "red";
        return false;
    }
    else if (fn == ""){
        alert('Please Enter User Name');
        document.getElementById('firstname').style.borderColor = "red";
        return false;
    }
    else if(pw=="")
        {   
    alert('Please Enter password');
    document.getElementById('password').style.borderColor = "red";
    return false;
        }


    if(fn.length <=2){
        alert('Your Name is To Short');
        document.getElementById('firstname').style.borderColor = "red";
        return false;
    }else{
        document.getElementById('firstname').style.borderColor = "green";
    }
}








$('.slideSecond').on('click',function(){
    if($(".slideSecond").attr('data-foo')){
        $(".slideSecond" ).removeAttr('data-foo');
        $('.ourarrow').removeClass('fa-angle-down');
        $('.ourarrow').addClass('fa-angle-left');
    }else{
        $(".slideSecond" ).attr( "data-foo", 52 );
        $('.ourarrow').removeClass('fa-angle-left');
        $('.ourarrow').addClass('fa-angle-down');
    }
    
    $('.nav-second-level').slideToggle(300);
})



$('.slideSecond1').on('click',function(){
    if($(".slideSecond1").attr('data-foo')){
        $(".slideSecond1" ).removeAttr('data-foo');
        $('.ourarrow').removeClass('fa-angle-down');
        $('.ourarrow').addClass('fa-angle-left');
    }else{
        $(".slideSecond1" ).attr( "data-foo", 52 );
        $('.ourarrow').removeClass('fa-angle-left');
        $('.ourarrow').addClass('fa-angle-down');
    }
    
    $('.nav-second-level').slideToggle(300);
})