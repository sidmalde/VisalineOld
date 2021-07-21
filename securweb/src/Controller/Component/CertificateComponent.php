<?php
// declare(strict_types=1);


namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\Exception\PageOutOfBoundsException;
use Cake\Datasource\Paginator;
use Cake\Datasource\ResultSetInterface;
use Cake\Http\Exception\NotFoundException;
use InvalidArgumentException;

class CertificateComponent extends Component
{
	//

	var $opensslPath = '"C:/Program Files/OpenSSL-Win64/bin/openssl.exe"';
	// var $opensslPath = 'openssl';

	public static $mapping = [
		'pem' => [
			'der' => [
				'command' => " x509 -outform der -in %s -out %s",
				'files' => ['derfile'],
			],
			'p7b' => [
				'command' => " crl2pkcs7 -nocrl -certfile %s -out %s",
				'files' => ['pemp7bfile'],
			]
		],
		'der' => [
			'pem' => [
				'command' => " x509 -inform der -in %s -outform pem -out %s",
				'files' => ['derfile'],
			],
		],
		'pfx' => array(
			'pem' => [
				'command' => " pkcs12 -in %s -out %s -nodes -passin pass:%s -passout pass:%s",
				'files' => ['pempfxfile'],
			],
		),
	];

	var $inputCSR = '';
	var $outputCSR = '';
	var $outputCSRData = [];

	function decodeCSR($csr = null) {

		if (empty($csr)) {
			// Invalid Request - empty CSR
			return false;
		}

		// // Set CSR for Class
		// $this->inputCSR = $csr;
		

		// $this->cleanCSR();

		if(!empty($csr)) {
			$csr=trim($csr);
			// Format & Clean CSR
			$csr = str_replace("——","-----", $csr);
			$csr = str_replace(array("\r\n", "\r","\n\n"),"\n", $csr);

			$lines = explode("\n", $csr);
			
			$newCsr = null;
			foreach($lines as $line_num => $line){
				if(strlen($line) > 65){
					$newCsr .= trim(wordwrap($line, 64, "\n", true));
				} else {
					$newCsr .= $line;
				}
				$newCsr .= "\n";
			}
			$correct_start_of_csr='-----BEGIN CERTIFICATE REQUEST-----'."\n";
			$correct_end_of_csr='-----END CERTIFICATE REQUEST-----';
			$newCsr=trim($newCsr);
			if(substr_count($newCsr ,$correct_start_of_csr)<1){ // TODO at the start , detect if no started flag
				$newCsr=$correct_start_of_csr.substr( $newCsr, strpos($newCsr, "\n")+1 );
			}
			if(substr_count($newCsr ,$correct_end_of_csr)<1){
				$newCsr=substr( $newCsr, 0,strrpos($newCsr, "\n")+1 ).$correct_end_of_csr."\n";
			}
			// Write file to temp
			$myFile = TMP.time().rand(0,99999).'.csr';
			$file = fopen($myFile, 'w') or die("can't open ".$myFile);

			fwrite($file,$newCsr);
			fclose($file);
			// Decode CSR Using OpenSSL
			$command=$this->opensslPath." req -in ".$myFile." -noout -text";
			// debug($myFile);
			// debug($command);
			$output = shell_exec($command);
			// debug($output);

			// Remove temp file
			unlink($myFile);
			// Failed to decode
			if(empty($output)) {
				return false;
			} else {
				// Clean again
				$output = json_encode($output);
				$output = str_replace("\E2\80\99", '\'', json_decode(str_replace('\\\x00', '', $output)));
				$this->csr = new \stdClass();
				$this->getCommonNameFromCSR($output);
				$this->getOrganizationUnitFromCSR($output);
				$this->getOrganizationFromCSR($output);
				$this->getLocalityFromCSR($output);
				$this->getStateFromCSR($output);
				$this->getDNSnamesFromCSR($output);
				$this->getCountryFromCSR($output);
				$this->getKeySizeFromCSR($output);
				$this->getKeyAlgorithmFromCSR($output);
				$this->getSignatureAlgorithmFromCSR($output);
				$this->getSubjectFromCSR($output);
			}

			if(!empty($this->csr)) {
				return $this->csr;
			}
		}
		return false;
	}

	function convertCertificate($from, $to,$data) {
		//
	}

