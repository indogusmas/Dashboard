document.addEventListener("DOMContentLoaded",function(){
  toastr.options = {
    "closeButton": true,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }

  if (document.body.dataset.notification) {
    let type = document.body.dataset.notificationType;
    switch(type){
      case'success':
          toastr.success(JSON.parse(document.body.dataset.notificationMessage));
          break;
      case 'error':
          toastr.error(JSON.parse(document.body.dataset.notificationMessage))
          break;

    }
  }

  
});