
function createSideBar() {
  $("#sidebar").append(
    `<div class="logo">
    <a href="./index.php" class="simple-text">
        START ORGANIC
    </a>
</div>
<div class="logo logo-mini">
    <a href="./index.php" class="simple-text">
        SO
    </a>
</div>
<div class="sidebar-wrapper">
    <div class="user">
        <div class="photo">
            <img src="../../templates/dashboard/assets/img/faces/admin-avatar.png" />
        </div>
        <div class="info">
            <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                Admin
            </a>
        </div>
    </div>
    <ul class="nav">
      <li class="nav-item   ">
        <a class="nav-link" href="./index.php">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./Product.php">
          <i class="material-icons">subject</i>
          <p>All Products</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./CreateProduct.php">
          <i class="material-icons">add_box</i>
          <p>Add Product</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./orderManage.php">
          <i class="material-icons">list_alt</i>
          <p>Order Manage</p>
        </a>
      </li>
      <li class="nav-item" id="Logout">
        <a class="nav-link" href="./login.php">
          <i class="material-icons">exit_to_app</i>
          <p>Logout</p>
        </a>
      </li>
    </ul>
</div>`
  )
}

function setActiveTab(){
  var href = document.location.href;
  var lastPathSegment = href.substr(href.lastIndexOf('/'));
  if(lastPathSegment=="/"){
    $('.nav-item')[0].setAttribute('class','nav-item active');
  }
  $.each($('.nav-item'), function() {
    var currentHref = this.firstElementChild.getAttribute('href').substr(1);
    if (currentHref == lastPathSegment){
      this.setAttribute('class','nav-item active');
    }
  });
}
//show notification
function NotificationSucces(mess){

$.notify({
    icon: "notifications",
    message: `<b>Success!</b> ${mess}.`

  },{
      type: 'success',
      timer: 3000,
      placement: {
        from: "top",
        align: "right"
      }
  });
}

function NotificationError(){

$.notify({
    icon: "error",
    message: " <b>Oop!</b> Something error, Contact a technician to fix it."

  },{
      type: 'danger',
      timer: 3000,
      placement: {
          from: "top",
          align: "right"
      }
  });
}

function checkIsLogined(){
  if (typeof(Storage) !== "undefined") {
          var login = sessionStorage.getItem("loginsuccess");
         
          if(login != "1")  location.replace("login.php");
      }
}

$(document).ready(function() {
  checkIsLogined();

  $("body").append(`
  <div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
  </div>
  ` )

  createSideBar();
  setActiveTab();
  $("#Logout").click(function(){
    sessionStorage.removeItem('loginsuccess');
  })
//Show loading when call ajax function
  $(document).ajaxStart(function()
  {
      $(".loader-wrapper").fadeIn();
  });
  $(document).ajaxComplete(function()
  {
     $(".loader-wrapper").fadeOut('slow');
  });
})
//Show loading when loading page
$(window).on("load",function(){
  $(".loader-wrapper").fadeOut("slow");
});