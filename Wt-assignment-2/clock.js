setInterval( ()=>{

	d = new Date();
	htime = d.getHours();
	mtime = d.getMinutes();
	stime = d.getSeconds();

	hrotation = 30*htime + mtime/2;
	mrotation = 6*mtime;
	srotation = 6*stime;

	hour.style.transform = `rotate(${hrotation}deg)`;
	minute.style.transform = `rotate(${mrotation}deg)`;
	second.style.transform = `rotate(${srotation}deg)`;
}, 1000);



function showTime()
{
	var time = new Date();
	var hr = time.getHours();
	var min = time.getMinutes();
	var sec = time.getSeconds();
	var am_pm = "AM";

		if(hr > 12)
		{
			hr -= 12;
			am_pm = "PM";
		}

		if(hr == 0)
		{
			hr = 12;
		}

		hr = (hr<10) ? "0" +hr: hr;
		min = (min<10) ? "0" +min: min;				
		sec = (sec<10) ? "0" +sec: sec;

		var currentTime = hr + ":" + min + ":" + sec + " " + am_pm;					
		document.getElementById("digitalClock").innerHTML = currentTime;

		setTimeout( showTime , 1000);

		}
showTime();