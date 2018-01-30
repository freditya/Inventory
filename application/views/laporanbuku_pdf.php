<?php
			$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
			$pdf->SetTitle('Data Buku');
			$pdf->SetHeaderMargin(30);
			$pdf->SetTopMargin(20);
			$pdf->setFooterMargin(20);
			$pdf->SetAutoPageBreak(true);
			$pdf->SetAuthor('Author');
			$pdf->SetDisplayMode('real', 'default');
			$pdf->AddPage();
			$i=0;
			$html='<h3>Daftar Buku</h3>
					<table cellspacing="1" bgcolor="#666666" cellpadding="2">
						<tr bgcolor="#ffffff">
							<th align="center">No</th>
							<th align="center">Kode Buku</th>
							<th align="center">Judul</th>
							<th align="center">Kategori</th>
							<th align="center">Penulis</th>
							<th align="center">Penerbit</th>
							<th align="center">Ukuran</th>
							<th align="center">Jumlah Halaman</th>
							<th align="center">ISBN</th>
							<th align="center">Tahun Terbit</th>
							<th align="center">Harga (Rp)</th>
							<th align="center">Stok</th>
							<th align="center">Keterangan</th>
							<th align="center">Status</th>
						</tr>';
			foreach ($buku as $row) 
				{
					$i++;
					$html.='<tr bgcolor="#ffffff">
							<td align="center">'.$i.'</td>
							<td>'.$row['kd_buku'].'</td>
							<td>'.$row['judul'].'</td>
							<td>'.$row['nama_kategori'].'</td>
							<td>'.$row['nama_penulis'].'</td>
							<td>'.$row['nama_penerbit'].'</td>
							<td>'.$row['ukuran'].'</td>
							<td>'.$row['jml_halaman'].'</td>
							<td>'.$row['isbn'].'</td>
							<td>'.$row['thn_terbit'].'</td>
							<td>'.$row['harga'].'</td>
							<td>'.$row['stok'].'</td>
							<td>'.$row['keterangan'].'</td>
							<td>'.$row['status'].'</td>
						</tr>';
				}
			$html.='</table>';
			$pdf->writeHTML($html, true, false, true, false, '');
			$pdf->Output('Data Buku.pdf', 'I');
?>