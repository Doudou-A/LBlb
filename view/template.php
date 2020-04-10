<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script type="text/javascript" src="public/js/style.js"></script>
		<link rel="stylesheet" href="public/css/bootstrap.css" />
		<link rel="stylesheet" href="public/css/mdb.css" />
		<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>

	<body>
		<?= $content ?>
	</body>
	<script type="text/javascript">
			var Administration = document.getElementById('Administration');
			var BlogsPosts = document.getElementById('BlogsPosts');
			var BlogsPostLinks = document.getElementById('BlogsPostsLinks');
			var Comments = document.getElementById('Comments');
			var CommentsLinks = document.getElementById('CommentsLinks');
			var Administrators = document.getElementById('Administrators');
			var AdministratorsLinks = document.getElementById('AdministratorsLinks');
			
			Administration.onclick = function(){
				if (BlogsPosts.style.display === "none"){
				BlogsPosts.style.display = "block";
				Comments.style.display = "block";
				Administrators.style.display = "block";
				} else {
				BlogsPosts.style.display = "none";
				Comments.style.display = "none";
				Administrators.style.display = "none";
				}
			}
			BlogsPosts.onclick = function(){
				if (BlogsPostsLinks.style.display === "none"){
				BlogsPostsLinks.style.display = "block";
				CommentsLinks.style.display = "none";
				AdministratorsLinks.style.display = "none";
				} else {
				BlogsPostsLinks.style.display = "none";
				}
			}
			Comments.onclick = function(){
				if (CommentsLinks.style.display === "none"){
				CommentsLinks.style.display = "block";
				BlogsPostsLinks.style.display = "none";
				AdministratorsLinks.style.display = "none";
				} else {
				CommentsLinks.style.display = "none";
				}
			}
			Administrators.onclick = function(){
				if (AdministratorsLinks.style.display === "none"){
				AdministratorsLinks.style.display = "block";
				BlogsPostsLinks.style.display = "none";
				CommentsLinks.style.display = "none";
				} else {
				AdministratorsLinks.style.display = "none";
				}
			}
		</script>
</html>