<?php 

/*
$vc0 = "SELECT      
			*, 
			SUM(aging44) as aging55, 
			COUNT(idc) as count55, 
			(SUM(aging44)/COUNT(idc)) as sum1 
		FROM (
			SELECT 
				*, 
				(   
					CASE WHEN (dispo <= 0) THEN datediff(bais, creates) 
					ELSE datediff(bais, dispos) 
					END
				) as aging44 
			FROM ( 
				SELECT 
					cc.v_name as vname,
					aa.c_id as idc, 
					aa.c_pa_node_id,
					aa.c_created_date AS creates, 
					aa.c_dispo_date AS dispos, 
					bb.p_bai_date AS bais, 
					bb.p_status as stat, 
					datediff(bb.p_bai_date, aa.c_created_date) as createss,
					datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
				FROM m_crm2 aa 
				LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
				LEFT JOIN m_vendor cc ON bb.p_v_id=cc.v_id
				WHERE (bb.p_status IN (51)
				OR bb.p_bai_date IS NOT NULL)
				AND bb.p_v_id IS NOT NULL
				AND bb.p_v_id <> 0
				-- AND bb.p_v_id = 6
			) y
		) x
		GROUP BY vname";

$vp0 = "SELECT      
			*, 
			SUM(aging44) as aging55, 
			COUNT(idc) as count55, 
			(SUM(aging44)/COUNT(idc)) as sum1 
		FROM (
			SELECT 
				*, 
				(   
					CASE WHEN (dispos IS NULL) THEN datediff(now(), creates) 
					ELSE datediff(now(), dispos) 
					END
				) as aging44 
			FROM ( 
				SELECT 
					cc.v_name as vname,
					aa.c_id as idc, 
					aa.c_pa_node_id,
					aa.c_created_date AS creates, 
					aa.c_dispo_date AS dispos,
					bb.p_status as stat
				FROM m_crm2 aa 
				LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
				LEFT JOIN m_vendor cc ON bb.p_v_id=cc.v_id
				WHERE (bb.p_status NOT IN (51, 61)
				OR bb.p_bai_date IS NOT NULL)
				AND bb.p_v_id IS NOT NULL
				AND bb.p_v_id <> 0
				-- AND bb.p_v_id = 6
			) y
		) x
		GROUP BY vname";
*/


$vc0 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) 
					-- AND v_id = 5
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$vp0 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id <> 5
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";



$qp0    = mysqli_query($konek, $vp0);
$qc0    = mysqli_query($konek, $vc0);

$rp0    = mysqli_num_rows($qp0);
$rc0    = mysqli_num_rows($qc0);


while($tp0 = mysqli_fetch_array($qp0)){
	$ii[] = $tp0['count55'];
	$jj[] = $tp0['aging55'];
}

while($tc0 = mysqli_fetch_array($qc0)){
	$kk[] = $tc0['count55'];
	$ll[] = $tc0['aging55'];
}

$sp0 = array_sum($jj) / array_sum($ii);
$sc0 = array_sum($ll) / array_sum($kk);



/*
$vc5 = "SELECT      
			*, 
			SUM(aging44) as aging55, 
			COUNT(idc) as count55, 
			(SUM(aging44)/COUNT(idc)) as sum1 
		FROM (
			SELECT 
				*, 
				(   
					CASE WHEN (dispo <= 0) THEN datediff(bais, creates) 
					ELSE datediff(bais, dispos) 
					END
				) as aging44 
			FROM ( 
				SELECT 
					cc.v_name as vname,
					aa.c_id as idc, 
					aa.c_pa_node_id,
					aa.c_created_date AS creates, 
					aa.c_dispo_date AS dispos, 
					bb.p_bai_date AS bais, 
					bb.p_status as stat, 
					datediff(bb.p_bai_date, aa.c_created_date) as createss,
					datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
				FROM m_crm2 aa 
				LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
				LEFT JOIN m_vendor cc ON bb.p_v_id=cc.v_id
				WHERE (bb.p_status IN (51)
				OR bb.p_bai_date IS NOT NULL)
				AND bb.p_v_id = 5
			) y
		) x
		GROUP BY vname";
*/

$vc5 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 5
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";

$qc5    = mysqli_query($konek, $vc5);
$tc5 	= mysqli_fetch_array($qc5);
$sc5 	= $tc5['sum1'];
$nv5	= $tc5['v_name'];



