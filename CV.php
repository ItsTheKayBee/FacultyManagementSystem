<?php include 'CV_Php.php' ?>
<!DOCTYPE html>
<html>
<head>
    <base href="https://demos.telerik.com/kendo-ui/pdf-export/page-layout">
    <title><?php echo $name; ?>_CV</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.common-material.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.2.621/styles/kendo.material.mobile.min.css"/>
    <script src="libraries/jquery.min.js"></script>
    <script src="libraries/http_ajax.googleapis.com_ajax_libs_jquery_3.3.1_jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp, small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li, fieldset, fom, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, figcaption, figure, footer, header, hgroup, menu, nav, section, summary, time, mark, audio, video {
            border: 0;
            font: inherit;
            margin: 0;
            padding: 0;
            vertical-align: baseline;
        }

        article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {
            display: block;
        }

        html, body {
            background: grey;
            font-family: 'Lato', helvetica, arial, sans-serif;
            color: #222;
        }

        .clear {
            clear: both;
        }

        p {
            font-size: 1em;
            line-height: 1.4em;
            margin-bottom: 20px;
            color: #1F54AB;
        }

        #cv {
            width: 90%;
            max-width: 1000px;
            background: #ffffff;
            margin: 30px auto;
        }

        .mainDetails {
            padding: 25px 35px;
            border-bottom: 2px solid #1F54AB;
            background: #ffffff;
        }

        #name h1 {
            font-size: 2.5em;
            font-weight: 700;
            font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
            margin-bottom: -6px;
        }

        #name h2 {
            font-size: 2em;
            margin-left: 2px;
            font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
        }

        #mainArea {
            padding: 0 40px;
        }

        #name {
            float: left;
        }

        #contactDetails {
            float: right;
        }

        #contactDetails ul {
            list-style-type: none;
            font-size: 0.9em;
            margin-top: 2px;
        }

        #contactDetails ul li {
            margin-bottom: 3px;
            color: #444;
        }

        #contactDetails ul li a, a[href^=tel] {
            color: #444;
            text-decoration: none;
            -webkit-transition: all .3s ease-in;
            -moz-transition: all .3s ease-in;
            -o-transition: all .3s ease-in;
            -ms-transition: all .3s ease-in;
            transition: all .3s ease-in;
        }

        #contactDetails ul li a:hover {
            color: #cf8a05;
        }

        section {
            border-top: 1px solid #dedede;
            padding: 20px 0 0;
        }

        #noborder {
            border: none;
        }

        section:first-child {
            border-top: 0;
        }

        section:last-child {
            padding: 20px 0 10px;
        }

        .sectionContent {
            float: right;
            width: 72.5%;
        }

        .sectionTitle h1 {
            font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
            font-style: italic;
            font-size: 1.5em;
            color: #cf8a05;
        }

        .sectionContent h2 {
            font-family: 'Rokkitt', Helvetica, Arial, sans-serif;
            font-size: 1.5em;
            margin-bottom: -2px;
        }

        .keySkills ul li {
            margin-bottom: 3px;
        }

        #pdfbtn {
            outline: 0;
            background-color: #1F54AB;
            color: white;
        }

        #back {
            outline: 0;
            color: white;

        }

        button {
            width: 180px;
        }

        a {
            position: fixed;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 15px;">
    <button id="back" class="btn btn-warning btn-lg" onclick="gotoProfile()">Close</button>
    <button id="pdfbtn" class="btn btn-lg btn-info" onclick="ExportPdf()" style="float: right;margin-left:20px;">Export
        to PDF
    </button>
    <button id="docbtn" class="btn btn-lg btn-success" onclick="exportDoc()" style="float: right">Export to DOC</button>
</div>
<!-- MAIN CV CONTENT -->
<div id="cv">
    <div class="mainDetails">
        <div id="name">
            <h1 id="name"><?php echo $name; ?></h1>
            <br><br><br>
			<?php if (!empty($join_pos)) {
				echo "Current Position : " . $join_pos;
			} ?>
        </div>

        <div id="contactDetails">
            <ul>
                <li><?php echo $email; ?></a></li>
                <li><?php if (!empty($contact)) {
						echo "Mob: " . $contact;
					} ?></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
	<?php $nodata = 1; ?>
    <div id="mainArea">
		<?php
		if(!empty($sscInstitute) || !empty($hscInstitute) || !empty($bachelorsInstitute) || !empty($mastersInstitute) || !empty($phdInstitute)) {
			echo '<section id="noborder">
            <b>ACADEMIC DETAILS</b>
            </section>
            <section>
            <div class="sectionContent">
                <table class="table-hover table">
                    <thead>
                    <tr>
                        <th>Qualifications</th>
                        <th>Institute</th>
                        <th>Year</th>
                    </tr>
                    </thead>
                    <tbody>';
			if (!empty($sscInstitute))
				echo "<tr><td>SSC</td><td>$sscInstitute</td><td>$sscYear</td></tr>";

			if (!empty($hscInstitute))
				echo "<tr><td>HSC</td><td>$hscInstitute</td><td>$hscYear</td></tr>";

			if (!empty($bachelorsInstitute))
				echo "<tr><td>Bachelors</td><td>$bachelorsInstitute</td><td>$bachelorsYear</td></tr>";

			if (!empty($mastersInstitute))
				echo "<tr><td>Masters</td><td>$mastersInstitute</td><td>$mastersYear</td></tr>";

			if (!empty($phdInstitute))
				echo "<tr><td>PHD</td><td>$phdInstitute</td><td>$phdYear</td></tr>";
			echo '</tbody>
                </table>
            </div>
            <div class="clear"></div>
        </section>';
			$nodata=0;
		}
		?>
		<?php
		if($nocourse>0){
			echo ' <section id ="noborder">
            <b>COURSES TAUGHT</b>
        </section>
        <section>
            <div class="sectionContent">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Semester</th>
                    </tr>
                    </thead>
                    <tbody>';
			for($i=0; $i<$nocourse; $i++)
			{
				echo "<tr>";
				echo "<td>$coursecategory[$i]</td><td>$courseid[$i]</td><td>$courseyear[$i]</td><td>$coursesem[$i]</td>";
				echo "</tr>";
			}

			echo '</tbody>
        </table>
    </div>
    <div class="clear"></div>
    </section>';
			$nodata=0;
		}
		?>
		<?php
		$sql="SELECT * FROM projects WHERE Emp12_Id=$empid";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result) > 0)
		{
			echo '<section id ="noborder">
            <h1>PROJECTS GUIDED</h1>
        </section>
        <section>
            <div class="sectionContent">';
			$h = 0;
			while($row=mysqli_fetch_assoc($result))
			{
				if($row["Type"] != "")
					echo ($h+1).'. '.$row["Type"].' on "'.$row["Title"].'", ';
				else
					echo ($h+1).'. "'.$row["Title"].'", ';
				echo $row["Year"].".";
				$h++;
				echo "<br><br>";
			}
			echo '</div>
            <div class="clear"></div>
            <br>
        </section>';
			$nodata=0;
		}
		?>
		<?php $pubecho=0;?>
		<?php
		$sql="SELECT * FROM publication_books WHERE Emp1_Id=$empid";
		$result=$conn->query($sql);
		$nobooks = mysqli_num_rows($result);
		if($nobooks > 0)
		{
			if($pubecho!=1) {
				echo ' <section id ="noborder">
            <h1>PUBLICATIONS</h1>
            <div class="clear"></div>
        </section>';
				$pubecho=1;
			}
			echo ' <section>
            <h2>Books</h2>
            <div class="sectionContent">';
			$i = 0;
			while($row=mysqli_fetch_assoc($result))
			{
				echo ($i+1).". &nbsp &nbsp $name".", ";
				if( ($row["COA1"] != "") && ($row["COA2"] != "") && ($row["COA3"] != "") )
				{
					if($row["COA1"] != "")
						echo $row["COA1"].", ";
					if($row["COA2"] != "")
						echo $row["COA2"].", ";
					if($row["COA3"] != "")
						echo $row["COA3"].", ";
				}
				echo '"'.$row["Book_Name"].'"';
				echo " (ISBN ".$row["ISBN"]."), ";
				if($row["Edition"] != "")
					echo ", Edition : ".$row["Edition"].", ";

				echo dateformatChanger($row["Date_Published"]).".";
				$i++;
				echo "<br><br>";
			}
			echo '</div>
            <div class="clear"></div>
            <br>
        </section>';
			$nodata=0;
		}
		?>
		<?php
		$sql="SELECT * FROM publication_journals WHERE Emp4_Id=$empid";
		$result=$conn->query($sql);
		$nojour = mysqli_num_rows($result);
		if($nojour > 0)
		{
			if($pubecho!=1) {
				echo ' <section id ="noborder">
            <h1>PUBLICATIONS</h1>
            <div class="clear"></div>
        </section>';
				$pubecho=1;
			}
			echo '<section>
            <h2>Journals</h2>
            <div class="sectionContent">';
			$k = 0;
			while($row=mysqli_fetch_assoc($result))
			{
				$c = $row["count"];
				echo ($k+1).". &nbsp &nbsp";
				echo $name.", ";
				if($c != 0)
				{
					for($j=1 ;$j<=$c; $j++)
						echo $row["COA_".$j].", ";
				}
				echo '"'.$row["Title"].'", ';
				echo "( ISSN : ".$row["ISSN"].", ";
				echo $row["Type"];
				if($row["Peer_Reviewed"] == "YES")
					echo ", Certified Journal ), ";
				else
					echo " ), ";
				echo "Volume : ".$row["Volume"].", ";
				echo "Issue : ".$row["Issue"].", ";
				echo dateformatChanger($row["Date"]).".";

				$k++;
				echo "<br><br>";
			}
			echo ' </div>
            <div class="clear"></div>
            <br>
        </section>';
			$nodata=0;
		}
		?>
		<?php
		$sql="SELECT * FROM publication_conferences WHERE Emp5_Id=$empid";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result) > 0)
		{
			if($pubecho!=1) {
				echo ' <section id ="noborder">
            <h1>PUBLICATIONS</h1>
            <div class="clear"></div>
        </section>';
				$pubecho=1;
			}
			echo '<section>
            <h2>Conferences</h2>
            <div class="sectionContent">';
			$l = 0;
			while($row=mysqli_fetch_assoc($result))
			{
				$c = $row["count"];
				echo ($l+1).". &nbsp &nbsp $name".", ";
				if($c != 0)
				{
					for($j=1 ;$j<=$c; $j++)
						echo $row["COA".$j].", ";
				}
				echo '"'.$row["Name"].'", ';
				echo "( ISSN : ".$row["ISSN"].", ";
				echo $row["Type"]." ), ";
				echo dateformatChanger($row["Date"]);
				if($row["Organizer"] != "")
					echo ", Organised By : ".$row["Organizer"].".";
				else
					echo ".";
				$l++;
				echo "<br><br>";
			}
			echo '</div>
            <div class="clear"></div>
            <br>
        </section>';
			$nodata=0;
		}
		?>
		<?php $sttpecho=0;?>
		<?php
		$sql="SELECT * FROM sttp_event_attended WHERE Emp6_Id=$empid";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result) > 0)
		{
			if($sttpecho!=1){
				echo ' <section id ="noborder">
            <h1>Short Term Training Programs (STTP)</h1>
        </section>';
				$sttpecho=1;
			}
			echo '<section>
            <h2>Attended</h2>
            <div class="sectionContent">';
			$m = 0;
			while($row=mysqli_fetch_assoc($result))
			{
				echo ($m+1).'. '.$row["Event_Type"].' on "'.$row["Title"].'"';
				if($row['Place']!='')
					echo "at ".$row["Place"].", ";
				else echo ', ';
				if($row["Organized_By"] != "")
					echo "organised by : ".$row["Organized_By"].", ";
				echo "From : ".dateformatChanger($row["Date_From"]).", To : ".dateformatChanger($row["Date_To"]).".";
				$m++;
				echo "<br><br>";
			}
			echo ' </div>
            <div class="clear"></div>
        </section>';
			$nodata=0;
		}
		?>
		<?php
		$sql="SELECT * FROM sttp_event_organized WHERE Emp7_Id=$empid";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result) > 0)
		{
			if($sttpecho!=1){
				echo ' <section id ="noborder">
            <h1>Short Term Training Programs (STTP)</h1>
        </section>';
				$sttpecho=1;
			}
			echo '<section>
            <h2>Organised</h2>
            <div class="sectionContent">';
			$n = 0;
			while($row=mysqli_fetch_assoc($result))
			{
				echo ($n+1).'. '.$row["Type"].' on "'.$row["Name"].'"';
				if($row['Place']!='')
					echo "at ".$row["Place"].", ";
				if(!empty($row['Role']))
					echo "as ".$row["Role"].", ";
				if($row['Place']=='' && empty($row['Role']))
					echo ', ';
				echo "From : ".dateformatChanger($row["Date_From"]).", To : ".dateformatChanger($row["Date_To"]).".";
				$n++;
				echo "<br><br>";
			}
			echo '</div>
            <div class="clear"></div>
        </section>';
			$nodata=0;
		}
		?>
		<?php
		$sql="SELECT * FROM sttp_event_delivered WHERE Emp9_Id=$empid";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result) > 0)
		{
			if($sttpecho!=1){
				echo ' <section id ="noborder">
            <h1>Short Term Training Programs (STTP)</h1>
        </section>';
				$sttpecho=1;
			}
			echo '<section>
            <h2>Delivered</h2>
            <div class="sectionContent">';
			$o = 0;
			while($row=mysqli_fetch_assoc($result))
			{
				echo ($o+1).'.  &nbsp'.$row["Event_Type"].' on "'.$row["Name"].'"';
				if($row['Place']!='')
					echo "at ".$row["Place"].", ";
				else
					echo ', ';
				echo "From : ".dateformatChanger($row["Date_From"]).", To : ".dateformatChanger($row["Date_To"]).".";
				$o++;
				echo "<br><br>";
			}
			echo ' </div>
            <div class="clear"></div>
        </section>';
			$nodata=0;
		}
		?>
		<?php
		$sql="SELECT * FROM co_curricular WHERE Emp10_Id=$empid";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result) > 0)
		{
			echo "<section id =\"noborder\">
            <h1>Co-Curricular Activities</h1>
        </section>
        <section>
            <div class=\"sectionContent\">";
			$p = 0;
			while($row=mysqli_fetch_assoc($result))
			{
				echo ($p+1).'. "'.$row["Name"].'"';
				if($row["Type"] == "KJ Somaiya(InHouse)")
					echo " at KJSCE, ";
				else
					echo " at ".$row["Type"].", ";
				if($row["Role"] != "")
					echo "as ".$row["Role"].", ";
				echo "on : ".dateformatChanger($row["Date"]).".";
				$p++;
				echo "<br><br>";
			}
			echo " </div>
            <div class=\"clear\"></div>
        </section>";
			$nodata=0;
		}
		?>
		<?php
		$sql="SELECT * FROM extra WHERE Emp11_Id=$empid";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result) > 0)
		{
			echo "<section>
            <div class=\"sectionContent\">";
			echo "<h1><u>Extra Activities</u></h1><br>";
			$q = 0;
			while($row=mysqli_fetch_assoc($result))
			{
				echo ($q+1).'. "'.$row["Name"].'"';
				if($row["Place"] != "")
					echo " at ".$row["Place"].", ";
				if($row["Role"] != "")
					echo " as ".$row["Role"].", ";
				echo " on ".dateformatChanger($row["Date"]).".";
				$q++;
				echo "<br><br>";
			}
			echo "</div>
            <div class=\"clear\"></div>
        </section>";
			$nodata=0;
		}
		?>
		<?php
		$sql="SELECT * FROM awards WHERE emp_id=$empid";
		$result=$conn->query($sql);
		if(mysqli_num_rows($result) > 0)
		{
			echo "<section id =\"noborder\">
                            <h1>Awards and Achievements</h1>
                        </section>
                        <section>
                            <div class=\"sectionContent\">";
			$q = 0;
			while($row=mysqli_fetch_assoc($result))
			{
				echo ($q+1).'. "'.$row["award_title"].'", ';
				echo " issued by ".$row["award_issuer"].", ";
				echo " on ".dateformatChanger($row["award_date"]).".";
				$q++;
				echo "<br><br>";
			}
			echo "</div>
            <div class=\"clear\"></div><br>
        </section>";
			$nodata=0;
		}
		?>
		<?php if($nodata==1){echo "<center>Please fill the details in the profile section to view data</center>";}?>
    </div>
