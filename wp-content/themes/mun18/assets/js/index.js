//Countdown Timer
var countDownDate = new Date("Sep 28, 2018 08:00:00").getTime();

var x = setInterval(function() {

  var now = new Date().getTime();

  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  if (days<10){
  	days = "0"+days;
  }
  if (hours<10){
  	hours = "0"+hours;
  }
  if (minutes<10){
  	minutes = "0" + minutes;
  }
  if (seconds<10){
  	seconds = "0" + seconds;
  }

  jQuery('#beta-first .layer .timer .days').html("<div class='time'>" + days + "</div><p>days</p>");
  jQuery('#beta-first .layer .timer .hours').html("<div class='time'>" + hours + "</div><p>hours</p>");
  jQuery('#beta-first .layer .timer .minutes').html("<div class='time'>" + minutes + "</div><p>mins</p>");
  jQuery('#beta-first .layer .timer .seconds').html("<div class='time'>" + seconds + "</div><p>secs</p>");

}, 1000);


//Navbar Show and Hide
jQuery(document).ready(function(){
  var height = jQuery(window).height();
  var width = jQuery(window).width();
  jQuery('.navbar-brand #img1').hide();

  jQuery(window).scroll(function(){
    if (jQuery(window).scrollTop() > height/3){
      jQuery(".navbar").css({'background-color':'white'});
      jQuery(".menu-item a").css({'color':'black'});
      jQuery('.dropdown-menu>li>a').css({'color':'black', 'text-shadow': '0 0 20px #000'});
      jQuery('.navbar-nav>li>.dropdown-menu').css({'background-color':'rgba(255,255,255,0.95)', 'border':'0'});
      jQuery('.navbar-toggle').css({'border': '1px solid #00c2e5'});
      jQuery('.navbar-toggle .icon-bar').css({'background-color': '#00c2e5'});
      if (width<= 768){
        jQuery('.navbar-right').css({'background-color': 'white'});
        jQuery('.navbar-brand #img1').show();
        jQuery('.navbar-brand #img2').hide();
      }
    }else{
      jQuery(".navbar").css({'background-color':'transparent'});
      jQuery(".menu-item a").css({'color':'white'});
      jQuery('.dropdown-menu>li>a').css({'color':'white','text-shadow': '0 0 20px #fff'});
      jQuery('.navbar-nav>li>.dropdown-menu').css({'background-color':'rgba(0,0,0,0.15)', 'border':'1px solid #555'});
      jQuery('.navbar-toggle').css({'border': '1px solid white'});
      jQuery('.navbar-toggle .icon-bar').css({'background-color': 'white'});
      if (width<= 768){
        jQuery('.navbar-right').css({'background-color': 'rgba(0,0,0,0.55)'});
        jQuery('.navbar-brand #img2').show();
        jQuery('.navbar-brand #img1').hide();
      }else{
        jQuery('.navbar-right').css({'background-color': 'transparent'});
      }
    }  
  })
  
})



//Registration Form Select Delegation Type
jQuery('button#single-delegation').click(function(){
  jQuery('div.single-delegation').show();
  jQuery('div.double-delegation').hide();
  jQuery('div.international-press').hide();
  registrations_footer();
  jQuery('button#single-delegation').css({'background-color': '#00c2e5', 'color': 'white'});
  jQuery('button#double-delegation').css({'background-color': 'transparent', 'color': '#00c2e5'});
  jQuery('button#international-press').css({'background-color': 'transparent', 'color': '#00c2e5'});
})
jQuery('button#double-delegation').click(function(){
  jQuery('div.single-delegation').hide();
  jQuery('div.double-delegation').show();
  jQuery('div.international-press').hide();
  registrations_footer();
  jQuery('button#single-delegation').css({'background-color': 'transparent', 'color': '#00c2e5'});
  jQuery('button#double-delegation').css({'background-color': '#00c2e5', 'color': 'white'});
  jQuery('button#international-press').css({'background-color': 'transparent', 'color': '#00c2e5'});
})
jQuery('button#international-press').click(function(){
  jQuery('div.single-delegation').hide();
  jQuery('div.double-delegation').hide();
  jQuery('div.international-press').show();
  registrations_footer();
  jQuery('button#single-delegation').css({'background-color': 'transparent', 'color': '#00c2e5'});
  jQuery('button#double-delegation').css({'background-color': 'transparent', 'color': '#00c2e5'});
  jQuery('button#international-press').css({'background-color': '#00c2e5', 'color': 'white'});
});

