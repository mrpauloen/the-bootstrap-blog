/*
 *
 * The Bootstrap Blog Auto Height Textarea
 *
 * Auto expand a textarea while typing using jQuery
 *
 *
 * @since 0.1
 **/

jQuery.noConflict();

jQuery( document ).ready( function( $ ){

	$('#comment').each(function () {
	  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
	}).on('input', function () {
	  this.style.height = 'auto';
	  this.style.height = (this.scrollHeight) + 'px';
	});

	$('#comment').trigger('input');

	$('#comment').focus(function(){
		 $('#form-input').collapse('show');
	});

	$('[data-toggle="tooltip"]').tooltip();

});
