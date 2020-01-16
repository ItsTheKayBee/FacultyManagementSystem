$(document).ready(function() {
    var numberIncr = getCookie("count");
    // used to increment the name for the inputs
    var nIncr = getCookie("count"); // used to increment the name for the inputs
    function addInput() {

        document.getElementById("limitidjour").innerHTML="";
        var flag =0;
        if ( numberIncr<10)
        {
            var checker = document.getElementById("jourcoauthname"+numberIncr).value;
            if (checker.trim() == "")
            {
                flag=1;
            }
        }
        if (flag==1)
        {
            alert("Please Fill The Previous Co-Author Details Completely");
        }
        else{
            if(numberIncr<10){
                numberIncr++;
                if (numberIncr>1) {

                    $('#inputs').append($('<br class="br'+numberIncr+'"> <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3" id="cojour'+numberIncr+'">Co-Author Name:</label><div class="col-md-6 col-sm-9 col-lg-6 col-xs-6"><input class="form-control" id="jourcoauthname'+numberIncr+'" placeholder ="* Co author '+numberIncr+'" name="name'+numberIncr+'" /></div><br class="br'+numberIncr+'"><br class="br'+numberIncr+'">'));
                    $('#inputs').append($('<label class="col-sm-3 col-md-3 col-lg-3 col-xs-3" id="cojour2'+numberIncr+'">Co-Author Affiliation</label><div class="col-md-6 col-sm-9 col-lg-6 col-xs-6"><input class="form-control" id="jourcoauthnameaff'+numberIncr+'" placeholder ="Co author '+numberIncr+' affiliation" name="name'+numberIncr+'_affiliation" /></div><br class="br'+numberIncr+'"><br class="br'+numberIncr+'">'));
                    numberIncr1=numberIncr-1;


                }
            }
            else

                document.getElementById("limitidjour").innerHTML=" Only 10 Co Authors can be added";
        }
    }
    // set handler for addInput button click
    $("#addInput").on('click', addInput);


    // initialize the validator


    function addInputConf() {
        document.getElementById("limitidconf").innerHTML="";
        var flag1 =0;

        if ( nIncr<10)
        {
            var checker1 = document.getElementById("confcoauthname"+nIncr).value;
            if (checker1.trim() == "")
            {
                flag1=1;
            }
        }
        if (flag1==1)
        {
            alert("Please Fill The Previous Co-Author Details Completely")
        }
        else{

            if(nIncr<10){
                nIncr++;

                if(nIncr>1){
                    $('#inputsconf').append($('<br class="br1'+nIncr+'"> <label class="col-sm-3 col-md-3 col-lg-3 col-xs-3" id="coconf'+nIncr+'">Co-Author Name:</label><div class="col-md-6 col-sm-9 col-lg-6 col-xs-6"><input class="form-control" id="confcoauthname'+nIncr+'" placeholder ="* Co author '+nIncr+'" name="name'+nIncr+'" /></div><br class="br1'+nIncr+'"><br class="br1'+nIncr+'">'));
                    $('#inputsconf').append($('<label class="col-sm-3 col-md-3 col-lg-3 col-xs-3" id="coconf2'+nIncr+'">Co-Author Affiliation:</label><div class="col-md-6 col-sm-9 col-lg-6 col-xs-6"><input class="form-control" id="confcoauthnameaff'+nIncr+'" placeholder ="Co author '+nIncr+' affiliation" name="name'+nIncr+' affiliation" /></div><br class="br1'+nIncr+'"><br class="br1'+nIncr+'">'));

                    nIncr1=nIncr-1;
                }
            }
            else
                document.getElementById("limitidconf").innerHTML=" Only 10 Co Authors can be added";
        }
    }
    // set handler for addInput button click
    $("#addInputConf").on('click', addInputConf);

    $('#rem').click(function(){
        document.getElementById("limitidjour").innerHTML="";

        if(numberIncr>1)
        {
            $("#cojour"+numberIncr).remove();
            $("#cojour2"+numberIncr).remove();
            $("#jourcoauthname" +numberIncr).remove();
            $("#jourcoauthnameaff" +numberIncr).remove();
            $(".br"+numberIncr).remove();
            numberIncr--;
        }
        $("#inputs").trim();
    });

    $('#remc').click(function(){
        document.getElementById("limitidconf").innerHTML=" ";
        if(nIncr>1)
        {
            $("#coconf"+nIncr).remove();
            $("#coconf2"+nIncr).remove();
            $("#confcoauthname" +nIncr).remove();
            $("#confcoauthnameaff" +nIncr).remove();
            $(".br1"+nIncr).remove();
            nIncr--;
        }
        $("#inputsconf").trim();
    });

});

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
// 1. PERSONAL //
function projguided()
{
    var name = document.project.projtitle.value;
    var date = document.project.projyear.value;
    document.project.projtitle.style="";
    document.project.projyear.style="";
    document.project.projstud1email.style="";
    document.project.projstud2email.style="";
    document.project.projstud3email.style="";
    document.project.projstud4email.style="";
    document.project.projstud1name.style="";
    document.project.projstud2name.style="";
    document.project.projstud3name.style="";
    document.project.projstud4name.style="";
    document.project.projstud1roll.style="";
    document.project.projstud2roll.style="";
    document.project.projstud3roll.style="";
    document.project.projstud4roll.style="";


    document.getElementById("projname").innerHTML="";
    document.getElementById("projyearerr").innerHTML="";
    document.getElementById("projstud1emailerr").innerHTML = "";
    document.getElementById("projstud2emailerr").innerHTML = "";
    document.getElementById("projstud3emailerr").innerHTML = "";
    document.getElementById("projstud4emailerr").innerHTML = "";
    document.getElementById("projstud1name").innerHTML = "";
    document.getElementById("projstud2name").innerHTML = "";
    document.getElementById("projstud3name").innerHTML = "";
    document.getElementById("projstud4name").innerHTML = "";
    document.getElementById("projstud1roll").innerHTML = "";
    document.getElementById("projstud2roll").innerHTML = "";
    document.getElementById("projstud3roll").innerHTML = "";
    document.getElementById("projstud4roll").innerHTML = "";

    var s1email = document.project.projstud1email.value;
    var s2email = document.project.projstud2email.value;
    var s3email = document.project.projstud3email.value;
    var s4email = document.project.projstud4email.value;
    var projstud1name = document.project.projstud1name.value;
    var projstud2name = document.project.projstud2name.value;
    var projstud3name = document.project.projstud3name.value;
    var projstud4name = document.project.projstud4name.value;
    var projstud1roll = document.project.projstud1roll.value;
    var projstud2roll = document.project.projstud2roll.value;
    var projstud3roll = document.project.projstud3roll.value;
    var projstud4roll = document.project.projstud4roll.value;

    var projflag=0;

    if (s1email != "" || projstud1name != "" || projstud1roll != "")
    {
        if (projstud1name.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud1name").innerHTML = "* Please Enter Student Name";
            document.project.projstud1name.style = "border:2px solid red";
        }
        if(s1email.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud1emailerr").innerHTML = "* Please Enter Student Email";
            document.project.projstud1email.style = "border:2px solid red";
        }
        if(projstud1roll.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud1roll").innerHTML = "* Please Enter Student Roll Number";
            document.project.projstud1roll.style = "border:2px solid red";
        }
        if(s1email.trim()=="")
            document.getElementById("projstud1email").focus();
        if(projstud1roll.trim()=="")
            document.getElementById("projstud1rollid").focus();
        if(projstud1name.trim()=="")
            document.getElementById("projstud1nameid").focus();

    }
    if (s2email != "" || projstud2name != "" || projstud2roll != "")
    {
        if (projstud2name.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud2name").innerHTML = "* Please Enter Student Name";
            document.project.projstud2name.style = "border:2px solid red";
        }
        if(s2email.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud2emailerr").innerHTML = "* Please Enter Student Email";
            document.project.projstud2email.style = "border:2px solid red";
        }
        if(projstud2roll.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud2roll").innerHTML = "* Please Enter Student Roll Number";
            document.project.projstud2roll.style = "border:2px solid red";
        }
        if(s2email.trim()=="")
            document.getElementById("projstud2email").focus();
        if(projstud2roll.trim()=="")
            document.getElementById("projstud2rollid").focus();
        if(projstud2name.trim()=="")
            document.getElementById("projstud2nameid").focus();
    }
    if (s3email != "" || projstud3name != "" || projstud3roll != "")
    {
        if (projstud3name.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud3name").innerHTML = "* Please Enter Student Name";
            document.project.projstud3name.style = "border:2px solid red";
        }
        if(s3email.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud3emailerr").innerHTML = "* Please Enter Student Email";
            document.project.projstud3email.style = "border:2px solid red";
        }
        if(projstud3roll.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud3roll").innerHTML = "* Please Enter Student Roll Number";
            document.project.projstud3roll.style = "border:2px solid red";
        }
        if(s3email.trim()=="")
            document.getElementById("projstud3email").focus();
        if(projstud3roll.trim()=="")
            document.getElementById("projstud3rollid").focus();
        if(projstud3name.trim()=="")
            document.getElementById("projstud3nameid").focus();
    }
    if (s4email != "" || projstud4name != "" || projstud4roll != "")
    {
        if (projstud4name.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud4name").innerHTML = "* Please Enter Student Name";
            document.project.projstud4name.style = "border:2px solid red";
        }
        if(s4email.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud4emailerr").innerHTML = "* Please Enter Student Email";
            document.project.projstud4email.style = "border:2px solid red";
        }
        if(projstud4roll.trim()=="")
        {
            projflag=1;
            document.getElementById("projstud4roll").innerHTML = "* Please Enter Student Roll Number";
            document.project.projstud4roll.style = "border:2px solid red";
        }
        if(s4email.trim()=="")
            document.getElementById("projstud4email").focus();
        if(projstud4roll.trim()=="")
            document.getElementById("projstud4rollid").focus();
        if(projstud4name.trim()=="")
            document.getElementById("projstud4nameid").focus();
    }



    if(name.trim()=="" && date==""){
        alert("* Please Enter all compulsory Fields for Projects Guided");
        return false;
    }
    if(name.trim()=="" || name==null)
    {
        projflag=1;
        document.getElementById("projname").innerHTML = "* Please Enter Project Title";
        document.project.projtitle.style = "border:2px solid red";
    }
    if (date == "" || date == null)
    {
        projflag=1;
        document.getElementById("projyearerr").innerHTML = "* Please Enter Project Date";
        document.project.projyear.style = "border:2px solid red";
    }

    if((!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(s1email))) && (s1email != ""))
    {
        document.getElementById("projstud1emailerr").innerHTML = "* Please Enter Valid Email";
        projflag=1;
        document.project.projstud1email.style = "border:2px solid red";
    }

    if((!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(s2email))) && (s2email != ""))
    {
        document.getElementById("projstud2emailerr").innerHTML = "* Please Enter Valid Email";
        projflag=1;
        document.project.projstud2email.style = "border:2px solid red";
    }

    if((!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(s3email))) && (s3email != ""))
    {
        document.getElementById("projstud3emailerr").innerHTML = "* Please Enter Valid Email";
        projflag=1;
        document.project.projstud3email.style = "border:2px solid red";
    }

    if((!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(s3email))) && (s3email != ""))
    {
        document.getElementById("projstud3emailerr").innerHTML = "* Please Enter Valid Email";
        projflag=1;
        document.project.projstud3email.style = "border:2px solid red";
    }
    if((!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(s4email))) && (s4email != ""))
    {
        document.getElementById("projstud4emailerr").innerHTML = "* Please Enter Valid Email";
        projflag=1;
        document.project.projstud4email.style = "border:2px solid red";
    }


    if (date == "" || date == null)
        document.getElementById("projyearid").focus();

    if(name.trim() == "" || name == null)
        document.getElementById("projtitleid").focus();

    if(projflag == 1)
        return false;

}

