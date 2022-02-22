<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Sastrawi\Stemmer\StemmerFactory;
use Sastrawi\StopWordRemover\StopWordRemoverFactory;

class Rabinkarp
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function preprocess($teks)
    {
        //Mengubah semua huruf dalam dokumen menjadi huruf kecil(case folding)
        $teks = strtolower(trim($teks));
        //Menghilangkan tanda pemisah kata(tokenizing)
        $teks = str_replace(array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '(', '-', ')', ',', '.', '=', ';', '!', '?'), '', $teks);
        //Menghapus kata- kata yang tidak mengandung arti penting (stopword)
        $stopwordFactory = new StopWordRemoverFactory();
        $stopwords       = $stopwordFactory->createStopWordRemover();
        $stopword        = $stopwords->remove($teks);
        //Mengembalikan kata menjadi kata dasar (stemming)
        $stemmerFactory = new StemmerFactory();
        $stemmer        = $stemmerFactory->createStemmer();
        $output         = $stemmer->stem($stopword);
        return  str_replace(' ', '', $output);
    }

    //Fungsi untuk memecah kalimat menjadi k-gram2
    function kGram($teks, $gram)
    {
        $teks = $teks;
        $i = 0;
        $length = strlen($teks);
        $teksSplit[] = "";
        if (strlen($teks) < $gram) {
            $teksSplit[] = $teks;
        } else {
            for ($i; $i <= $length - $gram; $i++) {
                $teksSplit[]         = substr($teks, $i, $gram);
            }
        }
        return $teksSplit;
    }

    function hash($gram)
    {
        $hashGram = null;
        foreach ($gram as $a => $teks) {
            $test = $this->cekHash($teks, $hashGram);
            echo "<script>console.log('test: " . $test . "' );</script>";
            if ($test != true) {
                $hashGram[] = $this->rollingHash($teks);
            }
        }
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        return $hashGram;
    }

    // coba finge
    function cekHash($hash, $hashUdahDicek)
    {
        $value = false;
        $countHashUdahDicek = count(array($hashUdahDicek));
        if ($countHashUdahDicek > 0) {
            for ($k = 0; $k < $countHashUdahDicek; $k++) {
                if ($hashUdahDicek[$k] == $hash) {
                    $value = true;
                    break;
                }
            }
        }
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        return $value;
    }

    function rollingHash($string)
    {
        $basis = 11;
        $pjgKarakter = strlen($string);
        $hash = 0;
        for ($i = 0; $i < $pjgKarakter; $i++) {
            $ascii = floatval(ord($string[$i]));
            $x     = floatval(pow($basis, $pjgKarakter - ($i + 1)));
            $hash += $ascii * $x;
        }
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        return $hash;
    }


    function fingerprint($hash1, $hash2)
    {
        $fingerprint = null;
        $hashUdahDicek = null;
        $sama = false;
        $countHash1 = count($hash2);
        for ($i = 0; $i < count($hash1); $i++) {
            for ($j = 0; $j < $countHash1; $j++) {
                if ($hash1[$i] == $hash2[$j]) {
                    if ($this->cekHash($hash1[$i], $hashUdahDicek) == false) {
                        // echo "<b>";
                        // print_r($fingerprint[] = $hash1[$i]);
                        $fingerprint[] = $hash1[$i];
                        // echo "</b>";
                    }
                    $sama = true;
                } else {
                    $sama = false;
                }
            }
            if ($sama == true) {
                $hashUdahDicek[] = $hash1[$i];
            }
        }
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        return $fingerprint;
    }

    // coba fingerprint
    function unique($fingerprint)
    {
        $clear = array_unique($fingerprint);
        $hasilunique = null;
        foreach ($clear as $row) {
            $hasilunique[] = $row;
        }
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        return $hasilunique;
    }

    function similarityCoefficient($hasilunique, $hash1, $hash2)
    {
        // echo count($fingerprint);
        // echo "<br>";
        // echo count($hash1);
        // echo "<br>";
        // echo count($hash2);

        $similarity = number_format(((2 * count($hasilunique) / (count($hash1) + count($hash2))) * 100), 2, '.', '');

        if ($similarity > 100) {
            $output = 100;
        } else {
            $output = $similarity;
        }
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        return $output;
    }
}
