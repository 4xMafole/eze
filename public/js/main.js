$(document).ready(
	function()
	{
		$(".page-placeholder").css({'display' : 'none'});
		$(".page").css({'display' : ''});

		var post = $(".post");
        var blazy = new Blazy({
        	container: '.filter',
		    success: function(ele){
		        // Image has loaded
		        // Do your business here
		        console.log('img loaded');
		    },
		    error: function(ele, msg){
		        console.log('b-lazy error:' + msg);
		        console.log(ele);
		        if(msg === 'missing'){
		            // Data-src is missing

		        }
		        else if(msg === 'invalid'){
		            // Data-src is invalid
		        }
		    }        	
        });
        post.on('afterChange', blazy.revalidate);
	}
);
NProgress.start();
NProgress.done();