function validatePersonal()
{
    var nameflag=0;
    var genflag=0;
    var emailflag=0;
    var contactflag=0;
    var dateflag=0;
    var addressflag=0;
    var x = document.personal.name.value;
    var y = document.personal.email.value;
    var z = document.personal.contact.value;
    var a = document.personal.date.value;
    var b = document.personal.address.value;
    var radios = document.getElementsByName("gender");

    var formValid = false;

    var i = 0;
    while ( (!formValid) && (i < radios.length) )
    {
        if (radios[i].checked) formValid = true;
        i++;
    }

    document.getElementById("name").innerHTML = "";
    document.getElementById("email").innerHTML = "";
    document.getElementById("contact").innerHTML = "";
    document.getElementById("date").innerHTML = "";
    document.getElementById("address").innerHTML = "";
    document.getElementById("gender").innerHTML="";

    document.personal.name.style = "";
    document.getElementsByName("gender").style = "";
    document.personal.email.style = "";
    document.personal.contact.style = "";
    document.personal.date.style = "";
    document.personal.address.style = "";

    if( x.trim() == ""  && y.trim() == "" && z.trim() == "" && a == "" && b.trim() == "" && formValid == false)
    {
        alert("* Please Fill All The Compulsory Fields For Personal Details!");
        document.getElementById("n").focus();
        return false;
    }

    if (x.trim() == "")
    {
        nameflag=1;
        document.getElementById("name").innerHTML = "* Please Enter Name";
        document.personal.name.style = "border:2px solid red";
    }

    if (!(/^([a-zA-Z ]{2,30})$/.test(x)))
    {
        document.getElementById("name").innerHTML = "* Please Enter A Valid Name";
        nameflag=1;
        document.personal.name.style = "border:2px solid red";
    }

    if (!formValid)
    {
        genflag=1;
        document.getElementById("gender").innerHTML = "* Please Select Gender";
        document.getElementsByName("gender").style = "border:2px solid red";
    }

    if (y.trim() == "")
    {
        emailflag=1;
        document.getElementById("email").innerHTML = "* Please Enter Email";
        document.personal.email.style = "border:2px solid red";
    }
    else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(y)))
    {
        document.getElementById("email").innerHTML = "* Please Enter Valid Email";
        emailflag=1;
        document.personal.email.style = "border:2px solid red";
    }

    if (z == "")
    {
        contactflag=1;
        document.getElementById("contact").innerHTML = "* Please Enter Contact Number";
        document.personal.contact.style = "border:2px solid red";
    }

    if (!(/^[7-9][0-9]{9}$/.test(z)))
    {
        document.getElementById("contact").innerHTML = "* Please Enter A Valid Contact Number";
        contactflag=1;
        document.personal.contact.style = "border:2px solid red";
    }

    if (a == "")
    {
        dateflag=1;
        document.getElementById("date").innerHTML = "* Please Select Birth Date";
        document.personal.date.style = "border:2px solid red";
    }
    if (b.trim() == "")
    {
        addressflag=1;
        document.getElementById("address").innerHTML = "* Please Enter Your Address";
        document.personal.address.style = "border:2px solid red";
    }

    if (x == "" || !(/^([a-zA-Z]{2,30})$/.test(x)))
        document.getElementById("n").focus();
    else if (!formValid)
        document.getElementById("g").focus();
    else if (y == "" || y == null || !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(y)))
        document.getElementById("e").focus();
    else if (z == "" || z == null || !(/^[7-9][0-9]{9}$/.test(z)))
        document.getElementById("c").focus();
    else if (a == "" || a == null)
        document.getElementById("d").focus();
    else if (b.trim() == "" || b == null)
        document.getElementById("a").focus();

    if(nameflag==1 || emailflag==1 || contactflag==1 || dateflag==1 || addressflag==1 || genflag==1)
        return false;
}