/*
$vc6 = "SELECT      
			*, 
			SUM(aging44) as aging55, 
			COUNT(idc) as count55, 
			(SUM(aging44)/COUNT(idc)) as sum1 
		FROM (
			SELECT 
				*, 
				(   
					CASE WHEN (dispo <= 0) THEN datediff(bais, creates) 
					ELSE datediff(bais, dispos) 
					END
				) as aging44 
			FROM ( 
				SELECT 
					cc.v_name as vname,
					aa.c_id as idc, 
					aa.c_pa_node_id,
					aa.c_created_date AS creates, 
					aa.c_dispo_date AS dispos, 
					bb.p_bai_date AS bais, 
					bb.p_status as stat, 
					datediff(bb.p_bai_date, aa.c_created_date) as createss,
					datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
				FROM m_crm2 aa 
				LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
				LEFT JOIN m_vendor cc ON bb.p_v_id=cc.v_id
				WHERE bb.p_status IN (51)
				AND bb.p_v_id = 6
			) y
		) x
		GROUP BY vname";
*/

$vc6 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
	SELECT * FROM (
		SELECT 
			v_name, 
			r_p_id, 
			MIN(r_input_date) AS Column1, 
			MAX(r_input_date) AS Column2,
			datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
		FROM m_progress
		LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
		LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
		WHERE 
			r_p_status IN (12,35) AND 
			(p_status = 51 or r_p_status = 51) AND 
			(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
			v_id = 6
		GROUP BY r_p_id
	) A
	where aging44 <> 0
) B
WHERE v_name IS NOT NULL
GROUP BY 
	v_name
ORDER BY count55 DESC";


$qc6    = mysqli_query($konek, $vc6);
$tc6 	= mysqli_fetch_array($qc6);
$sc6 	= $tc6['sum1'];
$nv6 	= $tc6['v_name'];



/*
$vc7 = "SELECT      
			*, 
			SUM(aging44) as aging55, 
			COUNT(idc) as count55, 
			(SUM(aging44)/COUNT(idc)) as sum1 
		FROM (
			SELECT 
				*, 
				(   
					CASE WHEN (dispo <= 0) THEN datediff(bais, creates) 
					ELSE datediff(bais, dispos) 
					END
				) as aging44 
			FROM ( 
				SELECT 
					cc.v_name as vname,
					aa.c_id as idc, 
					aa.c_pa_node_id,
					aa.c_created_date AS creates, 
					aa.c_dispo_date AS dispos, 
					bb.p_bai_date AS bais, 
					bb.p_status as stat, 
					datediff(bb.p_bai_date, aa.c_created_date) as createss,
					datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
				FROM m_crm2 aa 
				LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
				LEFT JOIN m_vendor cc ON bb.p_v_id=cc.v_id
				WHERE bb.p_status IN (51)
				AND bb.p_v_id = 7
			) y
		) x
		GROUP BY vname";
*/

$vc7 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 7
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc7    = mysqli_query($konek, $vc7);
$tc7 	= mysqli_fetch_array($qc7);
$sc7 	= $tc7['sum1'];
$nv7 	= $tc7['v_name'];




/*
$vc9 = "SELECT      
			*, 
			SUM(aging44) as aging55, 
			COUNT(idc) as count55, 
			(SUM(aging44)/COUNT(idc)) as sum1 
		FROM (
			SELECT 
				*, 
				(   
					CASE WHEN (dispo <= 0) THEN datediff(bais, creates) 
					ELSE datediff(bais, dispos) 
					END
				) as aging44 
			FROM ( 
				SELECT 
					cc.v_name as vname,
					aa.c_id as idc, 
					aa.c_pa_node_id,
					aa.c_created_date AS creates, 
					aa.c_dispo_date AS dispos, 
					bb.p_bai_date AS bais, 
					bb.p_status as stat, 
					datediff(bb.p_bai_date, aa.c_created_date) as createss,
					datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
				FROM m_crm2 aa 
				LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
				LEFT JOIN m_vendor cc ON bb.p_v_id=cc.v_id
				WHERE bb.p_status IN (51)
				AND bb.p_v_id = 9
			) y
		) x
		GROUP BY vname";
*/

$vc9 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
	SELECT * FROM (
		SELECT 
			v_name, 
			r_p_id, 
			MIN(r_input_date) AS Column1, 
			MAX(r_input_date) AS Column2,
			datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
		FROM m_progress
		LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
		LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
		WHERE 
			r_p_status IN (12,35) AND 
			(p_status = 51 or r_p_status = 51) AND 
			(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
			v_id = 9
		GROUP BY r_p_id
	) A
	where aging44 <> 0
) B
WHERE v_name IS NOT NULL
GROUP BY 
	v_name
ORDER BY count55 DESC";

$qc9    = mysqli_query($konek, $vc9);
$tc9 	= mysqli_fetch_array($qc9);
$sc9 	= $tc9['sum1'];
$nv9 	= $tc9['v_name'];


