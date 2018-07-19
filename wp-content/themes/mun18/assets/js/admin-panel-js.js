var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

jQuery(document).ready(function(){
	jQuery('#admin-registration-form-field-type').change(function(){

		var selected = jQuery(this).val();
		
		jQuery('.admin-registration-form-select-other-details-default').show();
		
		if (selected==='Email' || selected==='Number' || selected==='Text' || selected === 'Password'){
			jQuery('.admin-registration-form-select-other-details-checkbox-radio-select').hide();
			jQuery('.admin-registration-form-select-other-details-text').show();
			jQuery('.admin-registration-form-select-other-details-textarea').hide();
		}else if (selected === 'Textarea'){
			jQuery('.admin-registration-form-select-other-details-checkbox-radio-select').hide();
			jQuery('.admin-registration-form-select-other-details-text').show();
			jQuery('.admin-registration-form-select-other-details-textarea').show();
		}else if (selected === 'Checkbox' || selected === 'Radio' || selected === 'Select'){
			jQuery('.admin-registration-form-select-other-details-checkbox-radio-select').show();
			jQuery('.admin-registration-form-select-other-details-text').hide();
			jQuery('.admin-registration-form-select-other-details-textarea').hide();
		}
	})
});