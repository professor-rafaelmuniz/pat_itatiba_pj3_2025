<?php


class Validacao
{
    private function __construct() {}

   

    public static function validaNumeric($value) {
        return is_numeric($value) ? $value : null;
    }

//##############################################################

    /**
     * Controller Hasher
     * @param $string
     * @return bool|string
     */
    public static function hasher($string) {
        return substr(sha1($string ?? null), 0, 15);
    }

//##############################################################

    public static function converterDataHoradoBDparaPHP($dataDoMySQL) {
        // Criar um objeto DateTime
		$data = new DateTime($dataDoMySQL);

		// Formatar a data para o padrão brasileiro
		return $data->format('d/m/Y H:i:s');
		
    }

    public static function converterDatadoBDparaPHP($dataDoMySQL) {
        // Criar um objeto DateTime
		$data = new DateTime($dataDoMySQL);

		// Formatar a data para o padrão brasileiro
		return $data->format('d/m/Y');
		
    }

//##############################################################

    public static function converterHoradoBDparaPHP($dataDoMySQL) {
        // Criar um objeto DateTime
		$data = new DateTime($dataDoMySQL);

		// Formatar a data para o padrão brasileiro
		return $data->format('H:i:s');
		
    }

//##############################################################
  

//##############################################################
  
    /**
     * @return String
     * Retorna Datetime eg: < 20/12/2018 07:05:25 pm >
     *
     */
    public static function getDatetime() : String
    {
        date_default_timezone_set('America/Sao_Paulo');
        return date('d/m/Y h:i:s a', time());
    }

    public static function getTimeNow() : String
    {
        date_default_timezone_set('America/Sao_Paulo');
        return date('H:i:s', time());
    }

//##############################################################

    public static function getDatetimeNow() : String
    {
        date_default_timezone_set('America/Sao_Paulo');
        return strtotime(date("d-m-Y h:i:s a"));
    }

//##############################################################
     
    /**
     * @param $var
     * New debugging method
     */
    public static function debugger() {
        echo nl2br(self::getDatetime()."\n");
        echo "<pre>";
            print_r(debug_backtrace(1));
        echo "</pre>";
        exit(1);
    }

//##############################################################
    /**
     * Use esta funcao para auxiliar na correção de imprevistos
     * @param $texto
     * @param $variavel
     */
    public static function debugMe($texto, $variavel, $deep = 0) {
        echo nl2br(self::getDatetime()."\n".$texto);
        echo "<pre>";
        if ($deep) {
            var_dump($variavel);
        } else {
            print_r($variavel);
        }
        echo "</pre>";
        exit(1);
    }

		
	//##############################################################
		
	/**
	* Retira pontuação da string
	* @param string $st_data
	* @return string
	*/
	public static function toAlphaNum($st_data ) {
		return preg_replace("([[:punct:]]| )", '', $st_data);
    }
    
    //##############################################################

    /**
     * virgula para ponto
     */
    public static function commaToDot($st_data)
    {
        return str_replace(",", ".", $st_data);
    }
    
    //##############################################################
	
	/**
	* Retira caracteres nao numericos da string
	* @param string $st_data
	* @return string
	*/
	public static function somenteNumeros($st_data) {
		$st_data = mb_eregi_replace("[^0-9]", "", $st_data);
		return $st_data;
	}

//##############################################################

    /**
     * Limpa String
     * @param $st_string
     * @return mixed|null|string
     */
	public static function limparDadosEntradaCompleto($st_string) {
        if (isset($st_string)) {
            if (is_array($st_string))
                return $st_string;

            $termos = array(
                "<script","insert","update", "delete", "grant", "revoke",
                "drop", "from", "alter", "*", "\\", "=", "-", "==", "--", "href"
            );

            foreach ($termos as $termo) {
                $st_string = str_ireplace($termo, "", $st_string);
            }

            $st_string = trim($st_string);
            $st_string = htmlspecialchars($st_string); // substitui tags* HTML

            return $st_string;
        }
        return null;

	}
//##############################################################
	
//##############################################################

    /**
     * Limpa String
     * @param $st_string
     * @return mixed|null|string
     */
	public static function limparDadosEntrada($st_string) {
        if (isset($st_string)) {

            $st_string = htmlspecialchars($st_string);
            $st_string = nl2br($st_string); 
            return $st_string;
        }
        return null;

	}
   

}
