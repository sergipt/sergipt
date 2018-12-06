$(document).ready(function() {	

	var form = $('form.searchandfilter');
	
	if(typeof form === 'undefined') return;
	
	if(form.data('auto-update') == 1) return;

    form.parent().on('click', function (evt){ // bind click outside form in order to work with ajax

    	// the clicked form item
    	var _item = $(evt.target).closest('li');
    	
    	// styling stuff
    	if(_item.hasClass('sf-level-0')){
			_item.toggleClass('sf-option-active');
		}

		// check/uncheck item and all children as well
		// chose checkbox as form field options in plugin ui.
		var _checked = _item.find('.sf-input-checkbox').prop('checked') == true ? false : true;
		_item.find('.sf-input-checkbox').prop('checked', _checked);

		form.submit();

    	evt.stopPropagation();
		evt.preventDefault();
    });
});