/*
$vc10 = "SELECT      
			*, 
			SUM(aging44) as aging55, 
			COUNT(idc) as count55, 
			(SUM(aging44)/COUNT(idc)) as sum1 
		FROM (
			SELECT 
				*, 
				(   
					CASE WHEN (dispo <= 0) THEN datediff(bais, creates) 
					ELSE datediff(bais, dispos) 
					END
				) as aging44 
			FROM ( 
				SELECT 
					cc.v_name as vname,
					aa.c_id as idc, 
					aa.c_pa_node_id,
					aa.c_created_date AS creates, 
					aa.c_dispo_date AS dispos, 
					bb.p_bai_date AS bais, 
					bb.p_status as stat, 
					datediff(bb.p_bai_date, aa.c_created_date) as createss,
					datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
				FROM m_crm2 aa 
				LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
				LEFT JOIN m_vendor cc ON bb.p_v_id=cc.v_id
				WHERE bb.p_status IN (51)
				AND bb.p_v_id = 10
			) y
		) x
		GROUP BY vname";
*/


$vc10 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
	SELECT * FROM (
		SELECT 
			v_name, 
			r_p_id, 
			MIN(r_input_date) AS Column1, 
			MAX(r_input_date) AS Column2,
			datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
		FROM m_progress
		LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
		LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
		WHERE 
			r_p_status IN (12,35) AND 
			(p_status = 51 or r_p_status = 51) AND 
			(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
			v_id = 10
		GROUP BY r_p_id
	) A
	where aging44 <> 0
) B
WHERE v_name IS NOT NULL
GROUP BY 
	v_name
ORDER BY count55 DESC";

$qc10    = mysqli_query($konek, $vc10);
$tc10 	= mysqli_fetch_array($qc10);
$sc10 	= $tc10['sum1'];
$nv10 	= $tc10['v_name'];


/*
$vc11 = "SELECT      
			*, 
			SUM(aging44) as aging55, 
			COUNT(idc) as count55, 
			(SUM(aging44)/COUNT(idc)) as sum1 
		FROM (
			SELECT 
				*, 
				(   
					CASE WHEN (dispo <= 0) THEN datediff(bais, creates) 
					ELSE datediff(bais, dispos) 
					END
				) as aging44 
			FROM ( 
				SELECT 
					cc.v_name as vname,
					aa.c_id as idc, 
					aa.c_pa_node_id,
					aa.c_created_date AS creates, 
					aa.c_dispo_date AS dispos, 
					bb.p_bai_date AS bais, 
					bb.p_status as stat, 
					datediff(bb.p_bai_date, aa.c_created_date) as createss,
					datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
				FROM m_crm2 aa 
				LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
				LEFT JOIN m_vendor cc ON bb.p_v_id=cc.v_id
				WHERE bb.p_status IN (51)
				AND bb.p_v_id = 11
			) y
		) x
		GROUP BY vname";
*/

$vc11 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
	SELECT * FROM (
		SELECT 
			v_name, 
			r_p_id, 
			MIN(r_input_date) AS Column1, 
			MAX(r_input_date) AS Column2,
			datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
		FROM m_progress
		LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
		LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
		WHERE 
			r_p_status IN (12,35) AND 
			(p_status = 51 or r_p_status = 51) AND 
			(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
			v_id = 11
		GROUP BY r_p_id
	) A
	where aging44 <> 0
) B
WHERE v_name IS NOT NULL
GROUP BY 
	v_name
ORDER BY count55 DESC";

$qc11    = mysqli_query($konek, $vc11);
$tc11 	= mysqli_fetch_array($qc11);
$sc11 	= $tc11['sum1'];
$nv11 	= $tc11['v_name'];



/*
$vc12 = "SELECT      
			*, 
			SUM(aging44) as aging55, 
			COUNT(idc) as count55, 
			(SUM(aging44)/COUNT(idc)) as sum1 
		FROM (
			SELECT 
				*, 
				(   
					CASE WHEN (dispo <= 0) THEN datediff(bais, creates) 
					ELSE datediff(bais, dispos) 
					END
				) as aging44 
			FROM ( 
				SELECT 
					cc.v_name as vname,
					aa.c_id as idc, 
					aa.c_pa_node_id,
					aa.c_created_date AS creates, 
					aa.c_dispo_date AS dispos, 
					bb.p_bai_date AS bais, 
					bb.p_status as stat, 
					datediff(bb.p_bai_date, aa.c_created_date) as createss,
					datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
				FROM m_crm2 aa 
				LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
				LEFT JOIN m_vendor cc ON bb.p_v_id=cc.v_id
				WHERE bb.p_status IN (51)
				AND bb.p_v_id = 12
			) y
		) x
		GROUP BY vname";
*/

