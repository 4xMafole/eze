$(document).ready(
	function() 
	{ 

		//gallery controller
		$("#gallery").unitegallery(
		{
			gallery_theme:"tiles",
			tiles_type:"justified",
			tile_enable_icons:false,
			tile_as_link:true,
		}
		);

		//challenges auto-load

		//avatarUpdate
		$(".fa-plus-square").click(
			function ()
			{
				$("#avatarInput").click();
				
				$("#avatarInput").on("change",
					function ()
					{
						$("#button").click();
					}
				);
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

		//password changer
		$("#changeps").click(
			function()
			{

				$.ajaxSetup(
					{
						headers: {
							'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
						}
					}
				);

				var crnt_psd = document.getElementById('current-password').value; 
				var nw_psd = document.getElementById("new-password").value;
				var	cfm_psd = document.getElementById("new-password-confirm").value;



				$.ajax(
					{
						type:'POST',
						url:'/profile/changepd',
						data: {current_password:crnt_psd,new_password:nw_psd,new_password_confirmation:cfm_psd},
						success: function(data)
						{

							if (data.all_error)
							{
								$("#notifier").html(data.all_error);
							}


							if (data.c_error) 
							{
								$("#notifier").html(data.c_error);
							}

							if (data.n_error)
							{
								$("#notifier").html(data.n_error);
							}

							if (data.success)
							{
								$("#notifier").html(data.success);
							}

						}
					}
				);
			}
		);

	}
);
