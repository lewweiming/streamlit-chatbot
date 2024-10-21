<?php

# Load Namespace
use Dompdf\Dompdf;

class CarRentalsReceipt extends Model
{
    const PDF_TEMPLATE_PATH = 'tr-car-rentals/views/pdf';
    const PDF_TEMPLATE = 'car_rentals_receipt';
    const PDF_OUTPUT_FILENAME = "car_rentals_receipt";
    const RECEIPTS_STORAGE_RELATIVE = 'modules/tr-car-rentals/receipts';
    // public static $store_config = ['timeout' => false];
    // private const STORAGE_RELATIVE_PATH  = '/modules/ads/assets/images';
    
    public static function all()
    {
        $rows = parent::$db->table('car_rentals_receipts')->getAll();

        return $rows;
    }

    // Generates a unique numeric based receipt number. I.e 169667091762 (time series)
    private static function generateReceiptNumber()
    {
        // Generate a unique ID based on the current time in microseconds
        $uniqid =  (string)hexdec(uniqid());

        return $uniqid;
    }

    // Stream a PDF for viewing by manager
    public static function streamPDF($receipt_number)
    {
        $filename = self::PDF_OUTPUT_FILENAME . '_' . $receipt_number. '.pdf';
        $filepath = $_SERVER['DOCUMENT_ROOT'] . self::RECEIPTS_STORAGE_RELATIVE . '/' . $filename;

        // Set headers to force download
        // Check if the file exists
        if (file_exists($filepath)) {
            // Set headers to view the PDF in the browser
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename="' . basename($filepath) . '"'); // Change 'attachment' to 'inline'
            header('Content-Length: ' . filesize($filepath));

            // Read the file and output it to the browser
            readfile($filepath);
            exit;
        } else {
            // Handle the error if the file doesn't exist
            echo "File not found.";
        }
    }

    // Creates and stores a receipt as pdf for managers/users to download
    // Necessary to generate PDF receipts before hand for users to download the receipt
    private static function generatePDF($receipt_id)
    {

        # Get Params from Receipt
        $receipt = (array) self::find($receipt_id);

        ## Init Twig
        $twig = Twig::getTwig();

        # Get HTML
        $template_path = self::PDF_TEMPLATE_PATH;
        $template = self::PDF_TEMPLATE;
        $output = self::PDF_OUTPUT_FILENAME;
        $html = $twig->render("$template_path/$template.html", $receipt);

        ## Save HTML as PDF
        $filename = self::PDF_OUTPUT_FILENAME . '_' . $receipt['receipt_number']. '.pdf';
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . self::RECEIPTS_STORAGE_RELATIVE . '/' . $filename, $output);

        return;
    }
    
    public static function generateNewReceipt($booking_id, $cashier_payment_id, $pdf_receipt = true)
    {
        // Obtain all parameters required for the receipt
        $booking = CarRentalsBooking::find($booking_id);
        $payment = CashierReceipt::find($cashier_payment_id);
        $duration = CarRentalCostCalculator::calculateRentalDuration($booking->start_date, $booking->end_date);

        $payload = [
            'receipt_number' => self::generateReceiptNumber(),
            // 'receipt_date' => '', // Unused
            'customer_name' => $booking->customer_name,
            'customer_email' => $booking->customer_email,
            'customer_phone' => $booking->customer_phone,
            'car_model' => $booking->car_model,
            'pickup_date' => $booking->start_date,
            'return_date' => $booking->end_date,
            'pickup_location' => $booking->pickup_location,
            'return_location' => $booking->return_location,
            'rental_days' => $duration,
            // 'rental_fee' => '',
            // 'insurance_fee' => '',
            // 'gps_fee' => '',
            'subtotal' => $payment->amount,
            'tax' => 0,
            'total_amount' => $payment->amount,
            'payment_method' => $payment->payment_type,
            // 'card_last_four' => '',
        ];

        $lastId = self::insert($payload);

        // OPTIONALLY GENERATE PDF RECEIPT FOR FUTURE DOWNLOADS
        if($pdf_receipt == true) {

            self::generatePDF($lastId);
        }

        return $lastId;
    }

    public static function findByTitle($title)
    {
        $result = parent::$db->table('car_rentals_receipts')->where('title', $title)->get();

        return $result;
    }

    public static function fetchContext()
    {
        $results = parent::$db->select('id, title')->table('car_rentals_receipts')->getAll();

        return $results;
    }

    public static function insert($payload)
    {
        parent::$db->table('car_rentals_receipts')->insert($payload);

        $lastId = parent::$db->insertId();

        return $lastId;
    }

    public static function update($id, $payload)
    {
        parent::$db->table('car_rentals_receipts')->where('id', $id)->update($payload);
    }

    public static function delete($id)
    {
        parent::$db->table('car_rentals_receipts')->where('id', $id)->delete();
    }

    public static function find($id)
    {
        $result = parent::$db->table('car_rentals_receipts')->where('receipt_id', $id)->get();

        return $result;
    }
}

?>