// 2. ACADEMIC //

function ac1()
{

    var sscinst = document.a1.sscinstitute.value;
    var sscmarks = document.a1.sscmarks.value;
    var sscyear = document.a1.sscyear.value;

    var sscflag = 0;

    document.getElementById("ins1").innerHTML = "";
    document.a1.sscinstitute.style = "";
    document.getElementById("sscmarks1").innerHTML = "";
    document.a1.sscmarks.style = "";

    if( (sscinst.trim() == "") && (sscmarks== "") )
    {
        sscflag = 1;
        alert("* Please Fill All The Compulsory Details for SSC");
        return false;
    }

    if(sscinst.trim() == "")
    {
        document.getElementById("ins1").innerHTML = "* Enter SSC Institue Name";
        document.a1.sscinstitute.style = "border:2px solid red";
        sscflag = 1;
    }

    if(sscmarks== "")
    {
        document.getElementById("sscmarks1").innerHTML = "* Enter SSC Percentage.";
        document.a1.sscmarks.style = "border:2px solid red";
        sscflag = 1;
    }

    if(sscinst.trim() == "")
        document.getElementById("sscinstitute_id").focus();
    else if(sscmarks== "")
        document.getElementById("sscmarks_id").focus();

    if(sscflag == 1)
        return false;

}

function ac2()
{

    var hscinst = document.a2.hscinstitute.value;
    var hscmarks = document.a2.hscmarks.value;


    var hscflag = 0;

    document.getElementById("ins2").innerHTML = "";
    document.a2.hscinstitute.style = "";
    document.getElementById("hscmarks1").innerHTML = "";
    document.a2.hscmarks.style = "";

    if( (hscinst.trim() == "") && (hscmarks== "") )
    {
        alert("* Please Fill All The Compulsory Details for HSC");
        return false;
    }

    if(hscinst.trim() == "")
    {
        document.getElementById("ins2").innerHTML = "* Enter HSC Institue Name";
        document.a2.hscinstitute.style = "border:2px solid red";
        hscflag = 1;
    }

    if(hscmarks== "")
    {
        document.getElementById("hscmarks1").innerHTML = "* Enter HSC Percentage.";
        document.a2.hscmarks.style = "border:2px solid red";
        hscflag = 1;
    }

    if(hscinst.trim() == "")
        document.getElementById("hscinstitute_id").focus();
    else if(hscmarks== "")
        document.getElementById("hscmarks_id").focus();

    if(hscflag == 1)
        return false;
}

function ac3()
{
    var btechinst = document.a3.btechinstitute.value;
    var btechmarks = document.a3.btechmarks.value;
    var btechyear = document.a3.btechyear.value;
    var btechdegree = document.a3.btechdegree.value;

    var btechflag = 0;

    document.getElementById("ins3").innerHTML = "";
    document.a3.btechinstitute.style = "";
    document.getElementById("btechmarks1").innerHTML = "";
    document.a3.btechmarks.style = "";

    if( (btechinst.trim()=="") && (btechmarks== "") )
    {
        btechflag = 1;
        alert("* Please Fill All The Compulsory Details for BTECH");
        return false;
    }

    if(btechinst.trim()=="")
    {
        document.getElementById("ins3").innerHTML = "* Enter BTech Institue Name";
        document.a3.btechinstitute.style = "border:2px solid red";
        btechflag = 1;
    }

    if(btechmarks== "")
    {
        document.getElementById("btechmarks1").innerHTML = "* Enter BTech CGPA.";
        document.a3.btechmarks.style = "border:2px solid red";
        btechflag = 1;
    }

    if(btechinst.trim() == "")
        document.getElementById("btechinstitute_id").focus();
    else if(btechmarks== "")
        document.getElementById("btechmarks_id").focus();

    if(btechflag == 1)
        return false;
}

