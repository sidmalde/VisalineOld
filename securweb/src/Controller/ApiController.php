<?php
// declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\EventInterface;


use App\Controller\Component\CertificateComponent;

/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class ApiController extends AppController
{

    var $testCSR = '-----BEGIN CERTIFICATE REQUEST-----
MIICuDCCAaACAQAwczELMAkGA1UEBhMCR0IxDzANBgNVBAgMBkxvbmRvbjEPMA0G
A1UEBwwGTG9uZG9uMRgwFgYDVQQKDA9WaXNhbGluZSBUcmF2ZWwxCzAJBgNVBAsM
AklUMRswGQYDVQQDDBJ3d3cudmlzYWxpbmUuY28udWswggEiMA0GCSqGSIb3DQEB
AQUAA4IBDwAwggEKAoIBAQDfg8+PH2wozzikoBcxEGugsJvv811qkTMzXVOczCog
lD6J5aM4j4qqjh2f6bkZE0YqDY+WCGmI6hf+uHrB595kKi8y22ChlbMYHktwp1VE
V+6WgD3gkWM5wgQ2N4k2lLWSUgfPICVuQpKXgEjm32fn9nUol5OEw32gTQedtQpR
EFNslkgCDd3l0Swxc833yRKYzeATYJX0QQ0d67dzhNU76L5AC9tdpN+hlS0joScK
NpUb0JDIlAWGSLsDv2PjNFLa7SfaIFgUWWoMADvMG/dRr+m74SiQ2EeWIMh9oF5h
P1h7GbmnPtAfll3K0EcSWRSM2vLiZ6ToPOYy+hq/49M9AgMBAAGgADANBgkqhkiG
9w0BAQsFAAOCAQEAT9DV7Ce16Fi9tGoc8TXcSwERGy1Z0tSt2WWChHOMZhwb4/jv
VFWKQLao+zoQadCqjfwzvi4r/DjzAzcXVzsFHHhpRXtetRy7CsL8JfNKjKQ5mpyI
r1PYNAun5KLiAFIQdioLcEnWxpjLCPhbOEhcctJ3E7D+dYZKIeJgatVlFq+1oWip
pYxl6zgLPE9X9S4h6S9ukd/o2ZiIHQB1iXJExPOhVPLgPb0fIIS1vtrdX7ksr0TC
itq4lstyr12UgcRSTOXfT+r9XSv9NpMZUDeLbNdV0wrGsTvUqhn7yaVY0pF1TycB
ublrvB4P9CjZD0Ez7Adp8kEA+lzOtp+yKCt4SA==
-----END CERTIFICATE REQUEST-----';

    var $testCert = '-----BEGIN CERTIFICATE-----
MIIGOjCCBSKgAwIBAgIQBiCxi21IaP+z14aa42cvoTANBgkqhkiG9w0BAQsFADBe
MQswCQYDVQQGEwJVUzEVMBMGA1UEChMMRGlnaUNlcnQgSW5jMRkwFwYDVQQLExB3
d3cuZGlnaWNlcnQuY29tMR0wGwYDVQQDExRSYXBpZFNTTCBSU0EgQ0EgMjAxODAe
Fw0xOTAxMTUwMDAwMDBaFw0yMTAxMTQxMjAwMDBaMB0xGzAZBgNVBAMTEnd3dy52
aXNhbGluZS5jby51azCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAN+D
z48fbCjPOKSgFzEQa6Cwm+/zXWqRMzNdU5zMKiCUPonloziPiqqOHZ/puRkTRioN
j5YIaYjqF/64esHn3mQqLzLbYKGVsxgeS3CnVURX7paAPeCRYznCBDY3iTaUtZJS
B88gJW5CkpeASObfZ+f2dSiXk4TDfaBNB521ClEQU2yWSAIN3eXRLDFzzffJEpjN
4BNglfRBDR3rt3OE1TvovkAL212k36GVLSOhJwo2lRvQkMiUBYZIuwO/Y+M0Utrt
J9ogWBRZagwAO8wb91Gv6bvhKJDYR5YgyH2gXmE/WHsZuac+0B+WXcrQRxJZFIza
8uJnpOg85jL6Gr/j0z0CAwEAAaOCAzMwggMvMB8GA1UdIwQYMBaAFFPKF1n8a8AD
IS8aruSqqByCVtp1MB0GA1UdDgQWBBTERQNM2DZTw1XZbCzjb+awvs5mvTAtBgNV
HREEJjAkghJ3d3cudmlzYWxpbmUuY28udWuCDnZpc2FsaW5lLmNvLnVrMA4GA1Ud
DwEB/wQEAwIFoDAdBgNVHSUEFjAUBggrBgEFBQcDAQYIKwYBBQUHAwIwPgYDVR0f
BDcwNTAzoDGgL4YtaHR0cDovL2NkcC5yYXBpZHNzbC5jb20vUmFwaWRTU0xSU0FD
QTIwMTguY3JsMEwGA1UdIARFMEMwNwYJYIZIAYb9bAECMCowKAYIKwYBBQUHAgEW
HGh0dHBzOi8vd3d3LmRpZ2ljZXJ0LmNvbS9DUFMwCAYGZ4EMAQIBMHUGCCsGAQUF
BwEBBGkwZzAmBggrBgEFBQcwAYYaaHR0cDovL3N0YXR1cy5yYXBpZHNzbC5jb20w
PQYIKwYBBQUHMAKGMWh0dHA6Ly9jYWNlcnRzLnJhcGlkc3NsLmNvbS9SYXBpZFNT
TFJTQUNBMjAxOC5jcnQwCQYDVR0TBAIwADCCAX0GCisGAQQB1nkCBAIEggFtBIIB
aQFnAHYA7ku9t3XOYLrhQmkfq+GeZqMPfl+wctiDAMR7iXqo/csAAAFoUYCe/wAA
BAMARzBFAiBVmBSsxPADQxP7Jj/X7BJGtGr2TTHj6w6HQ3icwK3otgIhAPjySqJu
up9eElNK5M436F63pI+HwFZUQdtABunVM/YCAHUAh3W/51l8+IxDmV+9827/Vo1H
Vjb/SrVgwbTq/16ggw8AAAFoUYCfnwAABAMARjBEAiAkWfo401YRP7v+NfK7y3AF
+7ovsGvCX2T3XjFK6vLSiQIgBddrM0Ty0pCFtNs3ijQiO6E5Ice22DvyO2K0CQPH
vw8AdgBvU3asMfAxGdiZAKRRFf93FRwR2QLBACkGjbIImjfZEwAAAWhRgKBUAAAE
AwBHMEUCIEIa5VFAhkY5mTu4bg8KC8VZy7NRiqyOkhjTTv78oRYiAiEA7OQoJmht
wUasA2VzThJs97I2nQvmkl2V+BtEOXepYOYwDQYJKoZIhvcNAQELBQADggEBAJTC
7tZkBIuMXVUlERsMqs2sffbk5fh/6DHUN77jmj/uEy1XL4v+YYNjobkf3bUhxRct
dzAp4zsJeHLSsRh9nd8MtuICq0Yf2EK4qWRNy+EKAUbLm/KyJgSLx9mC6npucXO3
iNFcGf3AGFROicU/IUu+n1jI0i3xuEEud5nnXNBISYvYVKXUyX4sqAVbzkxQEpA5
DaQ7rvPC2n889IkqImKq7t/Dm2+d32Ez5I3L6tsHx2n3nR3oTw6vByG0DUouNSjZ
ZCFuv6ibYdWBLlxqd1EuQhfLcTlOBoGvfD4+Dkrn+dHgzGpLUFI8JBkYTFhPuZhe
0F8F2PbuwNm59MYdrPI=
-----END CERTIFICATE-----';


    public function initialize(): void
    {
        $this->loadComponent('Certificate');
        $this->loadComponent('Security');
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Security->setConfig('validatePost', false);
    }

    public function index()
    {
        // Blank func
        // ToDo fail gracefully
        
    }

    public function decodeCsr()
    {

        if ($this->request->is('post')) {
            $formData = $this->request->getData();
            if (!empty($formData['csr'])) {
                $result = $this->Certificate->decodeCSR($formData['csr']);

                if (empty($result)) {
                    $result = [
                        'error' => 'DECODE FAIL',
                        'ErrorMsg' => 'Unable to decode CSR'
                    ];
                }

                $decodedCsr = json_encode($result);

                // echo $jsonOutput;
                // die;
            }
        }

        // debug($result);
        // die;
    }
    
    public function convertCertificate()
    {

        if ($this->request->is('post')) {
            $formData = $this->request->getData();
            if (!empty($formData['certificate'])) {
                $inputFrom = $formData['from'];
                $inputTo = $formData['to'];
                $tmpFileName = $formData['certificate']->getStream()->getMetadata('uri');
                // debug($formData['certificate']->getStream()->getMetadata('uri'));
                // die;
                $from = 'pem';
                $to = 'der';
                $data = [
                    'cert_tmp' => $tmpFileName,
                ];

                $result = $this->Certificate->convertCertificateFormat($inputFrom, $inputTo, $data);

                // debug($result);
                // die;

                if (file_exists($result)) {
                    $this->DownloadFile($result);
                } else {
                    $error = [
                        'error' => 'DECODE FAIL',
                        'ErrorMsg' => 'Unable to decode CSR'
                    ];
                    $this->set(compact(['error']));
                }
            }
        }

        $fromFormats = [
            'pem' => 'PEM',
            'der' => 'DER',
            'pfx' => 'PFX',
        ];


        $toFormats = [
            'pem' => 'PEM',
            'der' => 'DER',
            'p7b' => 'p7b',
        ];

        $this->set(compact(['fromFormats', 'toFormats']));
    }

    function DownloadFile($file) { // $file = include path
        if(file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            //header('Content-Length: ' . filesize($file)); // not working
            ob_clean();
            flush();
            readfile($file);
            exit;
        }else{
            $this->Session->setFlash(__('Something went wrong, please try again'), 'flash_failure');
            $this->redirect($this->referer());
        }

    }
}
