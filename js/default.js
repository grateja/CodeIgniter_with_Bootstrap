$(document).ready(function(){

	$(':radio').on('change',function(){
		$this = $(this);
		if($this.val()){
			$this.parent().siblings().css({
				'color':'',
				'border':'',
				'font-weight':''
			});
			$this.parent().css({
				'color':'blue',
				'border':'2px solid blue',
				'font-weight':'bold'
			});
		}
	});

	$('a.ajax').on('click',function(e){
		e.preventDefault();
		console.log("ajax call " + $(this).attr('href'));
	});
});