function ac4()
{
    var mtechinst = document.a4.mtechinstitute.value;
    var mtechmarks = document.a4.mtechmarks.value;
    var mtechyear = document.a4.mtechyear.value;
    var mtechdegree = document.a4.mtechdegree.value;

    var mtechflag = 0;

    document.getElementById("ins4").innerHTML = "";
    document.a4.mtechinstitute.style = "";
    document.getElementById("mtechmarks1").innerHTML = "";
    document.a4.mtechmarks.style = "";

    if( (mtechinst.trim()=="") && (mtechmarks== "") )
    {
        mtechflag = 1;
        alert("* Please Fill All The Compulsory Details for MTECH");
        return false;
    }

    if(mtechinst.trim()=="")
    {
        document.getElementById("ins4").innerHTML = "* Enter MTech Institue Name";
        document.a4.mtechinstitute.style = "border:2px solid red";
        mtechflag = 1;
    }

    if(mtechmarks== "")
    {
        document.getElementById("mtechmarks1").innerHTML = "* Enter MTech CGPA.";
        document.a4.mtechmarks.style = "border:2px solid red";
        mtechflag = 1;
    }

    if(mtechinst.trim() == "")
        document.getElementById("mtechinstitute_id").focus();
    else if(mtechmarks== "")
        document.getElementById("mtechmarks_id").focus();

    if(mtechflag == 1)
        return false;
}

function ac5()
{
    var phdinst = document.a5.phdinstitute.value;
    var phdmarks = document.a5.phdmarks.value;

    var phdflag = 0;

    document.getElementById("ins5").innerHTML = "";
    document.a5.phdinstitute.style = "";
    document.getElementById("phdmarks1").innerHTML = "";
    document.a5.phdmarks.style = "";

    if( (phdinst.trim()=="") && (phdmarks=="") )
    {
        phdflag = 1;
        alert("* Please Fill All The Compulsory Details for PhD");
        return false;
    }

    if(phdinst.trim()=="")
    {
        document.getElementById("ins5").innerHTML = "* Enter PhD Institue Name";
        document.a5.phdinstitute.style = "border:2px solid red";
        phdflag = 1;
    }

    if(phdmarks=="")
    {
        document.getElementById("phdmarks1").innerHTML = "* Enter PhD CGPA.";
        document.a5.phdmarks.style = "border:2px solid red";
        phdflag = 1;
    }

    if(phdinst.trim() == "")
        document.getElementById("phdinstitute_id").focus();
    else if(phdmarks== "")
        document.getElementById("phdmarks_id").focus();

    if(phdflag == 1)
        return false;
}
function edit()
{

    var abc = document.getElementById("category_id").value;
    dynamicdropdown(abc);
}
function setter()
{
    var xyz = document.getElementById("subcategory").value;
    document.getElementById("subcategory").value = xyz;
}

function dynamicdropdown(listindex)
{
    document.getElementById("subcategory").length = 0;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById('subcategory').innerHTML=this.responseText;
        }
    };
    xmlhttp.open("GET", "courses_taught.php?q="+listindex+','+course_id, true);
    xmlhttp.send();
    return true;
}
function coursesvalidation()
{
    var course = document.coursestaught.category.value;
    var subcategory= document.coursestaught.subcategory.value;
    var year = document.coursestaught.courseyear.value;
    var sem= document.coursestaught.coursesem.value;

    document.coursestaught.category.style="";
    document.coursestaught.subcategory.style="";
    document.coursestaught.courseyear.style="";
    document.coursestaught.coursesem.style="";
    document.getElementById("coursetype").innerHTML="";
    document.getElementById("course").innerHTML="";
    document.getElementById("courseyear1").innerHTML="";
    document.getElementById("coursesem1").innerHTML="";

    var courseflag = 0;

    if( (course == 0) && (subcategory==0) && (year==0) &&  (sem==0) )
    {
        alert("* Please Fill All The Compulsory Fields for Courses Taught");
        courseflag = 1;
        return false;
    }
    if(course==0)
    {
        document.getElementById("coursetype").innerHTML="* Please select course type";
        document.coursestaught.category.style="border:2px solid red";
        courseflag = 1;
    }
    if(subcategory==0)
    {
        document.getElementById("course").innerHTML="* Please select course";
        document.coursestaught.subcategory.style="border:2px solid red";
        courseflag = 1;
    }
    if(year==0)
    {
        document.getElementById("courseyear1").innerHTML="* Please select year";
        document.coursestaught.courseyear.style="border:2px solid red";
        courseflag = 1;
    }
    if(sem==0)
    {
        document.getElementById("coursesem1").innerHTML="* Please select sem";
        document.coursestaught.coursesem.style="border:2px solid red";
        courseflag = 1;
    }

    if(course==0)
        document.getElementById("category_id").focus();
    else if(subcategory==0)
        document.getElementById("subcategory").focus();
    else if(year==0)
        document.getElementById("courseyear_id").focus();
    else if(sem==0)
        document.getElementById("coursesem_id").focus();

    if( courseflag == 1)
        return false;

}

// 4. PUBLICATIONS //

function validateBook()
{
    var bookname = document.publicationbooks.bookname.value;
    var bookisbn = document.publicationbooks.bookisbn.value;
    var pubdate = document.publicationbooks.pubdate.value;
    var book_pub_name = document.publicationbooks.book_pub_name.value;
    var book_auth_name = document.publicationbooks.book_auth_name.value;

    var pbflag = 0;

    document.getElementById("pubdate").innerHTML = "";
    document.getElementById("bname").innerHTML = "";
    document.getElementById("bookisbn").innerHTML = "";
    document.getElementById("book_pub_name").innerHTML = "";
    document.getElementById("book_auth_name").innerHTML = "";
    document.publicationbooks.bookname.style = "";
    document.publicationbooks.pubdate.style = "";
    document.publicationbooks.bookisbn.style = "";
    document.publicationbooks.book_pub_name.style = "";
    document.publicationbooks.book_auth_name.style = "";

    if(bookname.trim() == "" && bookisbn.trim() == "" && book_pub_name == "" && book_auth_name == "" && pubdate == "")
    {
        alert("* Please Enter all compulsory Fields for Books");
        return false;
    }

    if (pubdate == "" || pubdate == null)
    {
        pbflag=1;
        document.getElementById("pubdate").innerHTML = "* Please Enter Publication Date";
        document.publicationbooks.pubdate.style = "border:2px solid red";
    }

    if (bookname.trim() == "" || bookname == null)
    {
        pbflag=1;
        document.getElementById("bname").innerHTML = "* Please Enter Book Name";
        document.publicationbooks.bookname.style = "border:2px solid red";
    }
    if(bookisbn.trim() == "" || bookisbn == null)
    {
        pbflag=1;
        document.getElementById("bookisbn").innerHTML = "* Please Enter Book ISBN";
        document.publicationbooks.bookisbn.style = "border:2px solid red";
    }
    if(book_pub_name == "" || book_pub_name == null)
    {
        pbflag=1;
        document.getElementById("book_pub_name").innerHTML = "* Please Enter Publisher's Name";
        document.publicationbooks.book_pub_name.style = "border:2px solid red";
    }
    if(book_auth_name == "" || book_auth_name == null)
    {
        pbflag=1;
        document.getElementById("book_auth_name").innerHTML = "* Please Enter Author's Name";
        document.publicationbooks.book_auth_name.style = "border:2px solid red";
    }

    if(book_auth_name == "" || book_auth_name == null)
        document.getElementById("book_auth_nameid").focus();

    if(book_pub_name == "" || book_pub_name == null)
        document.getElementById("book_pub_nameid").focus();

    if (pubdate == "" || pubdate == null)
        document.getElementById("pubdateid").focus();

    if(bookisbn.trim() == "" || bookisbn == null)
        document.getElementById("bookisbnid").focus();

    if (bookname.trim() == "" || bookname == null)
        document.getElementById("booknameid").focus();

    if( pbflag==1)
        return false;
}

