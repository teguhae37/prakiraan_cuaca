<html>
<head>
	<title>Fan Animation</title>
	<style type="text/css">
		body {
			background: white;
			color: #black;
		}
		.mt-scene-label {
			width: 100px;
			height: 100px;
			display: block;
			margin: 10px;
			padding: 0px;
		}
		img {
			width: 80px;
			height: 80px;
		}
		.mt-imagerotationeffect img {
			-webkit-transition-duration: 1s;
			-moz-transition-duration: 1s;
			-o-transition-duration: 1s;
			transition-duration: 1s;
			-webkit-transition-property: -webkit-transform;
			-moz-transition-property: -moz-transform;
			-o-transition-property: -o-transform;
			transition-property: transform;
			overflow: auto;
		}
		.mt-imagerotationeffect  img {
			animation: imagerotation 1s linear normal;
			-moz-animation: imagerotation 1s linear infinite;
                        /*ubah ini saja*/
			-webkit-animation: imagerotation 1s linear infinite;
		}
		@-moz-keyframes imagerotation {
			0% {
				-webkit-transform:rotate(0deg);
				-moz-transform:rotate(0deg);
				-o-transform:rotate(0deg);
				transform:rotate(0deg)
			}
			100% {
				-webkit-transform:rotate(360deg);
				-moz-transform:rotate(360deg);
				-o-transform:rotate(360deg);
				transform:rotate(360deg)
			}
		}
		@-webkit-keyframes imagerotation {
			0% {
				-webkit-transform:rotate(0deg);
				-moz-transform:rotate(0deg);
				-o-transform:rotate(0deg);
				transform:rotate(0deg)
			}
			100% {
				-webkit-transform:rotate(360deg);
				-moz-transform:rotate(360deg);
				-o-transform:rotate(360deg);
				transform:rotate(360deg)
			}
		}
	</style>
</head>
<body>
	<div class="mt-scene-label mt-height1 mt-imagerotationeffect">&nbsp;
            <img src="fan.png" alt="" />&nbsp;</div>
</body>
</html>
