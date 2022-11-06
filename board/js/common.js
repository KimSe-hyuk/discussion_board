$(document).ready(function(){
	$(".dat_edit_bt").click(function(){
			var obj = $(this).closest(".dap_lo").find(".dat_edit");
			obj.dialog({
				modal:true,
				width:650,
				height:200,
				title:"댓글 수정"});
		});

	$(".dat_delete_bt").click(function(){
		var obj = $(this).closest(".dap_lo").find(".dat_delete");
		obj.dialog({
			modal:true,
			width:400,
			title:"댓글 삭제확인"});
		});
	
			 var yes = $('.yes1');
			 var no = $('.no1');
			 var mid = $('.mid1');

			  yes.click(function(){		 
					yes.css('backgroundColor','#5858FA');		
					no.css('backgroundColor','#F5A9A9');
					mid.css('backgroundColor','#E6E6E6');
			  });
			  no.click(function(){				
				yes.css('backgroundColor','#A9BCF5');		
					no.css('backgroundColor','#FA5858');
					mid.css('backgroundColor','#E6E6E6');
			  });
				 mid.click(function(){				
				yes.css('backgroundColor','#A9BCF5');		
					no.css('backgroundColor','#F5A9A9');
					mid.css('backgroundColor','#6E6E6E');
			  });
				
		});
		


	
	