function validateJour()
{
    var journal_name = document.publicationjournal.journal_name.value;
    var jour_date = document.publicationjournal.jour_date.value;
    var journal_pub_name= document.publicationjournal.journal_pub_name.value;
    var journal_title= document.publicationjournal.journal_title.value;
    var journal_impact= document.publicationjournal.journal_impact.value;
    var journal_vol= document.publicationjournal.journal_vol.value;
    var journal_issue= document.publicationjournal.journal_issue.value;
    var journal_pg= document.publicationjournal.journal_pg.value;
    var journal_issn= document.publicationjournal.journal_issn.value;
    var journal_cite= document.publicationjournal.journal_cite.value;
    var jour_coauth_name1 = document.publicationjournal.jour_coauth_name1.value;
    var jour_coauth_nameaff1 = document.publicationjournal.jour_coauth_nameaff1.value;
    var journal_fauth= document.publicationjournal.journal_fauth.value;

    var pjflag=0;
    document.publicationjournal.journal_cite.style = "";
    document.getElementById("journal_cite").innerHTML = "";
    document.publicationjournal.journal_issn.style = "";
    document.getElementById("journal_issn").innerHTML = "";
    document.publicationjournal.journal_pg.style = "";
    document.getElementById("journal_pg").innerHTML = "";
    document.publicationjournal.journal_issue.style = "";
    document.getElementById("journal_issue").innerHTML = "";
    document.publicationjournal.journal_vol.style = "";
    document.getElementById("journal_vol").innerHTML = "";
    document.publicationjournal.journal_title.style = "";
    document.getElementById("journal_title").innerHTML = "";
    document.publicationjournal.journal_impact.style = "";
    document.getElementById("journal_impact").innerHTML = "";
    document.publicationjournal.journal_name.style = "";
    document.getElementById("journal_name").innerHTML = "";
    document.publicationjournal.jour_date.style = "";
    document.getElementById("jour_date").innerHTML = "";
    document.publicationjournal.journal_pub_name.style = "";
    document.getElementById("journal_pub_name").innerHTML = "";
    document.publicationjournal.journal_vol.style = "";
    document.getElementById("journal_vol").innerHTML = "";
    document.publicationjournal.jour_coauth_name1.style = "";
    document.getElementById("jour_coauth_name1").innerHTML = "";
    document.publicationjournal.jour_coauth_nameaff1.style = "";
    document.getElementById("jour_coauth_nameaff1").innerHTML ="";
    document.publicationjournal.journal_fauth_val.style="";
    document.getElementById("jour_fauth").innerHTML = "";


    if(journal_pub_name.trim() == "" && journal_title.trim() == "" && journal_impact.trim() == "" && journal_vol.trim() == "" && journal_issue.trim() == "" && journal_pg.trim() == "" && journal_name.trim() == ""  && jour_date == "" && journal_cite.trim() == ""  && journal_issn.trim() == "" )
    {
        alert("* Please Enter all Compulsory Fields for Journals");
        return false;
    }

    if (journal_cite.trim() == "" || journal_cite == null)
    {
        pjflag=1;
        document.getElementById("journal_cite").innerHTML = "* Please Enter Citation Index";
        document.publicationjournal.journal_cite.style = "border:2px solid red";
    }
    if (journal_issn.trim() == "" || journal_issn == null)
    {
        pjflag=1;
        document.getElementById("journal_issn").innerHTML = "* Please Enter Journal ISSN";
        document.publicationjournal.journal_issn.style = "border:2px solid red";
    }
    if (journal_pg.trim() == "" || journal_pg == null)
    {
        pjflag=1;
        document.getElementById("journal_pg").innerHTML = "* Please Enter Page no.";
        document.publicationjournal.journal_pg.style = "border:2px solid red";
    }
    if (journal_issue.trim() == "" || journal_issue == null)
    {
        pjflag=1;
        document.getElementById("journal_issue").innerHTML = "* Please Enter Issue no.";
        document.publicationjournal.journal_issue.style = "border:2px solid red";
    }
    if (journal_vol.trim() == "" || journal_vol == null)
    {
        pjflag=1;
        document.getElementById("journal_vol").innerHTML = "* Please Enter Journal Volume";
        document.publicationjournal.journal_vol.style = "border:2px solid red";
    }
    if (journal_impact.trim() == "" || journal_impact == null)
    {
        pjflag=1;
        document.getElementById("journal_impact").innerHTML = "* Please Enter Impact Factor";
        document.publicationjournal.journal_impact.style = "border:2px solid red";
    }

    if (journal_title.trim() == "" || journal_title == null)
    {
        pjflag=1;
        document.getElementById("journal_title").innerHTML = "* Please Enter Paper's Title";
        document.publicationjournal.journal_title.style = "border:2px solid red";
    }
    if (journal_name.trim() == "" || journal_name == null)
    {
        pjflag=1;
        document.getElementById("journal_name").innerHTML = "* Please Enter Journal Name";
        document.publicationjournal.journal_name.style = "border:2px solid red";
    }

    if (jour_date == "" || jour_date == null)
    {
        pjflag=1;
        document.getElementById("jour_date").innerHTML = "* Please Enter Journal Date";
        document.publicationjournal.jour_date.style = "border:2px solid red";
    }
    if (journal_pub_name.trim() == "" || journal_pub_name == null)
    {

        pjflag=1;
        document.getElementById("journal_pub_name").innerHTML = "* Please Enter Publisher's Name";
        document.publicationjournal.journal_pub_name.style = "border:2px solid red";

    }
    if(jour_coauth_name1 == "" || jour_coauth_name1 == null)
    {
        pjflag=1;
        document.getElementById("jour_coauth_name1").innerHTML = "Please Enter Co Author Name";
        document.publicationjournal.jour_coauth_name1.style = "border:2px solid red";
    }
    if(jour_coauth_nameaff1 == "" || jour_coauth_nameaff1 == null)
    {
        pjflag=1;
        document.getElementById("jour_coauth_nameaff1").innerHTML = "Please Enter Co Author Name";
        document.publicationjournal.jour_coauth_nameaff1.style = "border:2px solid red";
    }
    if(journal_fauth == "NO")
    {
        var journal_fauthor = document.publicationjournal.journal_fauth_val.value;

        if(journal_fauthor == "")
        {
            pjflag=1;
            document.getElementById("jour_fauth").innerHTML = "* Please Enter First Author";
            document.publicationjournal.journal_fauth_val.style = "border:2px solid red";
        }
    }

    if (journal_title.trim() == "" || journal_title == null)
        document.getElementById("journaltitleid").focus();
    else if(journal_fauth == "NO")
    {
        var journal_fauthor = document.publicationjournal.journal_fauth_val.value;

        if(journal_fauthor == "")
        {
            pjflag=1;
            document.getElementById("journal_fauth").focus();

        }
    }
    else if(journal_name == "" || journal_name == null)
        document.getElementById("journal_nameid").focus();
    else if(jour_coauth_name1 == "" || jour_coauth_name1 == null)
        document.getElementById("jourcoauthname1").focus();
    else if(jour_coauth_nameaff1 == "" || jour_coauth_nameaff1 == null)
        document.getElementById("jourcoauthnameaff1").focus();
    else if (journal_pub_name.trim() == "" || journal_pub_name == null)
        document.getElementById("journal_pub_nameid").focus();
    else if (jour_date == "" || jour_date == null)
        document.getElementById("jour_dateid").focus();
    else if (journal_impact.trim() == "" || journal_impact == null)
        document.getElementById("journal_impactid").focus();
    else if (journal_vol.trim() == "" || journal_vol == null)
        document.getElementById("journal_volid").focus();
    else if (journal_issue.trim() == "" || journal_issue == null)
        document.getElementById("journal_issueid").focus();
    else if (journal_pg.trim() == "" || journal_pg == null)
        document.getElementById("journal_pgid").focus();
    else if (journal_issn.trim() == "" || journal_issn == null)
        document.getElementById("journal_issnid").focus();
    else if (journal_cite.trim() == "" || journal_cite == null)
        document.getElementById("journal_citeid").focus();
    if( pjflag==1)
        return false;
}

