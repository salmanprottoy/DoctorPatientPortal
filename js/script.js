$(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      document.getElementById("bodyContent").style.width="100%";
    });
});


function triggerClick(){
  document.querySelector('#profileImage').click();
}

function displayImage(e){
  if(e.files[0]){
    var reader = new FileReader();

    reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src',e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}