</div>
<script>
    kendo.pdf.defineFont({
        "DejaVu Sans": "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans.ttf",
        "DejaVu Sans|Bold": "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Bold.ttf",
        "DejaVu Sans|Bold|Italic": "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
        "DejaVu Sans|Italic": "https://kendo.cdn.telerik.com/2016.2.607/styles/fonts/DejaVu/DejaVuSans-Oblique.ttf",
        "WebComponentsIcons": "https://kendo.cdn.telerik.com/2017.1.223/styles/fonts/glyphs/WebComponentsIcons.ttf"
    });
</script>

<script src="../content/shared/js/pako.min.js"></script>
<script>
    function ExportPdf() {
        kendo.drawing
            .drawDOM($("#cv"),
                {
                    paperSize: "A3",
                    margin: {top: "1cm", bottom: "2cm"},
                    scale: 0.85,
                    height: 600
                })
            .then(function (group) {
                kendo.drawing.pdf.saveAs(group, "CV.pdf")
            });
    }

    function exportDoc() {
        var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' " +
            "xmlns:w='urn:schemas-microsoft-com:office:word' " +
            "xmlns='http://www.w3.org/TR/REC-html40'><body>";
        var footer = "</body></html>";
        var sourceHTML = header + document.getElementById("cv").innerHTML + footer;

        var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
        var fileDownload = document.createElement("a");
        document.body.appendChild(fileDownload);
        fileDownload.href = source;
        fileDownload.download = 'CV.doc';
        fileDownload.click();
        document.body.removeChild(fileDownload);
    }

    function gotoProfile() {
        window.location = "http://localhost/FacultyManagementSystem/profile.php";
    }
</script>
</body>
</html>
