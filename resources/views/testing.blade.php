<html>
	<head>
		<title>Testing page (((Image Upload)))</title>
	    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.css">
	</head>
	<body>
		<h1>UPLOAD IMAGE TO  THE STORAGE PATH</h1>
		<form action="{{ route('testingUpload') }}" method="POST" enctype="multipart/form-data">

		@csrf

		<div class="row">



			<div class="col-md-6">

				<input type="file" name="image" class="form-control">

			</div>



			<div class="col-md-6">

				<button type="submit" class="btn btn-success">Upload</button>

			</div>



		</div>

		</form>

		<div align="center">
			<img src="{{ URL::asset('storage/webp/avatar/IMG_9274.webp') }}" alt="mafole" style="width: 200px;">
		</div>
	</body>
</html>