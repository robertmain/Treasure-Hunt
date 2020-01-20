<?php

use App\Core\Admin_Controller;
use Exceptions\Http\Client\BadRequestException;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Admin_treasure extends Admin_Controller
{
    /**
     * @var number
     */
    private static $FONT_SIZE_SMALL = 11;

    /**
     * @var number
     */
    private static $FONT_SIZE_LARGE = 20;

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Treasure']);
    }

    public function index()
    {
        $this->data['allTreasure'] = $this->Treasure->getAllAndLast();
        $this->render('partials::admin/treasure/index', $this->data);
    }

    public function add()
    {
        $this->render('partials::admin/treasure/add');
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Treasure Title', 'trim|required');
        $this->form_validation->set_rules('location', 'Treasure Location', 'trim|required');
        $this->form_validation->set_rules('text', 'Treasure Text', 'trim');
        $this->form_validation->set_rules('clue', 'Treasure Clue', 'trim');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if ($this->form_validation->run() == false) {
            $this->render('partials::admin/treasure/index');
        } else {
            $newTreasureID = $this->Treasure->save([
                'title' => $this->input->post('title'),
                'location' => $this->input->post('location'),
                'text' => $this->input->post('text'),
                'clue' => $this->input->post('clue')
            ]);
            $this->Treasure->save([
                'md5' => md5($newTreasureID),
            ], $newTreasureID);
            redirect('admin/treasure');
        }
    }

    public function delete($treasureId)
    {
        $this->data['Treasure'] = $this->Treasure->get($treasureId);
        $this->render('partials::admin/treasure/delete', $this->data);
    }

    public function remove($treasureId)
    {
        $this->Treasure->delete($treasureId);
        redirect('admin/treasure');
    }

    public function edit($treasureId)
    {
        $this->data['Treasure'] = $this->Treasure->get($treasureId);
        $this->render('partials::admin/treasure/edit', $this->data);
    }

    public function update()
    {
        $this->Treasure->save([
            'title'=>$this->input->post('title'),
            'location'=>$this->input->post('location'),
            'clue'=>$this->input->post('clue'),
            'text'=>$this->input->post('text')
        ], $this->input->post('id'));
        redirect('admin/treasure');
    }

    public function view($id, $format = 'html')
    {
        $this->data['Treasure'] = $this->Treasure->get($id);

        if ($format === 'html') {
            $this->render('partials::admin/treasure/view', $this->data);
        } elseif ($format === 'pdf') {
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'letter', true, 'UTF-8', false);

            $pdf->SetCreator(APP_OWNER);
            $pdf->SetTitle($this->data['Treasure']->title);
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->setImageScale(1);
            $pdf->AddPage();

            $pdf->SetFontSize(36);
            $pdf->SetTextColor(80, 80, 80);
            $pdf->MultiCell(null, 20, APP_TITLE, false, 'C', false, 1);
            $pdf->SetFontSize(11);
            $qrStyle = [
                'border' => 1,
                'vpadding' => 'auto',
                'hpadding' => 'auto',
                'position' => 'C',
            ];
            $pdf->write2DBarcode(base_url('treasure/find/'. $id), 'QRCODE,H', 0, 65, 85, 85, $qrStyle);
            $pdf->Ln();

            $pdf->SetFontSize(self::$FONT_SIZE_LARGE);
            $pdf->Ln(120);
            $pdf->MultiCell(0, 5, 'What Is This?', 0, null, 0, 1, '', '');
            $pdf->setCellPaddings(1, 3, 10, 1);
            $pdf->SetFontSize(self::$FONT_SIZE_SMALL);
            $pdf->MultiCell(
                90,
                20,
                'A QR Code (or "Quick Response" Code) is a type of barcode that can be read by a smartphone or dedicated'
                . ' QR Code reader. QR codes are used as a means of sharing links between devices. In this case, they'
                . ' are used as links to treasure hunt items.',
                0,
                'L',
                0,
                0
            );
            $pdf->MultiCell(
                90,
                20,
                'In this case, they are used as links unique items of treasure in this treasure hunt.' . PHP_EOL
                . PHP_EOL
                . 'To get started, simply download a QR Code reader for your phone and scan barcodes like this one',
                0,
                'L',
                0,
                1
            );

            $pdf->writeHTMLCell(0, 0, null, null, '<h2>QR Code Readers</h2>', 0, 1);

            $pdf->setListIndentWidth(7);
            $pdf->writeHTMLCell(90, 0, null, null, '<h4>iOS</h4>
            <ul>
                <li>iOSCamera App</li>
                <li>QR Reader</li>
                <li>QR App</li>
            </ul>');
            $pdf->writeHTMLCell(90, 0, null, null, '<h4>Android</h4>
            <ul>
                <li>Google Lens</li>
                <li>Barcode Scanner</li>
                <li>Red Laser</li>
            </ul>');

            $pdf->setY($pdf->getPageHeight() - 28);
            $pdf->writeHTMLCell(0, 0, null, null, '&copy; ' . APP_OWNER . ' ' . date('Y'));

            $pdf->Output($this->data['Treasure']->title . '.pdf', 'I');
        } else {
            throw new BadRequestException('Unknown output renderer ' . $format);
        }
    }
}
