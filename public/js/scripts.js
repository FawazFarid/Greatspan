function initializeJS() {

    //tool tips
    jQuery('.tooltips').tooltip();

    //popovers
    jQuery('.popovers').popover();

    //custom scrollbar
        //for html
    jQuery("html").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '6', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: '', zindex: '1000'});
        //for sidebar
    jQuery("#sidebar").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
        // for scroll panel
    jQuery(".scroll-panel").niceScroll({styler:"fb",cursorcolor:"#007AFF", cursorwidth: '3', cursorborderradius: '10px', background: '#F7F7F7', cursorborder: ''});
    
    //sidebar dropdown menu
    jQuery('#sidebar .sub-menu > a').click(function () {
        var last = jQuery('.sub-menu.open', jQuery('#sidebar'));        
        jQuery('.menu-arrow').removeClass('arrow_carrot-right');
        jQuery('.sub', last).slideUp(200);
        var sub = jQuery(this).next();
        if (sub.is(":visible")) {
            jQuery('.menu-arrow').addClass('arrow_carrot-right');            
            sub.slideUp(200);
        } else {
            jQuery('.menu-arrow').addClass('arrow_carrot-down');            
            sub.slideDown(200);
        }
        var o = (jQuery(this).offset());
        diff = 200 - o.top;
        if(diff>0)
            jQuery("#sidebar").scrollTo("-="+Math.abs(diff),500);
        else
            jQuery("#sidebar").scrollTo("+="+Math.abs(diff),500);
    });

    // sidebar menu toggle
    jQuery(function() {
        function responsiveView() {
            var wSize = jQuery(window).width();
            if (wSize <= 768) {
                jQuery('#container').addClass('sidebar-close');
                jQuery('#sidebar > ul').hide();
            }

            if (wSize > 768) {
                jQuery('#container').removeClass('sidebar-close');
                jQuery('#sidebar > ul').show();
            }
        }
        jQuery(window).on('load', responsiveView);
        jQuery(window).on('resize', responsiveView);
    });

    jQuery('.toggle-nav').click(function () {
        if (jQuery('#sidebar > ul').is(":visible") === true) {
            jQuery('#main-content').css({
                'margin-left': '0px'
            });
            jQuery('#sidebar').css({
                'margin-left': '-180px'
            });
            jQuery('#sidebar > ul').hide();
            jQuery("#container").addClass("sidebar-closed");
        } else {
            jQuery('#main-content').css({
                'margin-left': '180px'
            });
            jQuery('#sidebar > ul').show();
            jQuery('#sidebar').css({
                'margin-left': '0'
            });
            jQuery("#container").removeClass("sidebar-closed");
        }
    });
    
    
    //selectize
    jQuery("#vessel-select").selectize({
        valueField: 'imo',
        labelField: 'name',
        searchField: 'name',
        sortField: 'name',
        options: [],
        maxOptions: 200,
        create: function(input, callback){
            $('#vessel-create-modal').modal();
            
            $("#vessel-name").val(input);
            //console.log(input);
            callback();
        },
        
        render: {
            option: function(item, escape){
                return '<div>' +
    				'<span class="title">' +
    					'<span class="name">' + escape(item.name) + '</span>' +
    				'</span>' +
    			'</div>';
            }
        },
        
        load: function(query, callback){
            if(!query.length) return callback();
            $.ajax({
                url: root + '/vessels/vessels.json',
                type: 'GET',
                dataType: 'json',
                
                error: function(){
                  console.log('error'); 
                  callback();
                },
                
                success: function(data){
                  //console.log(data);
                  callback(data);
                },
            });
        }
    });
    
    //selectize
    jQuery("#driver-select").selectize({
        valueField: 'id',
        labelField: 'name',
        searchField: 'name',
        sortField: 'name',
        options: [],
        create: function(input, callback){
            $('#driver-create-modal').modal();
            
            $("#driver-name").val(input);
            //console.log(input);
            callback();
        },
        
        render: {
            option: function(item, escape){
                return '<div>' +
    				'<span class="title">' +
    					'<span class="name">' + escape(item.name) + '</span>' +
    				'</span>' +
    			'</div>';
            }
        },
        
        load: function(query, callback){
            if(!query.length) return callback();
            $.ajax({
                url: root + '/drivers/drivers.json',
                type: 'GET',
                dataType: 'json',
                
                error: function(){
                  console.log('error'); 
                  callback();
                },
                
                success: function(data){
                  //console.log(data);
                  callback(data);
                },
            });
        }
    });
    
    
        //selectize
    jQuery("#consignee-select").selectize({
        valueField: 'id',
        labelField: 'name',
        searchField: 'name',
        sortField: 'name',
        options: [],
        create: false,
        
        render: {
            option: function(item, escape){
                return '<div>' +
    				'<span class="title">' +
    					'<span class="name">' + escape(item.name) + '</span>' +
    				'</span>' +
    			'</div>';
            }
        },
        
        load: function(query, callback){
            if(!query.length) return callback();
            $.ajax({
                url: root + '/consignees/consignees.json',
                type: 'GET',
                dataType: 'json',
                
                error: function(){
                  console.log('error'); 
                  callback();
                },
                
                success: function(data){
                  //console.log(data);
                  callback(data);
                },
            });
        }
    });
    


}

