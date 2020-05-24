<?php
      use \setasign\Fpdi\PdfParser\StreamReader;
      $pdf = new Pdf();
      $fileContent = file_get_contents(base_url().'assets/files/cert.pdf','rb');
      $pdf->setSourceFile(StreamReader::createByString($fileContent));
      $tplIdx = $pdf->importPage(1);
      $pdf->addPage('L');
      $pdf->useTemplate($tplIdx);
      $pdf->SetFont('Helvetica', 'B', 20);
      $pdf->SetAuthor('Author');
      $pdf->SetDisplayMode('real', 'default');
      $pdf->SetTextColor(104, 76, 143);
      $pdf->SetXY(95, 35);
      //$pdf->Write(55, 'RAINER GUTIERREZ ARGANDOÑA');
      $html = '<p style="text-align: center">RAINER GUTIERREZ ARGANDOÑA LOPEZ</p>';
      $pdf->writeHTMLCell($w = 0, $h = 0, $x = '0', $y = '58', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
      //$pdf->Write(15, $pdf->getPageWidth());
      ob_end_clean();
      $pdf->SetAutoPageBreak(TRUE, 0);
      $style = array(
            'border' => 1,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );
      $codigo = 'https://dgtic.minedu.gob.bo/inscripcion/verificar/12345';
      //$pdf->write2DBarcode($codigo, 'QRCODE,H', 15, 170, 30, 30, $style, 'N');//Derecha
      $pdf->write2DBarcode($codigo, 'QRCODE,H', 15, 170, 30, 30, $style, 'N');//Izquierda
      $pdf->Output('My-File-Name.pdf', 'I');
      //$pdf->setSourceFile();
      /*77777$pdf->tplId = $pdf->importPage(1);
      $pdf->SetTitle('My Title');
      $pdf->SetHeaderMargin(30);
      $pdf->SetTopMargin(20);
      $pdf->setFooterMargin(20);
      $pdf->SetAutoPageBreak(true);
      $pdf->SetAuthor('Author');
      $pdf->SetDisplayMode('real', 'default');
      $pdf->AddPage();
      $pdf->Write(5, 'Some sample text');
      $pdf->Output('My-File-Name.pdf', 'I');*////
      /*
      $file = fopen(base_url().'assets/files/miarch.pdf','rb');
      $pdf = new Pdf();
      $pdf->AddPage();
      $pdf->setSourceFile(new StreamReader($file));
      $tplIdx = $pdf->importPage(1);
      $pdf->useTemplate($tplIdx, 10, 10, 100);
      $pdf->SetFont('Helvetica');
      $pdf->SetTextColor(255, 0, 0);
      $pdf->SetXY(30, 30);
      $pdf->Write(0, 'This is just a simple text');
      $pdf->Output();*/
?>
