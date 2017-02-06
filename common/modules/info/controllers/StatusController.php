<?php

namespace common\modules\info\controllers;

use yii\web\Controller;
use Yii;
use yii\helpers\Html;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use kartik\mpdf\Pdf;

class StatusController extends Controller {
	// ...
	public function actionIndex () {
		/** @var float $price */
		$item[price] = 1000000123.561;
		echo Html::tag('p',
				Yii::$app->formatter->asCurrency($item[price], 'rub')) . Html::tag(
				'p', Yii::t('app', 'Price: {price, number, currency}', $item)) .
				 Html::tag('p', 'qwe');
	}

	public $layout = '';

	public function actionTest () {
		$objPHPExcel = new \PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()
			->setCreator("Maarten Balliauw")
			->setLastModifiedBy("Maarten Balliauw")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription(
				"Test document for Office 2007 XLSX, generated using PHP classes.")
			->setKeywords("office 2007 openxml php")
			->setCategory("Test result file");

		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Hello')
			->setCellValue('B2', 'world!')
			->setCellValue('C1', 'Hello')
			->setCellValue('D2', 'world!');

		// Miscellaneous glyphs, UTF-8
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A4', 'Miscellaneous glyphs')
			->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

		// Rename worksheet
		$objPHPExcel->getActiveSheet()
			->setTitle('Simple');

		// Set active sheet index to the first sheet, so Excel opens this as
		// the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Excel2007)
		header(
				'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="01simple.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always
		                                                               // modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel,
				'Excel2007');
		$objWriter->save('php://output');
		exit();
	}

	public function actionTest1 () {
		$objPHPExcel = new \PHPExcel();
		$rendererName = \PHPExcel_Settings::PDF_RENDERER_DOMPDF;
		// $rendererLibrary = 'tcPDF5.9';
		// $rendererLibrary = 'mPDF5.4';
		$rendererLibrary = 'dompdf';
		$rendererLibraryPath = Yii::getAlias('@vendor/') . $rendererLibrary;
		echo date('H:i:s'), " Hide grid lines", EOL;
		$objPHPExcel->getActiveSheet()
			->setShowGridLines(false);
		echo date('H:i:s'), " Set orientation to landscape", EOL;
		$objPHPExcel->getActiveSheet()
			->getPageSetup()
			->setOrientation(
				\PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		$objPHPExcel->getProperties()
			->setCreator("Maarten Balliauw")
			->setLastModifiedBy("Maarten Balliauw")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription(
				"Test document for Office 2007 XLSX, generated using PHP classes.")
			->setKeywords("office 2007 openxml php")
			->setCategory("Test result file");

		// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Hello')
			->setCellValue('B2', 'world!')
			->setCellValue('C1', 'Hello')
			->setCellValue('D2', 'world!');

		// Miscellaneous glyphs, UTF-8
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A4', 'Miscellaneous glyphs Василий')
			->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

		$objPHPExcel->getDefaultStyle()
			->getFont()
			->setName('Times')
			->setSize(12); // ->getColor()->setRGB('6F6F6F')

		// Rename worksheet
		$objPHPExcel->getActiveSheet()
			->setTitle('Simple');

		// Set active sheet index to the first sheet, so Excel opens this as
		// the first sheet
		$objPHPExcel->setActiveSheetIndex(0);

		echo date('H:i:s'), " Write to PDF format using {$rendererName}", EOL;
		if (!\PHPExcel_Settings::setPdfRenderer($rendererName,
				$rendererLibraryPath)) {
			die(
					'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
							 EOL .
							 'at the top of this script as appropriate for your directory structure');
		}
		$callStartTime = microtime(true);
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
		$objWriter->setSheetIndex(0);
		$objWriter->set_option('defaultFont', 'Courier');
		$objWriter->save(
				str_replace('.php', '_' . $rendererName . '.pdf', __FILE__));
		$callEndTime = microtime(true);
		$callTime = $callEndTime - $callStartTime;
		echo date('H:i:s'), " File written to ", str_replace('.php',
				'_' . $rendererName . '.pdf',
				pathinfo(__FILE__, PATHINFO_BASENAME)), EOL;
		echo 'Call time to write Workbook was ', sprintf('%.4f', $callTime), " seconds", EOL;
		// Echo memory usage
		echo date('H:i:s'), ' Current memory usage: ', (memory_get_usage(true) /
				 1024 / 1024), " MB", EOL;
		// Echo memory peak usage
		echo date('H:i:s'), " Peak memory usage: ", (memory_get_peak_usage(true) /
				 1024 / 1024), " MB", EOL;
		// Echo done
		echo date('H:i:s'), " Done writing files", EOL;
		echo 'File has been created in ', getcwd(), EOL;
	}

	public function actionTest2 () {
		$source = Yii::getAlias('@runtime/') . 'dogovor.docx';
		//$phpWord = IOFactory::load($source);
		$template = new TemplateProcessor($source);

		$template->setValue('НомерДоговора', 32323232323232);

		$template->saveAs('/tmp/temp.docx'); // Save to temp file
		$phpWord = IOFactory::load('/tmp/temp.docx'); // Read the

		$rendererLibrary = 'dompdf';
		$rendererLibraryPath = Yii::getAlias('@vendor/') . $rendererLibrary;

		Settings::setPdfRendererPath($rendererLibraryPath);
		Settings::setPdfRendererName('DomPDF');

		$xmlWriter = IOFactory::createWriter($phpWord , 'PDF');
		$xmlWriter->save('/tmp/result.pdf');
		                                                            // temp file

		// Do something with the phpWord object ...

	}

	public function actionTest3() {

		$vars = [
				'НомерДоговора' => 123123123,
				'ДеньМесяца' => 22,
				'Месяц' => 12,
		];

    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
        'mode' => Pdf::MODE_UTF8,
        // A4 paper format
        'format' => Pdf::FORMAT_A4,
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT,
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER,
        // your html content input
        'content' => Yii::t('app', file_get_contents(Yii::getAlias('@runtime/') . 'dogovor-orig.html'), $vars),
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting
//        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => 'body{font-family: times, times new roman; font-size: 9pt; hyphens: auto;}',
         // set mPDF properties on the fly
        'options' => ['title' => 'Заголовок Krajee Report Title'],
         // call mPDF methods on the fly
        'methods' => [
            'SetHeader'=>['Договор № 1212 ваыва Krajee Report Header'],
            'SetFooter'=>['Стр. {PAGENO}'],
        ]
    ]);

/*     $pdf->api->SHYlang = 'ru';
    $pdf->api->SHYleftmin = 4;
    $pdf->api->SHYrightmin = 4;
    $pdf->api->SHYcharmin = 2;
 */
    return $pdf->render();

	}
}

?>
