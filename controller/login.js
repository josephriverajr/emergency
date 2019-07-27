function login2(){
  var username = jQuery('#Username').val();
  var password = jQuery('#Password').val();
  if(username && password){

      $.ajax({
          type: 'POST',
          url:  "./model/login.php",
          data: {
              username: username,
              password: password
          },

          success: function(response){
          //  console.log(response)
             if(JSON.parse(response).length>0){
                var arr = JSON.parse(response)[0];
                if(arr){
                  if(arr.isAdmin==1){
                    window.location = "./admin/index.php";
                  }
                  else if(arr.isAdmin==2){
                    window.location = "./responder/index.php";
                  }
                  else{
                    window.location = "./public/index.php";
                  }
                  }
                else{
                  alert("User does not exist!");
                }
             }
              else{
                alert("User does not exist!");
              }
            },

            error: function(response){
              alert("Users does not exist!");
            }
      });
  }
  else{
    alert("All fields are required!")
  }
}
