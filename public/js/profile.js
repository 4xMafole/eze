$(document).ready(
	function() 
	{ 

		//gallery controller
		$("#gallery").unitegallery(
		{
			tiles_type:"justified",
			tile_enable_icons:false,
		}
		);

		//challenges auto-load

		//avatarUpdate
		$(".fa-plus-square").click(
			function ()
			{
				$("#avatarInput").click();
				$("#button").click();
			}
		);

		// edits
		$(".edit-ctrl").click(
			function ()
			{
				$(".edits").toggle();
			}
		);

			// { popup modal }
		
		$(".fa-grip-vertical").click(
			function()
			{

				//loads user challenges 
				$("#challenges").load("/profile/challenges");

				//load searched user's challenges
				var userid = $(".profile").data('userid');

				$("#challenge").load("/explore/"+ userid +"/challenges");

			}
		);

		$(".fa-camera").click(
			function()
			{
				$(".fa-grip-vertical").removeClass("nav-selector-active");
				$(".fa-camera").addClass("nav-selector-active");				
			}
		);

			//end of popup modal

		//Following button
		$(".follow-btn").click(
			function()
			{
				$.ajaxSetup(
					{
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
						}
					}
				);

				var id = $(".profile").data('userid');

				$.ajax(
					{
						type:'POST',
						url:'/profile/follow',
						data:{user_id:id},
						success:function(data)
						{
								//checks if no id attached..
								if($.isEmptyObject(data.success.attached))
								{
									//no id excute this
									$(".following").removeClass("following").addClass("follow");
									$(".follow").html("Follow");
									$("#followers").html(data.counter);
								}
								else
								{
									//has id excute this
									//changes from follow to following
									$(".follow").removeClass("follow").addClass("following");
									$(".following").html("Following");
									$("#followers").html(data.counter);
																	
								}


						}
					}
				);
			}
		);

		//setting
		$(".fa-cog").click(
			function()
			{
				$(".list").fadeIn(200);
				$(".list").hover(
					function()
					{},
					function()
					{
						$(this).fadeOut(200);
					}
				);
			}
		);

	}
);
