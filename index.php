<?php
	if (isset($_POST['search'])) {
		$response = "<ul><li>No data found!</li></ul>";

		$connection = new mysqli('localhost', 'root', '', 'hackathon');
		$q = $connection->real_escape_string($_POST['q']);

		$sql = $connection->query("SELECT mname FROM medicine WHERE mname LIKE '%$q%'");
		if ($sql->num_rows > 0) {
			$response = "<ul>";

			while ($data = $sql->fetch_array())
				$response .= "<li>".$data['mname']."</li>";

			$response .= "</ul>";
		}
		//$sql = $connection->query("SELECT gname FROM genmedicine WHERE gname LIKE '%$q%'");
		/*if($sql->num_rows > 0){
			$response = "<ul>";

			while ($data = $sql->fetch_array())
				$response .= "<li>".$data['gname']."</li>";

			$response .= "</ul>";

		}*/


		exit($response);
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Pharmacare</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style type="text/css">
            ul {
                float: left;
                list-style: none;
                padding: 0px;
                border: 1px solid black;
                margin-top: 0px;
            }

            input, ul {
                width: 250px;
            }

            li:hover {
                color: silver;
                background: #0088cc;
            }
        </style>
</head>
<body>
	<div id="logotext">
		<img src="">
		<p>Pharmacare</p>
	</div>
	<div id="mainheader">
		<ul>
			<li><a href="index.php">Home</a></li>
		</ul>
	</div>
		<input type="text" placeholder="Search Medicines..." id="searchBox">
        <div id="response"></div>
        <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#searchBox").keyup(function () {
                    var query = $("#searchBox").val();

                    if (query.length > 0) {
                        $.ajax(
                            {
                                url: 'index.php',
                                method: 'POST',
                                data: {
                                    search: 1,
                                    q: query
                                },
                                success: function (data) {
                                    $("#response").html(data);
                                },
                                dataType: 'text'
                            }
                        );
                    }
                });

                $(document).on('click', 'li', function () {
                    var country = $(this).text();
                    $("#searchBox").val(country);
                    $("#response").html("");
                });
            });
        </script>
	<div id="login">
		<li><a href="login.php">Login</a></li>
	</div>
</body>
</html>