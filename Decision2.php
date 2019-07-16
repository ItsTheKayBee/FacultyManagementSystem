<?php

	$myData = json_decode( base64_decode( $_GET['parameter'] ) );
	$val = $myData->val;
	$id = $myData->id;

		$courses = $proj_guided = $pub_books = $pub_journ = $pub_conf = $sttp_att = $sttp_org = $sttp_del = $cocurr = $extra = 0;

		if($val==1)
		{
			echo "<style> #section3{ display:block; visibility:vissible; } </style>";
		}
		else
		{
			echo "<style> #section3{ display:none; visibility:hidden; } </style>";
		}

		if($val==2)
		{
			echo "<style> #section4{ display:block; visibility:vissible; } </style>";
		}
		else
		{
			echo "<style> #section4{ display:none; visibility:hidden; } </style>";
		}

		if($val==3)
		{
			echo "<style> #section41{ display:block; visibility:vissible; } </style>";
		}
		else
		{
			echo "<style> #section41{ display:none; visibility:hidden; } </style>";
		}

		if($val==4)
		{
			echo "<style> #section42{ display:block; visibility:vissible; } </style>";
		}
		else
		{
			echo "<style> #section42{ display:none; visibility:hidden; } </style>";
		}

		if($val==5)
		{
			echo "<style> #section43{ display:block; visibility:vissible; } </style>";
		}
		else
		{
			echo "<style> #section43{ display:none; visibility:hidden; } </style>";
		}

		if($val==6)
		{
			echo "<style> #section51{ display:block; visibility:vissible; } </style>";
		}
		else
		{
			echo "<style> #section51{ display:none; visibility:hidden; } </style>";
		}

		if($val==7)
		{
			echo "<style> #section52{ display:block; visibility:vissible; } </style>";
		}
		else
		{
			echo "<style> #section52{ display:none; visibility:hidden; } </style>";
		}

		if($val==8)
		{
			echo "<style> #section53{ display:block; visibility:vissible; } </style>";
		}
		else
		{
			echo "<style> #section53{ display:none; visibility:hidden; } </style>";
		}

		if($val==9)
		{
			echo "<style> #section6{ display:block; visibility:vissible; } </style>";
		}
		else
		{
			echo "<style> #section6{ display:none; visibility:hidden; } </style>";
		}

		if($val==10)
		{
			echo "<style> #section7{ display:block; visibility:vissible; } </style>";
		}
		else
		{
			echo "<style> #section7{ display:none; visibility:hidden; } </style>";
		}

?>
