$(document).ready(
	function($)
	{

		$("#gallery").unitegallery(
		{
			tiles_type:"justified",
			tile_enable_icons:false,
		}
		);


		$("#search-bar").typeahead(
			{
				hint: true,
				highlight: true,
				minLength: 1
			}
		);

		// Set the Options for "Bloodhound" suggestion engine
		    var engine = new Bloodhound(
			    {
			        remote: 
			        {
			            url: '/explore/find?f=%QUERY%',
			            wildcard: '%QUERY%'
			        },

			        datumTokenizer: Bloodhound.tokenizers.whitespace('f'),
			        queryTokenizer: Bloodhound.tokenizers.whitespace
			    }
		    );

		    $("#search-bar").typeahead(
			    {
			        minLength: 1
			    }, 
			    {
			        source: engine.ttAdapter(),

			        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
			        name: 'users',
			        display: 'username',

			        // the key from the array we want to display (name,id,email,etc...)
			        templates: 
			        {
			            empty: 
			            [
			                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
			            ],

			            header: 
			            [
			                '<div class="list-group search-results-dropdown">'
			            ],

			            suggestion: function (data) 
			            {
			            	$.each(data, 
			            		function()
			            		{
					            	$(".search-rslts").load("/explore/" + data.id + " #pro-avatar");
			            		}
		            		);

			                return '<a href=\"/explore/' + data.id +'\" class="list-group-item link" > @' + data.username + '</a>'
			      	}
			        }
			    }
		    );

	}
);