<?php
require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
	public function generate($html, $filename = '', $paper = '', $orientation = '', $stream = TRUE)
	{
		$options = new Options();
		$options->set('isRemoteEnabled', TRUE);
		$options->set('enable_remote', TRUE);
		$dompdf = new Dompdf($options);
		$dompdf->loadHtml($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
		if ($stream) {
			$dompdf->stream($filename . ".pdf", array("Attachment" => 0));
		} else {
			return $dompdf->output();
		}
	}
}
