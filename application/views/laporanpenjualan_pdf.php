<?php
			$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Data Penjualan');
			$pdf->SetHeaderMargin(30);
			$pdf->SetTopMargin(20);
			$pdf->setFooterMargin(20);
			$pdf->SetAutoPageBreak(true);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$i=0;
			$html='<h3>Daftar Penjualan</h3>
					<table cellspacing="1" bgcolor="#666666" cellpadding="2">
						<tr bgcolor="#ffffff">
							<th width="5%" align="center">No</th>
							<th width="14%" align="center">Kode Penjualan</th>
							<th width="14%" align="center">Distributor</th>
							<th width="13%" align="center">Tanggal</th>
							<th width="28%" align="center">Judul Buku</th>
							<th width="10%" align="center">Harga</th>
							<th width="10%" align="center">Jumlah Jual</th>
							<th width="10%" align="center">Total Harga</th>
							
						</tr>';
			foreach ($penjualan as $row) 
				{
					$i++;
					$html.='<tr bgcolor="#ffffff">
							<td align="center">'.$i.'</td>
							<td align="center">'.$row['kd_penjualan'].'</td>
							<td align="center">'.$row['distributor'].'</td>
							<td align="center">'.$row['tgl_jual'].'</td>
							<td align="center">'.$row['judul'].'</td>
							<td align="center">'.$row['harga'].'</td>
							<td align="center">'.$row['jml_jual'].'</td>
							<td align="center">'.$row['total_harga'].'</td>
							
						</tr>';
				}
			$html.='</table>';
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Data Penjualan.pdf', 'I');
?>