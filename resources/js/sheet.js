function start()
	{
		var stime=document.getElementById("txtstarttimeid").value;
		if (stime=="")
			{
		document.getElementById("errStartTimeId").innerHTML="Start Time Required";
			}
		else
			{
		document.getElementById("errStartTimeId").innerHTML="";
			}				
	}
function endt()
	{
		var etime=document.getElementById("txtendtimeid").value;
		if (etime=="")
			{
		document.getElementById("errEndTimeId").innerHTML="End Time Required";
			}
		else
			{
		document.getElementById("errEndTimeId").innerHTML="";
			}				
	}
function difference()
{
var starttime = document.getElementById("txtstarttimeid").value;
var endtime = document.getElementById("txtendtimeid").value;
 if (starttime < endtime) {
var hms = starttime;   // your input string
var a = hms.split(':'); // split it at the colons
// minutes are worth 60 seconds. Hours are worth 60 minutes.
var starthour_convert = (a[0]*3600);
var startmin_convert = (a[1]*60);
var startsec_convert = starthour_convert + startmin_convert;
//alert(startsec_convert);
var hms1 = endtime;   // your input string
var a1 = hms1.split(':'); // split it at the colons
// minutes are worth 60 seconds. Hours are worth 60 minutes.
var stophour_convert = (a1[0]*3600);
var stopmin_convert = (a1[1]*60);
var stopsec_convert = (stophour_convert + stopmin_convert);
d=stopsec_convert-startsec_convert;
var minutes = (d/60);
$("#hour").val(minutes);
}
else
{
 document.getElementById("errMinId").innerHTML="It appears you chose a start time which is later than your end time.";
							}
}
var input = $('#txtstarttimeid,#txtendtimeid').clockpicker({
			placement: 'bottom',
			align: 'left',
			//twelvehour:true,
			autoclose: true
			
		});	
		function clock(input)
					{
						var st=document.getElementById("clockpicker").value;
						if (st=="")
							{
								document.getElementById("errClock").innerHTML="Please Enter The Time";
							}
						else
							{
							document.getElementById("errClock").innerHTML="";
							}				
					}
