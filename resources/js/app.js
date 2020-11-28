/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/*
* Custom Javascrip here
*
*
*/
function delay(callback, ms) {
    var timer = 0;
    return function() {
      var context = this, args = arguments;
      clearTimeout(timer);
      timer = setTimeout(function () {
        callback.apply(context, args);
      }, ms || 0);
    };
  }
  
var getBusinessesFromInput = async (url, inputString) => {
    $.ajax({
        type: "POST",
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        data: {// change data to this object
           _token : $('meta[name="csrf-token"]').attr('content'), 
           input: inputString
        },
        dataType: "text",
        success: function(resultData) {
            searchInputContainer.innerHTML = '';
             var businessHTML = '';
             resultData = JSON.parse(resultData);
             resultData["businesses"].forEach(business => {
                businessHTML += "<div class='col-md-4 col-sm-6 col-xs-6'>"+
                "<div class='business-container' style='background-image: url("+business['image_url']+")'>"+
                    "<div class='overlay'></div>"+
                    "<div class='business-content'>"+
                        "<p>"+business['name']+"</p>"+
                        "<a href='chatify/user/"+business['id']+"' class='btn btn-primary'>I\'m Here</a>"+
                    "</div>" +
                "</div>"+
            "</div>";
            });
            console.log('businessHTML', businessHTML);
            searchInputContainer.innerHTML += businessHTML;
        }
    });
}
var searchInputContainer = document.querySelector('.test');
var searchInput = document.querySelector('#business-input');
searchInput.addEventListener('keyup', delay(()=> {
    console.log('keyup', searchInput.value, config.routes.dashboard);
    getBusinessesFromInput('/dashboard', searchInput.value);
}, 500));
/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// temperary not using it
// require('./components/Example');