	function convertCertificateFormat($from, $to,$data) {
		$tmp = time().rand(0,99999);
		$tmpOutPath = TMP.$tmp.".".$to;

		$inFile = $data['cert_tmp'];

		$zip = new \ZipArchive();

		$command = self::$mapping[$from][$to]['command'];

		$cmd = $this->opensslPath . sprintf($command,$inFile, $tmpOutPath);

		$output = shell_exec($cmd);

		return $tmpOutPath;

		/*if ($from == 'pem' && $to == 'pfx') {
			$cmd = $this->opensslPath." ".sprintf(self::$mapping[$from][$to]['command'],TMP.$tmp.".".$to, $data['pfxkey']['tmp_name'], $data['pfxfile']['tmp_name'],$data['pfxkeypass'],$data['pfxkeypass']);
		} elseif ($from == 'pem' && $to == 'p7b') {
			$cmd = $this->opensslPath." ".sprintf(self::$mapping[$from][$to]['command'],$data['pemp7bfile']['tmp_name'], TMP.$tmp.".".$to);
		} elseif ($from == 'pfx' && $to == 'pem') { // special cases
			$cmd = $this->opensslPath." ".sprintf(self::$mapping[$from][$to]['command'],$data['pempfxfile']['tmp_name'], TMP.$tmp.".".$to,$data['pemkeypass'],$data['pemkeypass']);
		} else {
			//debug(TMP.$tmp);
			$myFile = $data[self::$mapping[$from][$to]['files'][0]];
			$cmd = $this->opensslPath." ".sprintf(self::$mapping[$from][$to]['command'],$myFile['tmp_name'],TMP.$tmp.".".$to);
			//debug($cmd);
		}

		$output = shell_exec($cmd);
		return TMP.$tmp.".".$to;*/

	}

	function filterCSR(\stdClass $csr){
		$output = new \stdClass(); 
        foreach ($csr as $key => $value) {
            if (is_string($value)) {
                $output->$key = htmlentities($value);
            }
            if(is_array($value)) {
            	$output->$key = array_map(function($value2){ return htmlentities($value2); },$value);
            }
        }
        return $output;   
	}

	private function cleanCSR() {
	// 	$csr=trim($csr);
	// 	// Format & Clean CSR
	// 	$csr = str_replace("——","-----", $csr);
	// 	$csr = str_replace(array("\r\n", "\r","\n\n"),"\n", $csr);
	}

	// Strip out Common Name
	private function getCommonNameFromCSR($output) {

		preg_match_all('/ CN(| )=(| )(.*?)(\,|\n|\/emailAddress(| )=(| )(.*?)(\,|\n))/', $output, $temp);

		if (!empty($temp[3][0]) && "" != trim($temp[3][0])) {
			$this->csr->CommonName = $this->csr->DomainName = trim($temp[3][0]);
		} else {
			preg_match_all('/ CN=(.*?)(\,|\n|\/emailAddress=(.*?)(\,|\n))/', $output, $temp);
			$tempArray = explode(',', $temp[3]);
			foreach($tempArray as $index => $tempItem){
				if($index == 0) continue;
				$this->csr->AltDomainNames[] = $tempItem;
			}
			preg_match('/ CN=(.*?)\//', $output, $temp);
			if(!empty($temp[1])) {
				$this->csr->CommonName = $this->csr->DomainName = trim($temp[1]);
			} else {
				preg_match('/ CN=(.*?)\n/', $output, $temp);
				if(!empty($temp[1])){
					$this->csr->CommonName = $this->csr->DomainName = trim($temp[1]);
				} else{
					preg_match('/ CN =(.*?)\//', $output, $temp);
					if(!empty($temp[1])) {
						$this->csr->CommonName = $this->csr->DomainName = trim($temp[1]);
					}else{
						preg_match('/ CN =(.*?)\n/', $output, $temp);
						if(!empty($temp[1])){
							$this->csr->CommonName = $this->csr->DomainName = trim($temp[1]);
						}
					}
				}
			}
		}


		preg_match_all('/ CN=(.*?)(\,|\n|\/ emailAddress=(.*?)(\,|\n))/', $output, $temp);
		if (!empty($temp[3])) {
			$this->csr->EmailAddress = $temp[3][0];
		}
		preg_match_all('/emailAddress(| )=(| )(.*?)(\,|\n)/', $output, $temp);
		if (!empty($temp[3])) {
			$this->csr->EmailAddress = trim($temp[3][0]);
		}
	}

