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

	$('textarea').each(function () {
	  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
	}).on('input', function () {
	  this.style.height = 'auto';
	  this.style.height = (this.scrollHeight) + 'px';
	});

	$('textarea').trigger('input');

	$('#commenttext').focus(function(){
		 $('#form-input').collapse();
	});

	$('[data-toggle="tooltip"]').tooltip();

});
