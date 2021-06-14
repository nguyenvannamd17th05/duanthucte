$(function(){

$('.checkbox_parent').on('click',function(){
	$(this).parents('.card').find('.checkbox_child').prop('checked',$(this).prop('checked'));
});
$('.checkall').on('click',function(){
	$(this).parents().find('.checkbox_child').prop('checked',$(this).prop('checked'));
	$(this).parents().find('.checkbox_parent').prop('checked',$(this).prop('checked'));
});
});