$vc12 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 12
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc12    = mysqli_query($konek, $vc12);
$tc12 	= mysqli_fetch_array($qc12);
$sc12 	= $tc12['sum1'];
$nv12 	= $tc12['v_name'];



$vc13 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
	SELECT * FROM (
		SELECT 
			v_name, 
			r_p_id, 
			MIN(r_input_date) AS Column1, 
			MAX(r_input_date) AS Column2,
			datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
		FROM m_progress
		LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
		LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
		WHERE 
			r_p_status IN (12,35) AND 
			(p_status = 51 or r_p_status = 51) AND 
			(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
			v_id = 13
		GROUP BY r_p_id
	) A
	where aging44 <> 0
) B
WHERE v_name IS NOT NULL
GROUP BY 
	v_name
ORDER BY count55 DESC";


$qc13    = mysqli_query($konek, $vc13);
$tc13 	= mysqli_fetch_array($qc13);
$sc13 	= $tc13['sum1'];
$nv13 	= $tc13['v_name'];



$vc14 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 14
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc14    = mysqli_query($konek, $vc14);
$tc14 	= mysqli_fetch_array($qc14);
$sc14 	= $tc14['sum1'];
$nv14 	= $tc14['v_name'];



$vc15 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 15
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc15    = mysqli_query($konek, $vc15);
$tc15 	= mysqli_fetch_array($qc15);
$sc15 	= $tc15['sum1'];
$nv15 	= $tc15['v_name'];




$vc16 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 16
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc16    = mysqli_query($konek, $vc16);
$tc16 	= mysqli_fetch_array($qc16);
$sc16 	= $tc16['sum1'];
$nv16 	= $tc16['v_name'];




$vc17 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 17
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc17    = mysqli_query($konek, $vc17);
$tc17 	= mysqli_fetch_array($qc17);
$sc17 	= $tc17['sum1'];
$nv17 	= $tc17['v_name'];



$vc18 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 18
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc18   = mysqli_query($konek, $vc18);
$tc18 	= mysqli_fetch_array($qc18);
$sc18 	= $tc18['sum1'];
$nv18 	= $tc18['v_name'];


$vc19 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 19
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc19    = mysqli_query($konek, $vc19);
$tc19 	= mysqli_fetch_array($qc19);
$sc19 	= $tc13['sum1'];
$nv19 	= $tc13['v_name'];



$vc20 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 20
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc20    = mysqli_query($konek, $vc20);
$tc20 	= mysqli_fetch_array($qc20);
$sc20 	= $tc20['sum1'];
$nv20 	= $tc20['v_name'];




$vc21 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					-- (p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 21
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc21   = mysqli_query($konek, $vc21);
$tc21 	= mysqli_fetch_array($qc21);
$sc21 	= $tc21['sum1'];
$nv21 	= $tc21['v_name'];


$vc22 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 22
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc22    = mysqli_query($konek, $vc22);
$tc22 	= mysqli_fetch_array($qc22);
$sc22 	= $tc22['sum1'];
$nv22 	= $tc22['v_name'];




$vc23 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 23
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc23   = mysqli_query($konek, $vc23);
$tc23 	= mysqli_fetch_array($qc23);
$sc23 	= $tc23['sum1'];
$nv23 	= $tc23['v_name'];



$vc24 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 24
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc24   = mysqli_query($konek, $vc24);
$tc24 	= mysqli_fetch_array($qc24);
$sc24 	= $tc24['sum1'];
$nv24 	= $tc24['v_name'];


$vc25 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 25
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc25   = mysqli_query($konek, $vc25);
$tc25 	= mysqli_fetch_array($qc25);
$sc25 	= $tc25['sum1'];
$nv25 	= $tc25['v_name'];


$vc26 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 26
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc26   = mysqli_query($konek, $vc26);
$tc26 	= mysqli_fetch_array($qc26);
$sc26 	= $tc26['sum1'];
$nv26 	= $tc26['v_name'];



$vc27 = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
			SELECT * FROM (
				SELECT 
					v_name, 
					r_p_id, 
					MIN(r_input_date) AS Column1, 
					MAX(r_input_date) AS Column2,
					datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
				FROM m_progress
				LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
				LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
				WHERE 
					r_p_status IN (12,35) AND 
					(p_status = 51 or r_p_status = 51) AND 
					(m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
					v_id = 27
				GROUP BY r_p_id
			) A
			where aging44 <> 0
		) B
		WHERE v_name IS NOT NULL
		GROUP BY 
			v_name
		ORDER BY count55 DESC";


$qc27   = mysqli_query($konek, $vc27);
$tc27 	= mysqli_fetch_array($qc27);
$sc27 	= $tc27['sum1'];
$nv27 	= $tc27['v_name'];


?>