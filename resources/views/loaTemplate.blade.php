<html><head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <link href="{{ asset('css/loa.css?v=1.1') }}" rel="stylesheet" type="text/css" />
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
			<p class="normal" style="font-size: 8px">T +(604) 502 0708  •   F +(604) 502 0194</p><p class="block_2" style="font-size: 8px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; www.koridorutara.com.my</p>
			<p class="normal" style="font-size: 8px">BRANCH OFFICES:  KEDAH No. 30A, Tingkat 2, Wisma PKNK, Jalan Sultan Badlishah, 05000 Alor Setar, Kedah Darul Aman, Malaysia. T +(604) 732 9881 • F +(604) 734 2881              PERAK Aras 10 (Office 9), Menara Perak Techno Trade Centre, Bandar Meru Raya Off Jalan Jelapang, 30020 Ipoh, Perak Darul Ridzuan, Malaysia.  T +(605) 525 3617 • F +(605) 525 3615 PERLIS d/a Menteri Besar Incorporation, Tingkat Mezzanine, Kompleks Warisan Negeri, Jalan Kolam, 01000 Kangar, Perlis, Malaysia. T +(604) 970 4651 • F +(604) 970 4651  CYBERJAYA C-09-02, C-09-3A & C-09-06, iTech Tower, Jalan Impact, Cyber 6, 63000 Cyberjaya, Selangor Darul Ehsan, Malaysia. T +(603) 8322 2222 • F +(603) 8322 6417</p>
		</div>
		<div class="block_1">
			<p class="normal">Reference Number: {{$info['refNo']}} </p>
			<p class="normal">{{$info['printDate']}}</p>
			<p class="normal"><b class="bold">{{$info['applicantName']}}</b></p>
			<p class="normal"><b class="bold">{{$info['designation']}} </b></p>
			<p class="normal"><b class="bold"> {{$info['coName']}} ({{$info['ssm']}})</b></p>
			<p class="normal"><b class="bold">{{$info['regAddr1']}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
			<p class="normal"><b class="bold">{{$info['regAddr2']}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
			<p class="normal"><b class="bold">{{$info['regAddr3']}}</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
			<p class="normal">&nbsp;</p>
			<p class="normal">Dear Sir / Madam,</p>
			<p class="normal">LETTER OF AWARD PELAN JANA SEMULA EKONOMI NEGARA (PENJANA) NCER @JOMKERJA TO {{strtoupper($info['coName'])}} ({{ strtoupper($info['ssm']) }})</p>
			<p class="normal">&nbsp;</p>
			<p class="normal">We refer to the above captioned matter.</p>
			<p class="normal">&nbsp;</p>
			<p class="normal">2.<span class="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>We are pleased to inform you that your online application dated {{$info['subDate']}} reference number: {{$info['refNo']}} under the PENJANANCER@JOMKERJA has been approved subject to the following terms and conditions: </p>
		</div>
		<div class="table">
			<div class="tabletext"><span class="bullet_">(a)&nbsp;</span><span class="tablecell">The incentive shall be available for a maximum period of 18 months only commencing from the date of this Letter of Award and shall expire on {{$info['expDate']}} (“Availability Period”); </span></div>
			<div class="tabletext"><span class="bullet_">(b)&nbsp;</span><span class="tablecell">Hiring of participants shall commence one (1) month from the date of this Letter of Award. All hiring must be made within the year 2020;</span></div>
			<div class="tabletext"><span class="bullet_">(c)&nbsp;</span><span class="tablecell">Number of participants approved: {{$info['approvedPax']}}; </span></div>
			<div class="tabletext"><span class="bullet_">(d)&nbsp;</span><span class="tablecell">The amount approved: RM{{$info['approvedAmmt']}}; </span></div>
			<div class="tabletext"><span class="bullet_">(e)&nbsp;</span><span class="tablecell">Payment to the Company will be in reimbursement method once per quarter upon the Company’ submission of claims complete with supporting document(s);</span></div>
			<div class="tabletext"><span class="bullet_">(f)&nbsp;</span><span class="tablecell">For positions hired within the year 2020, 3 months advance payment from the allocated amount will be payable to the Company;</span></div>
			<div class="tabletext"><span class="bullet_">(g)&nbsp;</span><span class="tablecell">Target participants may include as follows: -</span></div>
			<div class="tabletext"><span class="bullet_"></span><span class="tablecell"> time workers, contract workers, management trainees, graduate trainees, interns and recently retrenched workers may be considered. For recruitment of retrenched workers, the ratio should not exceed 50% of total PENJANANCER@JOMKERJA participant. The participants must be converted to permanent position before or upon completion of 6 months engagement.</span></div>
			<div class="tabletext"><span class="bullet_">(h)&nbsp;</span><span class="tablecell">To submit the list of participants to NCIA within seven (7) days upon hiring process of each participant. </span></div>
			<div class="tabletext"><span class="bullet_">(i)&nbsp;</span><span class="tablecell">To submit final report on the implementation of the Programme to NCIA; </span></div>
			<div class="tabletext"><span class="bullet_">(j)&nbsp;</span><span class="tablecell">The Company shall grant permission or right of access to NCIA’s personnel and/or authorised representatives onto the premises and thereupon accord all reasonable assistance to NCIA’s personnel and/or authorised representatives during the visits.</span></div>
			<div class="tabletext"><span class="bullet_">(k)&nbsp;</span><span class="tablecell">The Company to adhere all regulatory compliance and monitoring requirement by NCIA.</span></div>
		</div> 
	<div>
	<p class="normal">&nbsp;</p>
	<p class="normal">3.<span class="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>The Company shall not allow the same recipient to participate in any other similar incentives programme nor shall be in receipt of any other form of financial assistance whatsoever from any other agency of the Government of Malaysia throughout the six (6) months duration. Failure to observe the aforementioned requirement shall give right to NCIA to stop the disbursement at any stage whether in whole or in part thereof or NCIA reserves the right to revoke this Letter of Award whereby NCIA shall not be liable for any loss or damages suffered by the Company including future loss.</p>
	</div>
	</main>

<div class="pagebreak">
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<div class="header2">
		<p class="normal" style="font-size: 8px">Reference No. : {{$info['refNo']}}</p>
	<p class="normal" style="font-size: 8px">Date : {{$info['printDate']}}</p>
		<p class="normal" style="font-size: 8px">Subject :	LETTER OF AWARD PELAN JANA SEMULA EKONOMI NEGARA (PENJANA) NCER @JOMKERJA TO {{$info['coName']}} ({{$info['ssm'] }})	</p>
		<p class="normal" style="font-size: 8px">Page: 2 of 2</p>
	</div>
	<p class="normal">4.<span class="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>The Company shall discharge its duties and conduct itself in the best interest of NCIA and in carrying out the obligations, the Company shall strictly comply with NCIA’s instructions and directions issued from time to time. </p>
	<p class="normal">&nbsp;</p>
	<p class="normal">5.<span class="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>All information in relation to the PENJANANCER JOMKERJA Programme, including this Letter of Award shall be treated with the strictest confidence. You shall not divulge or communicate any information in respect thereof to any third parties save with prior written consent of NCIA.</p>
	<p class="normal">&nbsp;</p>
	<p class="normal">6.<span class="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Upon your digital acceptance of this offer within seven (7) days from the date of this Letter of Award, a binding contract is formed between NCIA and the Company. Failure to accept within the prescribed time will render this offer as lapse automatically. This Letter of Award shall be governed by and construed exclusively in all respects in accordance with the laws of Malaysia. </p>
	<p class="normal">&nbsp;</p>
	<p class="normal">7.<span class="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Nothing in this Letter of Award shall be deemed to create a partnership between NCIA and the Company or entitle either NCIA or the Company to commit or bind the other in any manner other than expressly contained herein. This Letter of Award shall be binding upon the successors-in-title and permitted assigns of NCIA and the Company.</p>
	<p class="normal">&nbsp;</p>
	<p class="normal">8.<span class="tab">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Notwithstanding any provision of this Letter of Award, NCIA may terminate this Agreement by giving not less than one (1) months’ notice if such termination is necessary to adhere to national or public policy.</p>
	<p class="normal">&nbsp;</p>
	<p class="normal">For future communication with NCIA on PENJANANCER matters, please contact PENJANA Helpdesk  at 04-5020708 or email to <a href="mailto:helpdeskpenjana@ncer.com.my" class="text_2">helpdeskpenjana@ncer.com.my</a>.</p>
	<p class="normal">&nbsp;</p>
	<p class="normal">On behalf of the Government of Malaysia we thank you for contributing towards stimulating the economy of Malaysia’s Northern Corridor Economic Region post-COVID 19.<span class="text_3"> </span></p>
	<p class="normal">&nbsp;</p>
	<p class="normal">Thank you.</p>
	<p class="normal">Datuk Seri Jebasingam Issace John</p>
	<p class="normal">Chief Executive</p>
	<p>&nbsp;</p>
	<div style="text-align: center">
	<p class="normal">This is a digital contractual document. Signatories are not required.</p>
	</div>
</div>

</body></html>