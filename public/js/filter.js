$(document).ready(
	function()
	{
 
		//post uploader
		$(".fa-box-open").click(
			function()
			{
				$("#postInput").click();
				$("#button").click();
			}
		);

		//challenge uploader
		$(".fa-bolt").click(
			function ()
			{
				$("#challenge-uploader").click();
			}
		);

	}
);