function validateConf()
{
    var conf_name = document.publicationconf.conf_name.value;
    var pubdate = document.publicationconf.pubdate.value;
    var conf_hindex = document.publicationconf.conf_hindex.value;
    var conf_pubname= document.publicationconf.conf_pubname.value;
    var conf_proname= document.publicationconf.conf_proname.value;
    var conf_themename = document.publicationconf.conf_themename.value;
    var conf_pg =document.publicationconf.conf_pg.value;
    var conf_issn = document.publicationconf.conf_issn.value;
    var conf_orgname = document.publicationconf.conf_orgname.value;
    var conf_place = document.publicationconf.conf_place.value;
    var conf_cite = document.publicationconf.conf_cite.value;
    var conf_fauth = document.publicationconf.conf_fauth.value;
    var name1 = document.publicationconf.name1.value;
    var name1_affiliation = document.publicationconf.name1_affiliation.value;
    var pcflag = 0;

    document.publicationconf.conf_name.style = "";
    document.getElementById("conf_name").innerHTML = "";
    document.publicationconf.pubdate.style = "";
    document.getElementById("pubdate").innerHTML = "";
    document.publicationconf.conf_hindex.style = "";
    document.getElementById("conf_hindex").innerHTML = "";
    document.publicationconf.conf_pubname.style = "";
    document.getElementById("conf_pubname").innerHTML = "";
    document.publicationconf.conf_proname.style = "";
    document.getElementById("conf_proname").innerHTML = "";
    document.publicationconf.conf_themename.style = "";
    document.getElementById("conf_themename").innerHTML = "";
    document.publicationconf.conf_pg.style = "";
    document.getElementById("conf_pg").innerHTML = "";
    document.publicationconf.conf_issn.style = "";
    document.getElementById("conf_issn").innerHTML = "";
    document.publicationconf.conf_orgname.style = "";
    document.getElementById("conf_orgname").innerHTML = "";
    document.publicationconf.conf_place.style = "";
    document.getElementById("conf_place").innerHTML = "";
    document.publicationconf.conf_cite.style = "";
    document.getElementById("conf_cite").innerHTML = "";
    document.publicationconf.conf_fauth_val.style="";
    document.getElementById("conf_fauthor").innerHTML = "";
    document.publicationconf.name1.style= "";
    document.getElementById("name1").innerHTML = "";
    document.publicationconf.name1_affiliation.style= "";
    document.getElementById("name1_affiliation").innerHTML = "";

    if(conf_name.trim() == "" && pubdate.trim() == "" && conf_hindex.trim() == "" && conf_pubname == "" && conf_proname == "" && conf_themename == ""
        && conf_pg == "" && conf_issn == "" && conf_orgname == "" && conf_place == "" && conf_cite == "")
    {
        alert("* Please Enter all compulsory Fields for Conferences");
        return false;
    }
    if (conf_name.trim() == "" || conf_name == null)
    {
        pcflag=1;
        document.getElementById("conf_name").innerHTML = "* Please Enter the Conference Name";
        document.publicationconf.conf_name.style = "border:2px solid red";
    }

    if (pubdate.trim() == "" || pubdate == null)
    {
        pcflag=1;
        document.getElementById("pubdate").innerHTML = "* Please Enter the Publication Date";
        document.publicationconf.pubdate.style = "border:2px solid red";
    }
    if (conf_hindex.trim() == "" || conf_hindex == null)
    {
        pcflag=1;
        document.getElementById("conf_hindex").innerHTML = "* Please Enter the H Index";
        document.publicationconf.conf_hindex.style = "border:2px solid red";
    }
    if (conf_pubname == "" || conf_pubname == null)
    {
        pcflag=1;
        document.getElementById("conf_pubname").innerHTML = "* Please Enter Publisher's Name";
        document.publicationconf.conf_pubname.style = "border:2px solid red";
    }
    if (conf_proname == "" || conf_proname == null)
    {
        pcflag=1;
        document.getElementById("conf_proname").innerHTML = "* Please Enter the Proceeding Name";
        document.publicationconf.conf_proname.style = "border:2px solid red";
    }
    if (conf_themename == "" || conf_themename == null)
    {
        pcflag=1;
        document.getElementById("conf_themename").innerHTML = "* Please Enter the Theme";
        document.publicationconf.conf_themename.style = "border:2px solid red";
    }
    if (conf_pg == "" || conf_pg == null)
    {
        pcflag=1;
        document.getElementById("conf_pg").innerHTML = "* Please Enter the Page No";
        document.publicationconf.conf_pg.style = "border:2px solid red";
    }
    if (conf_issn == "" || conf_issn == null)
    {
        pcflag=1;
        document.getElementById("conf_issn").innerHTML = "* Please Enter the ISSN No";
        document.publicationconf.conf_issn.style = "border:2px solid red";
    }
    if (conf_orgname == "" || conf_orgname == null)
    {
        pcflag=1;
        document.getElementById("conf_orgname").innerHTML = "* Please Enter the Organiser's Name";
        document.publicationconf.conf_orgname.style = "border:2px solid red";
    }
    if (conf_place == "" || conf_place == null)
    {
        pcflag=1;
        document.getElementById("conf_place").innerHTML = "* Please Enter the Proceeding";
        document.publicationconf.conf_place.style = "border:2px solid red";
    }
    if (conf_cite == "" || conf_cite == null)
    {
        pcflag=1;
        document.getElementById("conf_cite").innerHTML = "* Please Enter the Proceeding";
        document.publicationconf.conf_cite.style = "border:2px solid red";
    }
    if(conf_fauth == "NO")
    {
        var conf_fauth_val = document.publicationconf.conf_fauth_val.value;
        if(conf_fauth_val == "" || conf_fauth_val == null)
        {
            pcflag=1;
            document.getElementById("conf_fauthor").innerHTML = "* Please Enter the Author's Name ";
            document.publicationconf.conf_fauth_val.style="border:2px solid red";
        }
    }
    if( name1 == "" || name1 == null)
    {
        pcflag=1;
        document.getElementById("name1").innerHTML = "* Please Enter the Author's Name ";
        document.publicationconf.name1.style="border:2px solid red";
    }

    if( name1_affiliation == "" || name1_affiliation == null)
    {
        pcflag=1;
        document.getElementById("name1_affiliation").innerHTML = "* Please Enter the Author's Name ";
        document.publicationconf.name1_affiliation.style="border:2px solid red";
    }


    if (conf_name.trim() == "" || conf_name == null)
        document.getElementById("conf_nameid").focus();

    else if(conf_fauth == "NO")
    {
        var conf_fauth_val = document.publicationconf.conf_fauth_val.value;
        if(conf_fauth_val == "" || conf_fauth_val == null)
        {
            pcflag=1;
            document.getElementById("conf_fauth").focus();

        }
    }

    else if( name1 == "" || name1 == null)
        document.getElementById("confcoauthname1").focus();

    else if( name1_affiliation == "" || name1_affiliation == null)
        document.getElementById("confcoauthnameaff1").focus();

    else if (pubdate == "" || pubdate == null)
        document.getElementById("confpubdateid").focus();

    else if (conf_hindex == "" || conf_hindex == null)
        document.getElementById("conf_hindexid").focus();

    else if (conf_pubname == "" || conf_pubname == null)
        document.getElementById("conf_pubnameid").focus();

    else if (conf_proname == "" || conf_proname == null)
        document.getElementById("conf_pronameid").focus();

    else if (conf_themename == "" || conf_themename == null)
        document.getElementById("conf_themeid").focus();

    else if (conf_pg == "" || conf_pg == null)
        document.getElementById("conf_pgid").focus();

    else if (conf_issn == "" || conf_issn == null)
        document.getElementById("conf_issnid").focus();

    else if (conf_orgname == "" || conf_orgname == null)
        document.getElementById("conf_orgid").focus();

    else if (conf_place == "" || conf_place == null)
        document.getElementById("conf_placeid").focus();

    else if (conf_cite == "" || conf_cite == null)
        document.getElementById("conf_citeid").focus();

    if( pcflag == 1)
        return false;
}



