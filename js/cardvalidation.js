var today = new Date();
var thisMonth = today.getMonth() + 1;
var thisYear = today.getFullYear();        $(".expiryDate").on("change",function(){
    if ($("#expiryYear").val() < thisYear) {
       document.getElementById("errorExpiryDate").style.opacity = "1"; 
    }
    else if (($("#expiryYear").val() == thisYear) &&($("#expiryMonth").val() < thisMonth)) {
          document.getElementById("errorExpiryDate").style.opacity = "1";
    }
    else {
         document.getElementById("errorExpiryDate").style.opacity = "0"; 
    }
})    