	// Strip out Organization Unit from CSR
	private function getOrganizationUnitFromCSR($output) {
		preg_match('/OU(| )=(| )(.*?)(\,|\n)/', $output, $temp);

		if (!empty($temp[3])) $this->csr->OrganizationUnit = trim($temp[3]);
	}

	// Strip out Organization from CSR
	private function getOrganizationFromCSR($output) {
		preg_match('/O(| )=(| )(.*?)(\,|\n|\/emailAddress(| )=(| )(.*?)(\,|\n))/', $output, $temp);

		if (!empty($temp[3])) $this->csr->Organization = trim($temp[3]);
		if (!empty($temp[6])) $this->csr->EmailAddress = trim($temp[6]);
	}

	// Strip out Locality from CSR
	private function getLocalityFromCSR($output) {
		preg_match('/L(| )=(| )(.*?)(\,|\n)/', $output, $temp);

		if (!empty($temp[3])) {
			$this->csr->Locality = trim($temp[3]);
		}
	}

	// Strip out State from CSR
	private function getStateFromCSR($output) {
		preg_match('/ST(| )=(| )(.*?)(\,|\n)/', $output, $temp);

		if(!empty($temp[3])) $this->csr->State = trim($temp[3]);
	}

	// Strip out DNS Names from CSR
	private function getDNSnamesFromCSR($output) {
		// SANs
		preg_match_all('/DNS\:(.*?)(\,|\n)/', $output, $temp);

		if (!empty($temp[1])) {
			$this->csr->DNSnames = array();
			foreach($temp[1] as $san) {
				if($san != $this->csr->DomainName) {
					$this->csr->DNSnames[] = $san;
				}
			}
		}

	}

	// Strip out Country from CSR
	private function getCountryFromCSR($output) {
		preg_match('/C(| )=(| )(.*?)\,/', $output, $temp);
		if(!empty($temp[3])) {
			$this->csr->Country = trim($temp[3]);
		} else {
			preg_match('/C(| )=(| )(.*?)\n/', $output, $temp);
			if(!empty($temp[3])) $this->csr->Country = trim($temp[3]);
		}
	}

	// Strip out Key Sze from CSR
	private function getKeySizeFromCSR($output) {
		preg_match('/RSA Public Key: \((.*?)\s/', $output, $temp);
		if(!empty($temp[1])) {
			$this->csr->KeySize = $temp[1];
		} else {
			if (preg_match('/Public-Key: \((.*?)\s/', $output, $temp)) {
				$this->csr->KeySize = $temp[1];
			}
		}
	}

	// Strip out Key Algorithm from CSR
	private function getKeyAlgorithmFromCSR($output) {
		preg_match('/Public Key Algorithm: (.*?)\n/', $output, $temp);
		if(!empty($temp[1])) {
			if ($temp[1] == 'rsaEncryption') {
				$this->csr->KeyAlgorithm = 'RSA';
			} elseif ($temp[1] == 'id-ecPublicKey') {
				$this->csr->KeyAlgorithm = 'ECC';
			}
		}
	}

	// Strip out Key Algorithm from CSR
	private function getSignatureAlgorithmFromCSR($output) {
		preg_match('/Signature Algorithm: (.*?)\n/', $output, $temp);
		if(!empty($temp[1])) {
			if ($temp[1] == 'sha1WithRSAEncryption') {
				$this->csr->SignatureAlgorithm = 'SHA1';
			} elseif ($temp[1] == 'sha256WithRSAEncryption') {
				$this->csr->SignatureAlgorithm = 'SHA256';
			} elseif ($temp[1] == 'ecdsa-with-SHA256') {
				$this->csr->SignatureAlgorithm = 'SHA256';
			}elseif ($temp[1] == 'sha384WithRSAEncryption') {
				$this->csr->SignatureAlgorithm = 'SHA384';
			}
		}
	}

	// Strip out Subject
	private function getSubjectFromCSR($output) {
		preg_match('/Subject: (.*?)\n/', $output, $temp);
		$subject = explode(', ', $temp[1]);
		foreach ($subject as &$item) {
			 preg_match_all('/CN=(.*?)(\,|\n|\/emailAddress=(.*?)(\,|\n))/', $item, $ret);
			 if(!empty($ret[0])){
			 	unset($item);
			 }
		}
		if(!empty($temp[1])) $this->csr->Subject = explode(', ', $temp[1]);
	}
}