function registrations_footer(){
  jQuery('.footer-copyright').css('position', 'relative');
}


//Registration Form Show Countries

var x1 = jQuery('#committee1').val();
jQuery('#country11 option').each(function(){
  var y1 = jQuery(this).attr('id');
  if (x1 === y1 || y1 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country12 option').each(function(){
  var y1 = jQuery(this).attr('id');
  if (x1 === y1 || y1 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country13 option').each(function(){
  var y1 = jQuery(this).attr('id');
  if (x1 === y1 || y1 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});


var x2 = jQuery('#committee2').val();
jQuery('#country21 option').each(function(){
  var y2 = jQuery(this).attr('id');
  if (x2 === y2 || y2 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country22 option').each(function(){
  var y2 = jQuery(this).attr('id');
  if (x2 === y2 || y2 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country22 option').each(function(){
  var y2 = jQuery(this).attr('id');
  if (x2 === y2 || y2 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

var x3 = jQuery('#committee3').val();
jQuery('#country31 option').each(function(){
  var y3 = jQuery(this).attr('id');
  if (x3 === y3 || y3 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country32 option').each(function(){
  var y3 = jQuery(this).attr('id');
  if (x3 === y3 || y3 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country33 option').each(function(){
  var y3 = jQuery(this).attr('id');
  if (x3 === y3 || y3 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

var x4 = jQuery('#committee4').val();
jQuery('#country41 option').each(function(){
  var y4 = jQuery(this).attr('id');
  if (x4 === y4 || y4 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country42 option').each(function(){
  var y4 = jQuery(this).attr('id');
  if (x4 === y4 || y4 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country43 option').each(function(){
  var y4 = jQuery(this).attr('id');
  if (x4 === y4 || y4 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

var x5 = jQuery('#committee5').val();
jQuery('#country51 option').each(function(){
  var y5 = jQuery(this).attr('id');
  if (x5 === y5 || y5 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country52 option').each(function(){
  var y5 = jQuery(this).attr('id');
  if (x5 === y5 || y5 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country53 option').each(function(){
  var y5 = jQuery(this).attr('id');
  if (x5 === y5 || y5 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

var x6 = jQuery('#committee6').val();
jQuery('#country61 option').each(function(){
  var y6 = jQuery(this).attr('id');
  if (x6 === y6 || y6 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country62 option').each(function(){
  var y6 = jQuery(this).attr('id');
  if (x6 === y6 || y6 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#country63 option').each(function(){
  var y6 = jQuery(this).attr('id');
  if (x6 === y6 || y6 === 'all'){
    jQuery(this).show();
  }else{
    jQuery(this).hide();
  }
});

jQuery('#committee1').change(function(){
  var x1 = jQuery('#committee1').val();
  jQuery('#country11 option').each(function(){
    var y1 = jQuery(this).attr('id');
    if (x1 === y1 || y1 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country12 option').each(function(){
    var y1 = jQuery(this).attr('id');
    if (x1 === y1 || y1 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country13 option').each(function(){
    var y1 = jQuery(this).attr('id');
    if (x1 === y1 || y1 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  var x = jQuery('#committee1').val();
  jQuery('#committee2 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee' || y === jQuery('#committee3').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#committee3 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee'|| y === jQuery('#committee2').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#committee2').change(function(){
  var x2 = jQuery('#committee2').val();
  jQuery('#country21 option').each(function(){
    var y2 = jQuery(this).attr('id');
    if (x2 === y2 || y2 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country22 option').each(function(){
    var y2 = jQuery(this).attr('id');
    if (x2 === y2 || y2 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country23 option').each(function(){
    var y2 = jQuery(this).attr('id');
    if (x2 === y2 || y2 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  var x = jQuery('#committee2').val();
  jQuery('#committee1 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee' || y === jQuery('#committee3').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#committee3 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee'|| y === jQuery('#committee1').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });

});

jQuery('#committee3').change(function(){
  var x3 = jQuery('#committee3').val();
  jQuery('#country31 option').each(function(){
    var y3 = jQuery(this).attr('id');
    if (x3 === y3 || y3 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country32 option').each(function(){
    var y3 = jQuery(this).attr('id');
    if (x3 === y3 || y3 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country33 option').each(function(){
    var y3 = jQuery(this).attr('id');
    if (x3 === y3 || y3 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  var x = jQuery('#committee3').val();
  jQuery('#committee2 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee' || y === jQuery('#committee1').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#committee1 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee'|| y === jQuery('#committee2').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#committee4').change(function(){
  var x4 = jQuery('#committee4').val();
  jQuery('#country41 option').each(function(){
    var y4 = jQuery(this).attr('id');
    if (x4 === y4 || y4 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country42 option').each(function(){
    var y4 = jQuery(this).attr('id');
    if (x4 === y4 || y4 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country43 option').each(function(){
    var y4 = jQuery(this).attr('id');
    if (x4 === y4 || y4 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  var x = jQuery('#committee4').val();
  jQuery('#committee5 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee' || y === jQuery('#committee6').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#committee6 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee'|| y === jQuery('#committee5').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#committee5').change(function(){
  var x5 = jQuery('#committee5').val();
  jQuery('#country51 option').each(function(){
    var y5 = jQuery(this).attr('id');
    if (x5 === y5 || y5 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country52 option').each(function(){
    var y5 = jQuery(this).attr('id');
    if (x5 === y5 || y5 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country53 option').each(function(){
    var y5 = jQuery(this).attr('id');
    if (x5 === y5 || y5 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  var x = jQuery('#committee5').val();
  jQuery('#committee4 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee' || y === jQuery('#committee6').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#committee6 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee'|| y === jQuery('#committee4').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#committee6').change(function(){
  var x6 = jQuery('#committee6').val();
  jQuery('#country61 option').each(function(){
    var y6 = jQuery(this).attr('id');
    if (x6 === y6 || y6 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country62 option').each(function(){
    var y6 = jQuery(this).attr('id');
    if (x6 === y6 || y6 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  jQuery('#country63 option').each(function(){
    var y6 = jQuery(this).attr('id');
    if (x6 === y6 || y6 === 'all'){
      jQuery(this).show();
    }else{
      jQuery(this).hide();
    }
  });

  var x = jQuery('#committee6').val();
  jQuery('#committee5 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee' || y === jQuery('#committee4').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#committee4 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee'|| y === jQuery('#committee5').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

//Single Registration
jQuery('input#single-delegate-nationalityname').attr('disabled', 'disabled' );
jQuery('select#single-delegate-visa').attr('disabled', 'disabled' );
jQuery('select#single-delegate-acctype').attr('disabled', 'disabled' );
jQuery('input#single-delegate-leader').attr('disabled', 'disabled' );
jQuery('input#single-delegate-headcontact').attr('disabled', 'disabled' );

jQuery('select#single-delegate-nationality').change(function(){
  if (jQuery('select#single-delegate-nationality').val() === 'Indian'){
    jQuery('input#single-delegate-nationalityname').attr('disabled', 'disabled' );
    jQuery('select#single-delegate-visa').attr('disabled', 'disabled' );
    jQuery('input#single-delegate-nationalityname').val('');
    jQuery('select#single-delegate-visa').val('No');
  }else{
    jQuery('input#single-delegate-nationalityname').removeAttr('disabled');
    jQuery('select#single-delegate-visa').removeAttr('disabled');
  }
});

jQuery('select#single-delegate-accommodation').change(function(){
  if (jQuery('select#single-delegate-accommodation').val() === 'No'){
    jQuery('select#single-delegate-acctype').attr('disabled', 'disabled' );
    jQuery('select#single-delegate-acctype').val('Not Needed');
  }else{
    jQuery('select#single-delegate-acctype').removeAttr('disabled');
  }
});

jQuery('select#single-delegate-delegation').change(function(){
  if (jQuery('select#single-delegate-delegation').val() === 'No'){
    jQuery('input#single-delegate-leader').attr('disabled', 'disabled' );
    jQuery('input#single-delegate-headcontact').attr('disabled', 'disabled' );
    jQuery('input#single-delegate-leader').val('');
    jQuery('input#single-delegate-headcontact').val('');
  }else{
    jQuery('input#single-delegate-leader').removeAttr('disabled');
    jQuery('input#single-delegate-headcontact').removeAttr('disabled');
  }
});

//Double Delegation
jQuery('input#double-delegate-nationalityname1').attr('disabled', 'disabled' );
jQuery('select#double-delegate-visa1').attr('disabled', 'disabled' );
jQuery('select#double-delegate-acctype1').attr('disabled', 'disabled' );
jQuery('input#double-delegate-nationalityname2').attr('disabled', 'disabled' );
jQuery('select#double-delegate-visa2').attr('disabled', 'disabled' );
jQuery('select#double-delegate-acctype2').attr('disabled', 'disabled' );
jQuery('input#double-delegate-headname').attr('disabled', 'disabled' );
jQuery('input#double-delegate-phonehead').attr('disabled', 'disabled' );

jQuery('select#double-delegate-nationality1').change(function(){
  if (jQuery('select#double-delegate-nationality1').val() === 'Indian'){
    jQuery('input#double-delegate-nationalityname1').attr('disabled', 'disabled' );
    jQuery('select#double-delegate-visa1').attr('disabled', 'disabled' );
    jQuery('input#double-delegate-nationalityname1').val('');
    jQuery('select#double-delegate-visa1').val('No');
  }else{
    jQuery('input#double-delegate-nationalityname1').removeAttr('disabled');
    jQuery('select#double-delegate-visa1').removeAttr('disabled');
  }
});

jQuery('select#double-delegate-accommodation1').change(function(){
  if (jQuery('select#double-delegate-accommodation1').val() === 'No'){
    jQuery('select#double-delegate-acctype1').attr('disabled', 'disabled' );
    jQuery('select#double-delegate-acctype1').val('Not Needed');
  }else{
    jQuery('select#double-delegate-acctype1').removeAttr('disabled');
  }
});

jQuery('select#double-delegate-nationality2').change(function(){
  if (jQuery('select#double-delegate-nationality2').val() === 'Indian'){
    jQuery('input#double-delegate-nationalityname2').attr('disabled', 'disabled' );
    jQuery('select#double-delegate-visa2').attr('disabled', 'disabled' );
    jQuery('input#double-delegate-nationalityname2').val('');
    jQuery('select#double-delegate-visa2').val('No');
  }else{
    jQuery('input#double-delegate-nationalityname2').removeAttr('disabled');
    jQuery('select#double-delegate-visa2').removeAttr('disabled');
  }
});

jQuery('select#double-delegate-accommodation2').change(function(){
  if (jQuery('select#double-delegate-accommodation2').val() === 'No'){
    jQuery('select#double-delegate-acctype2').attr('disabled', 'disabled' );
    jQuery('select#double-delegate-acctype2').val('Not Needed');
  }else{
    jQuery('select#double-delegate-acctype2').removeAttr('disabled');
  }
});

jQuery('select#double-delegate-delegation').change(function(){
  if (jQuery('select#double-delegate-delegation').val() === 'No'){
    jQuery('input#double-delegate-headname').attr('disabled', 'disabled' );
    jQuery('input#double-delegate-phonehead').attr('disabled', 'disabled' );
    jQuery('input#double-delegate-headname').val('');
    jQuery('input#double-delegate-phonehead').val('');
  }else{
    jQuery('input#double-delegate-headname').removeAttr('disabled');
    jQuery('input#double-delegate-phonehead').removeAttr('disabled');
  }
});


//IP Registration
jQuery('input#ip-nationalityname').attr('disabled', 'disabled' );
jQuery('select#ip-visa').attr('disabled', 'disabled' );
jQuery('select#ip-acctype').attr('disabled', 'disabled' );

jQuery('select#ip-nationality').change(function(){
  if (jQuery('select#ip-nationality').val() === 'Indian'){
    jQuery('input#ip-nationalityname').attr('disabled', 'disabled' );
    jQuery('select#ip-visa').attr('disabled', 'disabled' );
    jQuery('input#ip-nationalityname').val('');
    jQuery('select#ip-visa').val('No');
  }else{
    jQuery('input#ip-nationalityname').removeAttr('disabled');
    jQuery('select#ip-visa').removeAttr('disabled');
  }
});

jQuery('select#ip-accommodation').change(function(){
  if (jQuery('select#ip-accommodation').val() === 'No'){
    jQuery('select#ip-acctype').attr('disabled', 'disabled' );
    jQuery('select#ip-acctype').val('Not Needed');
  }else{
    jQuery('select#ip-acctype').removeAttr('disabled');
  }
});

//Committees no duplicate for IP
jQuery('#committee7').change(function(){
  var x = jQuery('#committee7').val();
  jQuery('#committee8 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee' || y === jQuery('#committee9').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#committee9 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee'|| y === jQuery('#committee8').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#committee8').change(function(){
  var x = jQuery('#committee8').val();
  jQuery('#committee7 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee' || y === jQuery('#committee9').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#committee9 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee'|| y === jQuery('#committee7').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#committee9').change(function(){
  var x = jQuery('#committee9').val();
  jQuery('#committee8 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee' || y === jQuery('#committee7').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#committee7 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Choose a committee'|| y === jQuery('#committee8').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});


//Country No Duplicates
jQuery('#country11').change(function(){
  var x = jQuery('#country11').val();
  jQuery('#country12 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country13').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country13 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country12').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country12').change(function(){
  var x = jQuery('#country12').val();
  jQuery('#country11 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country13').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country13 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country11').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country13').change(function(){
  var x = jQuery('#country13').val();
  jQuery('#country12 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country11').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country11 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country12').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country21').change(function(){
  var x = jQuery('#country21').val();
  jQuery('#country22 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country23').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country23 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country22').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country22').change(function(){
  var x = jQuery('#country22').val();
  jQuery('#country21 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country23').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country23 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country21').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country23').change(function(){
  var x = jQuery('#country23').val();
  jQuery('#country22 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country21').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country21 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country22').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country31').change(function(){
  var x = jQuery('#country31').val();
  jQuery('#country32 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country33').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country33 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country32').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country32').change(function(){
  var x = jQuery('#country32').val();
  jQuery('#country31 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country33').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country33 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country31').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country33').change(function(){
  var x = jQuery('#country33').val();
  jQuery('#country32 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country31').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country31 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country32').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country41').change(function(){
  var x = jQuery('#country41').val();
  jQuery('#country42 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country43').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country43 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country42').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country42').change(function(){
  var x = jQuery('#country42').val();
  jQuery('#country41 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country43').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country43 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country41').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country43').change(function(){
  var x = jQuery('#country43').val();
  jQuery('#country42 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country41').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country41 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country42').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country51').change(function(){
  var x = jQuery('#country51').val();
  jQuery('#country52 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country53').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country53 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country52').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country52').change(function(){
  var x = jQuery('#country52').val();
  jQuery('#country51 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country53').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country53 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country51').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country53').change(function(){
  var x = jQuery('#country53').val();
  jQuery('#country52 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country51').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country51 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country52').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country61').change(function(){
  var x = jQuery('#country61').val();
  jQuery('#country62 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country63').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country63 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country62').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country62').change(function(){
  var x = jQuery('#country62').val();
  jQuery('#country61 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country63').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country63 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country61').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

jQuery('#country63').change(function(){
  var x = jQuery('#country63').val();
  jQuery('#country62 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country' || y === jQuery('#country61').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
  jQuery('#country61 option').each(function(){
    var y = jQuery(this).val();
    if (y === x || y === 'Select a Country'|| y === jQuery('#country62').val()){
      jQuery(this).attr('disabled', 'disabled' );
    }else{
      jQuery(this).removeAttr('disabled');
    }
  });
});

//Clear Post methods to resubmit on refresh
if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
}

//Header and Footer on Pages With Less Content
jQuery(window).load(function(){
  var height1 = jQuery(window).height();
  var height2 = jQuery(document).height();

  if (height1 === height2){
    jQuery('.footer-copyright').css({'position':'fixed', 'bottom':'0', 'width':'100%'});
  }
})

if(jQuery('select').val()=="Yes"){
  jQuery('input#single-delegate-leader').hide();
  jQuery('input#single-delegate-headcontact').hide();
  jQuery('input#single-delegate-headname').hide();
  jQuery('input#single-delegate-phonehead').hide();
}




var markers = new OpenLayers.Layer.Markers( "Markers" );
map.addLayer(markers);

var size = new OpenLayers.Size(21,25);
var offset = new OpenLayers.Pixel(-(size.w/2), -size.h);
var icon = new OpenLayers.Icon('http://www.openlayers.org/dev/img/marker.png', size, offset);
markers.addMarker(new OpenLayers.Marker(new OpenLayers.LonLat(0,0),icon));