function validateAttended()
{
    var attendedname = document.sttpattended.attendedname.value;
    var datefromattended = document.sttpattended.datefromattended.value;
    var datetoattended = document.sttpattended.datetoattended.value;
    var eventtype = document.sttpattended.eventtype.value;

    var sa = 0;

    document.sttpattended.attendedname.style = "";
    document.getElementById("attendedname").innerHTML = "";
    document.sttpattended.datefromattended.style = "";
    document.getElementById("datefromattended").innerHTML = "";
    document.sttpattended.datetoattended.style = "";
    document.getElementById("datetoattended").innerHTML = "";

    if(attendedname.trim() == "" && datefromattended == "" && datetoattended == "")
    {
        alert("* Please Enter all compulsory Fields for STTP Attended");
        return false;
    }

    if (attendedname.trim() == "" || attendedname == null)
    {
        sa=1;
        document.getElementById("attendedname").innerHTML = "* Please Enter the STTP Attended Name";
        document.sttpattended.attendedname.style = "border:2px solid red";
    }

    if (datefromattended == "" || datefromattended == null)
    {
        sa=1;
        document.getElementById("datefromattended").innerHTML = "* Please Enter STTP Start Date";
        document.sttpattended.datefromattended.style = "border:2px solid red";
    }

    if (datetoattended == "" || datetoattended == null)
    {
        sa=1;
        document.getElementById("datetoattended").innerHTML = "* Please Enter STTP End Date";
        document.sttpattended.datetoattended.style = "border:2px solid red";
    }
    if (datetoattended == "" || datetoattended == null)
        document.getElementById("datetoattendedid").focus();

    if (datefromattended == "" || datefromattended == null)
        document.getElementById("datefromattendedid").focus();

    if (attendedname.trim() == "" || attendedname == null)
        document.getElementById("attendednameid").focus();
    if(eventtype===''|| eventtype == null){
        document.getElementById("eventtype_err").innerHTML="* Please Select Event Type";
        document.sttpattended.eventtype.style="border:2px solid red";
        document.getElementById("eventtype").focus();
        sa = 1;
    }

    if(sa == 1)
        return false;
}

