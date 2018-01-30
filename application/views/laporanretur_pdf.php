<?php
			$pdf = new Pdf('l', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Data Retur');
			$pdf->SetHeaderMargin(30);
			$pdf->SetTopMargin(20);
			$pdf->setFooterMargin(20);
			$pdf->SetAutoPageBreak(true);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$i=0;
			$html='<h3>Daftar Retur</h3>
					<table cellspacing="1" bgcolor="#666666" cellpadding="2">
						<tr bgcolor="#ffffff">
							<th width="5%" align="center">No</th>
							<th width="10%" align="center">Kode Retur</th>
							<th width="14%" align="center">Distributor</th>
							<th width="13%" align="center">Tanggal</th>
							<th width="23%" align="center">Judul Buku</th>
							<th width="10%" align="center">Jumlah</th>
							<th width="25%" align="center">Keterangan</th>
							
						</tr>';
			foreach ($retur as $row) 
				{
					$i++;
					$html.='<tr bgcolor="#ffffff">
							<td align="center">'.$i.'</td>
							<td>'.$row['kd_retur'].'</td>
							<td>'.$row['distributor'].'</td>
							<td>'.$row['tgl_retur'].'</td>
							<td>'.$row['judul'].'</td>
							<td>'.$row['jml_retur'].'</td>
							<td>'.$row['keterangan'].'</td>
							
						</tr>';
				}
			$html.='</table>';
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Data Retur.pdf', 'I');
?>