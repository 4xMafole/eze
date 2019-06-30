//lit button
$(".fa-tint").click(
	function()
	{

		$.ajaxSetup(
			{
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')	
				}
			}
		);

		var challengeId = $(this).data('challengeid');


		$.ajax(
			{
				type:'POST',
				url:'/profile/lit',
				data:{challenge_id:challengeId},
				success:function(data)
				{
					//checks if data is attached..
					if($.isEmptyObject(data.success.attached))
					{
						//no data excute this
						$("[data-challengeid=\"" + data.challengeId + "\"]").removeClass("lit-btn-active").addClass("lit-btn");
						$("[data-id=\"" + data.challengeId + "\"]").html(data.counter);
					}
					else
					{
						//has data excute this
						$("[data-challengeid=\"" + data.challengeId + "\"]").removeClass("lit-btn").addClass("lit-btn-active");
						$("[data-id=\"" + data.challengeId + "\"]").html(data.counter);
					}
					
				}
			}

		);
		
	}
);
	
