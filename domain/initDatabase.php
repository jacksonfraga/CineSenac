<?php


include_once 'mysql.php';

function ExisteConstraint($constraintName)
{
    $oConn = new HelperMySQL();
    $rs = $oConn->sql_query("SELECT 1 FROM information_schema.TABLE_CONSTRAINTS WHERE"
. "                   CONSTRAINT_SCHEMA = DATABASE() AND"
. "                   CONSTRAINT_NAME   = '$constraintName' AND"
. "                   CONSTRAINT_TYPE   = 'FOREIGN KEY'");
        
    $r = mysql_fetch_row($rs);
    mysql_free_result($rs);        
    return $r[0] == 1;
}

$oMySQL = new HelperMySQL();
        

$query = "CREATE TABLE IF NOT EXISTS `clientes` ("
. "  `Id` int(11) NOT NULL AUTO_INCREMENT,"
. "  `Nome` varchar(150) NOT NULL,"
. "  `Email` varchar(100) NOT NULL,"
. "  `Telefone` varchar(15) NOT NULL,"
. "  `Estado` char(2) NOT NULL,"
. "  `Cidade` varchar(100) NOT NULL,"
. "  `Endereco` varchar(250) NOT NULL,"
. "  `CPF` varchar(14) NOT NULL,"
. "  `RG` varchar(20) NOT NULL,"
. "  `NomePai` varchar(150) DEFAULT NULL,"
. "  `NomeMae` varchar(150) NOT NULL,"
. "  `Foto` varchar(255) DEFAULT NULL,"
. "  PRIMARY KEY (`Id`)"
. ") ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;";

$oMySQL->sql_query($query);

$query = "CREATE TABLE IF NOT EXISTS `filmes` ("
. "  `Id` int(11) NOT NULL AUTO_INCREMENT,"
. "  `Titulo` varchar(100) NOT NULL,"
. "  `Sinopse` varchar(1500) NOT NULL,"
. "  `ImageUrl` varchar(200) NOT NULL,"
. "  `Duracao` int(11) NOT NULL,"
. "  `Lancamento` date NOT NULL,"
. "  `Termino` date NOT NULL,"
. "  `Atores` varchar(200) NOT NULL,"
. "  `Genero` varchar(200) NOT NULL,"
. "  PRIMARY KEY (`Id`)"
. ") ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;";

$oMySQL->sql_query($query);

$query = "CREATE TABLE IF NOT EXISTS `ingressos` ("
. "  `Id` int(11) NOT NULL AUTO_INCREMENT,"
. "  `ClienteId` int(11) NOT NULL,"
. "  `SessaoId` int(11) NOT NULL,"
. "  `DataHora` datetime NOT NULL,"
. "  PRIMARY KEY (`Id`),"
. "  KEY `ClienteId` (`ClienteId`),"
. "  KEY `SessaoId` (`SessaoId`)"
. ") ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;";

$oMySQL->sql_query($query);

$query = "CREATE TABLE IF NOT EXISTS `salas` ("
. "  `Id` int(11) NOT NULL AUTO_INCREMENT,"
. "  `Nome` varchar(100) NOT NULL,"
. "  `Capacidade` int(10) unsigned NOT NULL,"
. "  PRIMARY KEY (`Id`)"
. ") ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;";

$oMySQL->sql_query($query);

$query = "CREATE TABLE IF NOT EXISTS `sessoes` ("
. "  `Id` int(11) NOT NULL AUTO_INCREMENT,"
. "  `Inicio` time NOT NULL,"
. "  `Fim` time NOT NULL,"
. "  `Data` date NOT NULL,"
. "  `FilmeId` int(11) NOT NULL,"
. "  `SalaId` int(11) NOT NULL,"
. "  `Valor` decimal(10,2) NOT NULL,"
. "  PRIMARY KEY (`Id`),"
. "  KEY `FilmeId` (`FilmeId`),"
. "  KEY `SalaId` (`SalaId`)"
. ") ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;";

$oMySQL->sql_query($query);

$query = "CREATE TABLE IF NOT EXISTS `usuarios` ("
. "  `Id` int(11) NOT NULL AUTO_INCREMENT,"
. "  `Email` varchar(150) NOT NULL,"
. "  `Senha` varchar(50) NOT NULL,"
. "  `Nome` varchar(200) NOT NULL,"
. "  `DataCriacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,"
. "  PRIMARY KEY (`Id`),"
. "  UNIQUE KEY `Email` (`Email`)"
. ") ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";

$oMySQL->sql_query($query);

if (!ExisteConstraint('ingressos_ibfk_1'))
{
    $query = "   ALTER TABLE `ingressos` ADD CONSTRAINT `ingressos_ibfk_1` "
            . "        FOREIGN KEY (`ClienteId`) "
            . "        REFERENCES `clientes` (`Id`) "
            . "        ON DELETE NO ACTION ON UPDATE NO ACTION;";

    $oMySQL->sql_query($query);
}
if (!ExisteConstraint('ingressos_ibfk_2'))
{
    $query = "   ALTER TABLE `ingressos` ADD CONSTRAINT `ingressos_ibfk_2` "
            . "        FOREIGN KEY (`SessaoId`) "
            . "        REFERENCES `sessoes` (`Id`) "
            . "        ON DELETE NO ACTION ON UPDATE NO ACTION;";

    $oMySQL->sql_query($query);
}

if (!ExisteConstraint('sessoes_ibfk_1'))
{
    $query = "   ALTER TABLE `sessoes` ADD CONSTRAINT `sessoes_ibfk_1` "
            . "        FOREIGN KEY (`FilmeId`) "
            . "        REFERENCES `filmes` (`Id`) "
            . "        ON DELETE NO ACTION ON UPDATE NO ACTION;";

    $oMySQL->sql_query($query);
}

if (!ExisteConstraint('sessoes_ibfk_2'))
{
    $query = "   ALTER TABLE `sessoes` ADD CONSTRAINT `sessoes_ibfk_2` "
            . "        FOREIGN KEY (`SalaId`) "
            . "        REFERENCES `salas` (`Id`) "
            . "        ON DELETE NO ACTION ON UPDATE NO ACTION;";

    $oMySQL->sql_query($query);
}

echo 'Banco inicializado com sucesso! \o/';