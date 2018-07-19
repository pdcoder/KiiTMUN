jQuery(document).ready(function(){
	var sortlist = jQuery('ul#custom-type-list');
	var pageTitle = jQuery('div h2');

	sortlist.sortable({

		update: function(event, ui){

			jQuery.ajax({
				url: ajaxurl,
				type: 'POST',
				dataType: 'json',
				data: {
					action: 'save_post',
					order: sortlist.sortable('toArray'),
					security: WP_REGISTRATIONS_FIELD_LISTING.security
				},
				success: function(response){
					if (true == response.success){
						pageTitle.after('<div class="updated"><p>'+WP_REGISTRATIONS_FIELD_LISTING.success+'</p></div>');
					}else{
						pageTitle.after('<div class="updated"><p>'+WP_REGISTRATIONS_FIELD_LISTING.failure+'</p></div>');
					}
				},
				error: function(error){
					pageTitle.after('<div class="error"><p>'+WP_REGISTRATIONS_FIELD_LISTING.failure+'</p></div>');
				}
			});
		}
	});
})