function sttpo()
{
    var oname = document.sttporganised.organizedname.value;
    var ofrom = document.sttporganised.datefromorganized.value;
    var oto = document.sttporganised.datetoorganized.value;
    var orgeventtype = document.sttporganised.organizedeventtype.value;

    var so = 0;

    document.getElementById("organizedname").innerHTML = "";
    document.sttporganised.organizedname.style = "";
    document.getElementById("datefromorganized").innerHTML = "";
    document.sttporganised.datefromorganized.style = "";
    document.getElementById("datetoorganized").innerHTML = "";
    document.sttporganised.datetoorganized.style = "";

    if( (oname.trim()=="") && (ofrom=="") && (oto=="") )
    {
        alert("* Please Enter all compulsory Fields for STTP Organised");
        so = 1;
        return false;
    }

    if(oname.trim()=="")
    {
        document.getElementById("organizedname").innerHTML = "* Enter Event's Name";
        document.sttporganised.organizedname.style = "border:2px solid red";
        so = 1;
    }

    if(ofrom=="")
    {
        document.getElementById("datefromorganized").innerHTML = "* Enter Event's From Date";
        document.sttporganised.datefromorganized.style = "border:2px solid red";
        so = 1;
    }

    if(oto=="")
    {
        document.getElementById("datetoorganized").innerHTML = "* Enter Event's to Date";
        document.sttporganised.datetoorganized.style = "border:2px solid red";
        so = 1;
    }

    if(oname.trim()=="")
        document.getElementById("organizedname_id").focus();
    else if(ofrom=="")
        document.getElementById("datefromorganized_id").focus();
    else if(oto=="")
        document.getElementById("datetoorganized_id").focus();
    if(orgeventtype===''|| orgeventtype == null){
        document.getElementById("orgeventtype_err").innerHTML="* Please Select Event Type";
        document.sttporganised.orgeventtype.style="border:2px solid red";
        document.getElementById("orgeventtype").focus();
        so = 1;
    }

    if(so == 1)
        return false;
}

function validateDeli()
{
    var deliveredname = document.sttpdelivered.deliveredname.value;
    var datefromdelivered = document.sttpdelivered.datefromdelivered.value;
    var datetodelivered = document.sttpdelivered.datetodelivered.value;
    var deleventtype = document.sttpdelivered.deliveredeventtype.value;

    var sd = 0;

    document.sttpdelivered.deliveredname.style = "";
    document.getElementById("deliveredname").innerHTML = "";
    document.sttpdelivered.datefromdelivered.style = "";
    document.getElementById("datefromdelivered").innerHTML = "";
    document.sttpdelivered.datetodelivered.style = "";
    document.getElementById("datetodelivered").innerHTML = "";

    if(deliveredname.trim() == "" && datefromdelivered == "" && datetodelivered == "")
    {
        alert("* Please Enter all compulsory Fields for STTP Delivered");
        return false;
    }
    if (deliveredname.trim() == "" || deliveredname == null)
    {
        sd=1;
        document.getElementById("deliveredname").innerHTML = "* Please Enter the STTP Delivered Name";
        document.sttpdelivered.deliveredname.style = "border:2px solid red";
    }


    if (datefromdelivered == "" || datefromdelivered == null)
    {
        sd=1;
        document.getElementById("datefromdelivered").innerHTML = "* Please Enter STTP Start Date";
        document.sttpdelivered.datefromdelivered.style = "border:2px solid red";
    }

    if (datetodelivered == "" || datetodelivered == null)
    {
        sd=1;
        document.getElementById("datetodelivered").innerHTML = "* Please Enter STTP End Date";
        document.sttpdelivered.datetodelivered.style = "border:2px solid red";
    }

    if (datetodelivered == "" || datetodelivered == null)
        document.getElementById("datetodeliveredid").focus();

    if (datefromdelivered == "" || datefromdelivered == null)
        document.getElementById("datefromdeliveredid").focus();

    if (deliveredname.trim() == "" || deliveredname == null)
        document.getElementById("deliverednameid").focus();

    if(deleventtype===''|| deleventtype == null){
        document.getElementById("deleventtype_err").innerHTML="* Please Select Event Type";
        document.sttpdelivered.deliveredeventtype.style="border:2px solid red";
        document.getElementById("deliveredeventtype").focus();
        sd = 1;
    }

    if(sd == 1)
        return false;
}

// 6. CO-CURRICULAR //

function co()
{
    var cocurrname = document.co6.cocurrname.value;
    var cocurrdesc = document.co6.cocurrdescription.value;
    var cocurrrole = document.co6.cocurrrole.value;
    var cocurrdate = document.co6.cocurrdate.value;

    var cocurrflag = 0;

    document.getElementById("coname").innerHTML = "";
    document.co6.cocurrname.style = "";
    document.getElementById("codesc").innerHTML = "";
    document.co6.cocurrdescription.style = "";
    document.getElementById("corole").innerHTML = "";
    document.co6.cocurrrole.style = "";
    document.getElementById("codate").innerHTML = "";
    document.co6.cocurrdate.style = "";


    if( (cocurrname.trim()=="") && (cocurrdesc.trim()=="") && (cocurrrole.trim()=="") && (cocurrdate=="") )
    {
        alert("* Please Enter all compulsory Fields for Co-Curricular Activities");
        cocurrflag = 1;
        return false;
    }

    if(cocurrname.trim()=="")
    {
        document.getElementById("coname").innerHTML = "* Enter the name of Co-curricular Activity's Name";
        document.co6.cocurrname.style = "border:2px solid red";
        cocurrflag = 1;
    }

    if(cocurrdate=="")
    {
        document.getElementById("codate").innerHTML = "* Enter Co-curricular Activity's Date";
        document.co6.cocurrdate.style = "border:2px solid red";
        cocurrflag = 1;
    }

    if(cocurrname.trim()=="")
        document.getElementById("cocurrname_id").focus();
    else if(cocurrdate=="")
        document.getElementById("cocurrdate_id").focus();

    if(cocurrflag == 1)
        return false;
}

// 7. EXTRAS //

function extra()
{
    var extraname = document.ext7.extraname.value;
    var extradate = document.ext7.extradate.value;

    var extraflag = 0;

    document.getElementById("extname").innerHTML = "";
    document.ext7.extraname.style = "";
    document.getElementById("extdate").innerHTML = "";
    document.ext7.extradate.style = "";

    if( (extraname.trim()=="") && (extradate=="") )
    {
        alert("* Please Enter all compulsory Fields for Extra Activities");
        extraflag = 1;
        return false;
    }

    if(extraname.trim()=="")
    {
        document.getElementById("extname").innerHTML = "* Enter Extra Activity's Name";
        document.ext7.extraname.style = "border:2px solid red";
        extraflag = 1;
    }

    if(extradate=="")
    {
        document.getElementById("extdate").innerHTML = "* Enter Extra Activity's Date";
        document.ext7.extradate.style = "border:2px solid red";
        extraflag = 1;
    }

    if(extraname.trim()=="")
        document.getElementById("extraname1").focus();
    else if(extradate=="")
        document.getElementById("extradate1").focus();

    if( extraflag == 1 )
        return false;
}