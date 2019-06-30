$(document).ready(
function()
	{

		$(".fa-address-book").click(
			function()
				{
					$(".fa-user").removeClass("i");
					$(".fa-key").removeClass("i");
					$(".fa-address-book").addClass("i");
					$(".form").load("form .register");
				}
			);

		$(".fa-user").click(
		function()
			{
				$(".fa-address-book").removeClass("i");
				$(".fa-key").removeClass("i");
				$(".fa-user").addClass("i");
				$(".form").load("form .login");
			}
		);

		$(".fa-key").click(
		function()
		{
			$(".fa-key").addClass("i");
			$(".fa-user").removeClass("i");
			$(".fa-address-book").removeClass("i");
			$(".form").load("form .forgot_password");
		}

		);
	}
);

