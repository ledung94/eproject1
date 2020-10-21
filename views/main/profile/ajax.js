const showProfile = () => {
  $.ajax({
    //create an ajax request to display.php
    type: "GET",
    url: "./profile/showprofile.php",
    dataType: "html", //expect html to be returned
    success: function (response) {
      $("#profile").html(response);
      //alert(response);
    },
  });
};

const showOrders = () => {
  $.ajax({
    //create an ajax request to display.php
    type: "GET",
    url: "./profile/showOrders.php",
    dataType: "html", //expect html to be returned
    success: function (response) {
      $("#profile").html(response);
      //alert(response);
    },
  });
};

const editProfile = () => {
  $.ajax({
    //create an ajax request to display.php
    type: "GET",
    url: "./profile/editProfile.php",
    dataType: "html", //expect html to be returned
    success: function (response) {
      $("#profile").html(response);
      //alert(response);
    },
  });
};

const updateProfile = (e) => {
  e.preventDefault();
  $.ajax({
    type: "post",
    url: "./profile/updateProfile.php",
    data: $("#updateUser").serialize(),
    success: function () {
      alert("form was submitted");
    },
  });
};