//reset all form inputs
function clearForm(form) {
  // iterate over all of the inputs for the form
  // element that was passed in
  $(':input', form).each(function() {
    var type = this.type;
    var tag = this.tagName.toLowerCase(); // normalize case
    // it's ok to reset the value attr of text inputs,
    // password inputs, and textareas
    if (type == 'text' || type == 'password' || tag == 'textarea')
      this.value = "";
    // checkboxes and radios need to have their checked state cleared
    // but should *not* have their 'value' changed
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    // select elements need to have their 'selectedIndex' property set to -1
    // (this works for both single and multiple select elements)
    else if (tag == 'select')
      this.selectedIndex = -1;
  });
};

function initializeModals(){
    
    // Prepare reset.
    function resetModalFormErrors() {
        $('.form-group').removeClass('has-error');
        $('.form-group').find('.help-block').remove();
    }

    // Intercept submit.
    $('.modal-form').on('submit', function(submission) {
        submission.preventDefault();

        // Set vars.
        var form   = $(this),
            url    = form.attr('action'),
            submit = form.find('[type=submit]');

        // Check for file inputs.
        if (form.find('[type=file]').length) {

            // If found, prepare submission via FormData object.
            var input       = form.serializeArray(),
                data        = new FormData(),
                contentType = false;

            // Append input to FormData object.
            $.each(input, function(index, input) {
                data.append(input.name, input.value);
            });

            // Append files to FormData object.
            $.each(form.find('[type=file]'), function(index, input) {
                if (input.files.length == 1) {
                    data.append(input.name, input.files[0]);
                } else if (input.files.length > 1) {
                    data.append(input.name, input.files);
                }
            });
        }

        // If no file input found, do not use FormData object (better browser compatibility).
        else {
            var data        = form.serialize(),
                contentType = 'application/x-www-form-urlencoded; charset=UTF-8';
        }

        // Please wait.
        if (submit.is('button')) {
            var submitOriginal = submit.html();
            submit.html('Please wait...');
        } else if (submit.is('input')) {
            var submitOriginal = submit.val();
            submit.val('Please wait...');
        }

        // Request.
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: 'json',
            cache: false,
            contentType: contentType,
            processData: false

        // Response.
        }).always(function(response, status) {

            // Reset errors.
            resetModalFormErrors();

            // Check for errors.
            if (response.status == 422) {
                var errors = $.parseJSON(response.responseText);

                // Iterate through errors object.
                $.each(errors, function(field, message) {
                    console.error(field+': '+message);
                    var formGroup = $(form).find('[name='+field+']', form).closest('.form-group');
                    formGroup.addClass('has-error').append('<p class="help-block">'+message+'</p>');
                });

            // If successful, .
            } else {
                //clear form and close modal
                clearForm(form);
                jQuery('.modal').modal('hide');
                
            }
            
             // Reset submit.
            if (submit.is('button')) {
                submit.html(submitOriginal);
            } else if (submit.is('input')) {
                submit.val(submitOriginal);
            }
        });
    });
    
    //Vessel Create Modal
    jQuery("#vessel-create").on('click', function(){
        jQuery('#vessel-create-modal').modal();
        resetModalFormErrors();
    });
    
    //Driver Create Modal
    jQuery("#driver-create").on('click', function(){
        jQuery('#driver-create-modal').modal();
        resetModalFormErrors();
    });
    
}













jQuery(document).ready(function(){
    initializeJS();
    
    initializeModals();
    
    
    
});



