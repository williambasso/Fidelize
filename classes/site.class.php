<?php

/**
 * CLASSE "Site"
 * Classe principal do projeto.
 */
class Site
{

    public $conexao;

    const LOCAL = 'fidelize.ga';
    const USER = 'fidelize';
    const PASS = '1qaz2wsxentra21';
    const DB = 'fidelize_master';

    /**
     * SITE CONSTRUCT
     * Executa o autoload, inclui as configurações,
     * funções e cria a conexão inicial.
     */
    public function __construct()
    {

        if (!isset($_SESSION))
            session_start();

        /* AUTOLOAD
         * Metodo mágico que vai carregar os arquivos
         * das classes automaticamente com base no nome
         * da classe. O nome do arquivo php deve ter o
         * mesmo nome da classe.
         */



        // Iniciando a Conexão
        $this->Conexao();

        // Includes de configurações e funções globais do projeto
        require_once("include/config.php");
        require_once("include/functions.php");

        $session = new Session($this->conexao);
        $session->veficaSession();

        // Poderia ser utilizado aqui também para incluir o HEADER do site
        include "header.php";

    }

    public function Conexao()
    {
        $this->conexao = mysqli_connect(self::LOCAL, self::USER, self::PASS, self::DB) or die ("Erro na conexao com o servidor.");
    }

    /**
     * SITE DESTRUCT
     * Poderia ser usado aqui, a inclusão do FOOTER do site...
     */
    public function __destruct()
    {
//        include "footer.php";
    }


}

?>