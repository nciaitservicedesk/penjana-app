<html><head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <link href="{{ asset('css/loa.css?v=1.03') }}" rel="stylesheet" type="text/css" />
  <title>Unknown</title>
</head>
  <body>
	<main>
		<div class="header1">
			<img src="{{asset('img/logo-ncer-malaysia.jpg')}}" width="100%" height="100%"/>
		</div>
		<div class="footer1">
			<p class="normal"><b class="bold" style="font-size: 8px">NORTHERN CORRIDOR IMPLEMENTATION AUTHORITY</b></p>
			<p class="normal" style="font-size: 8px">No. 1114, Jalan Perindustrian Bukit Minyak 18,</p>
			<p class="normal" style="font-size: 8px">Penang Science Park</p>
			<p class="normal" style="font-size: 8px">14100 Simpang Ampat,</p>
			<p class="normal" style="font-size: 8px">Pulau Pinang.</p>
			<p class="normal" style="font-size: 8px">T +(604) 502 0708  •   F +(604) 502 0194</p><p class="block_2 bold" style="font-size: 8px">www.koridorutara.com.my</p>
			<p class="normal" style="font-size: 8px">BRANCH OFFICES:  KEDAH No. 30A, Tingkat 2, Wisma PKNK, Jalan Sultan Badlishah, 
				05000 Alor Setar, Kedah Darul Aman, Malaysia. T +(604) 732 9881 • F +(604) 734 2881              
				PERAK Aras 10 (Office 9), Menara Perak Techno Trade Centre, Bandar Meru Raya Off Jalan Jelapang, 
				30020 Ipoh, Perak Darul Ridzuan, Malaysia.  T +(605) 525 3617 • F +(605) 525 3615 PERLIS d/a Menteri Besar Incorporation, Tingkat Mezzanine, Kompleks Warisan Negeri, Jalan Kolam, 01000 Kangar, Perlis, Malaysia. 
				T +(604) 970 4651 • F +(604) 970 4651  CYBERJAYA C-09-02, C-09-3A & C-09-06, iTech Tower, Jalan Impact, Cyber 6, 63000 Cyberjaya, Selangor Darul Ehsan, Malaysia. T +(603) 8322 2222 • F +(603) 8322 6417</p>
		</div>
		<div class="block_1">
			<p class="normal">Reference Number: {{$info['refNo']}}</p>
			<p class="normal">&nbsp;</p>
			<p class="normal">{{$info['printDate']}}</p>
			<p class="normal">&nbsp;</p>
			<p class="normal"><b class="bold">{{$info['applicantName']}}</b></p>
			<p class="normal"><b class="bold">{{$info['designation']}} </b></p>
			<p class="normal"><b class="bold"> {{$info['coName']}} ({{$info['ssm']}})</b></p>
			<p class="normal"><b class="bold">{{$info['regAddr1']}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
			<p class="normal"><b class="bold">{{$info['regAddr2']}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
			<p class="normal"><b class="bold">{{$info['regAddr3']}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
			<p class="normal">&nbsp;</p>
			<p class="normal">Dear Sir / Madam,</p>
			<p class="normal">&nbsp;</p>
			<p class="normal">YOUR APPLICATION STATUS FOR PELAN JANA SEMULA EKONOMI NEGARA (PENJANA) NCER @JOMKERJA TO {{strtoupper($info['coName'])}} ({{ strtoupper($info['ssm']) }})</p>
			<hr>
			<p class="normal">We refer to the above captioned matter.</p>
			<p class="normal">&nbsp;</p>
			<p class="normal">2.<span class="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>We regret to inform you that your online application dated {{$info['subDate']}} reference number: {{$info['refNo']}} under the PENJANANCER@JOMKERJA cannot be considered at the current moment.</p>
			<p class="normal">&nbsp;</p>
			<p class="normal">We appreciate the time and effort that you dedicated to your application, and we look forward to the possibility of working together in the future.</p>
			<p class="normal">&nbsp;</p>
			<p class="normal">For future communication with NCIA on PENJANANCER matters, please contact PENJANA Helpdesk at 04-5020708 or email to <a href="mailto:helpdeskpenjana@ncer.com.my">helpdeskpenjana@ncer.com.my</a></p>
			<p class="normal">&nbsp;</p>
			<p class="normal">Thank you.</p>
			<p class="normal">&nbsp;</p>
			<p class="normal">Datuk Seri Jebasingam Issace John</p>
			<p class="normal">Chief Executive</p>
			<p class="normal">&nbsp;</p>
			<p class="normal">&nbsp;</p>
			<p class="normal">&nbsp;</p>
			<div style="text-align: center">
				<p class="normal">This is a digital contractual document. Signatories are not required.</p>
			</div>
		</div>
	</main>
</body></html>