<?php

/************************************
* 	@author			Mian Saleem		*
* 	@package 		SMA2			*
* 	@subpackage 	install			*
************************************/

/*
 * Oh, hi, loyal donors.
 * Nulled by curt 96down.com.
 *
 * Mian, if you see this note, here's a tip for you: Try generating a random password when installing..
 *
 */

$installFile = "../SMA2";
$indexFile = "../index.php";
$configFolder = "../sma/config";
$configFile = "../sma/config/config.php";
$dbFile = "../sma/config/database.php";
if (is_file($installFile)) { 

switch($_GET['step']){
	default: ?>
		<ul class="steps">
		<li class="active pk">Lista de Verificação</li>
		<li>Registro</li>
		<li>Banco de Dados</li>
		<li>Configuração do Site</li>
		<li class="last">Feito!</li>
		</ul>
		<h3>Pre-Instalação Lista de Verificação</h3>
		<?php 
			$error = FALSE;
			if(!is_writeable($indexFile)){$error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Index Filer (index.php) is not writeable!</div>"; }
			if(!is_writeable($configFolder)){$error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Config Folder (sma/config/) is not writeable!</div>"; }
			if(!is_writeable($configFile)){$error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Config File (sma/config/config.php) is not writeable!</div>"; }
			if(!is_writeable($dbFile)){$error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Database File (sma/config/database.php) is not writeable!</div>"; }
			if(phpversion() < "5.2"){$error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Your PHP version is ".phpversion()."! PHP 5.3 or higher required!</div>";}else{echo "<div class='alert alert-success'><i class='icon-ok'></i> You are running PHP ".phpversion()."</div>";} 
			if(!extension_loaded('mcrypt')){$error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Mcrypt PHP exention missing!</div>";}else{echo "<div class='alert alert-success'><i class='icon-ok'></i> Mcrypt PHP exention loaded!</div>";}
			if(!extension_loaded('mysql')){$error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Mysql PHP exention missing!</div>";}else{echo "<div class='alert alert-success'><i class='icon-ok'></i> Mysql PHP exention loaded!</div>";}
			if(!extension_loaded('mysqli')){$error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> Mysqli PHP exention missing!</div>";}else{echo "<div class='alert alert-success'><i class='icon-ok'></i> Mysqli PHP exention loaded!</div>";}
			if(!extension_loaded('mbstring')){$error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> MBString PHP exention missing!</div>";}else{echo "<div class='alert alert-success'><i class='icon-ok'></i> MBString PHP exention loaded!</div>";}
			if(!extension_loaded('gd')){echo "<div class='alert alert-error'><i class='icon-remove'></i> GD PHP exention missing!</div>";}else{echo "<div class='alert alert-success'><i class='icon-ok'></i> GD PHP exention loaded!</div>";}
			if(!extension_loaded('curl')){$error = TRUE; echo "<div class='alert alert-error'><i class='icon-remove'></i> CURL PHP exention missing!</div>";}else{echo "<div class='alert alert-success'><i class='icon-ok'></i> CURL PHP exention loaded!</div>";}
?>      
		<div class="bottom">
			<?php if($error){ ?>
			<a href="#" class="btn btn-primary disabled">Próximo Passo</a>
			<?php }else{ ?>
			<a href="?step=0" class="btn btn-primary">Próximo Passo</a>
			<?php } ?>
		</div>

<?php
	break;
	case "0": ?>
	<ul class="steps">
		<li class="ok"><i class="icon icon-ok"></i>Lista de Verificação</li>
		<li class="active">Registro</li>
		<li>Banco de Dados</li>
		<li>Configuração do Site</li>
		<li class="last">Feito!</li>
		</ul>
	<h3>Registro</h3>
	<?php
		if($_POST){
			$code = $_POST["code"];
			if (isset($code) && md5($code) == '603d45b9be38f30180145818a2ee8a1a') {
		    ?>
            <form action="?step=1" method="POST" class="form-horizontal">
		
		<div class="alert alert-success"><i class='icon-ok'></i> <strong>Succeso</strong>: Código Válido</div>   
		<input id="code" type="hidden" name="code" value="<?php echo $code; ?>" />
        <input id="username" type="hidden" name="username" value="<?php echo $username; ?>" />
		<div class="bottom">
			<input type="submit" class="btn btn-primary" value="Próximo Passo"/>
		</div>
		</form>
		<?php } else { ?>
		<div class="alert alert-error"><i class='icon-remove'></i> <strong>Erro</strong>: Código Inválido</div>
		<form action="?step=0" method="POST" class="form-horizontal">
        <div class="control-group">
          <label class="control-label" for="code">Código<a href="#myModal" role="button" data-toggle="modal"><i class="icon-question-sign"></i></a></label>
          <div class="controls">
          <input id="code" type="text" name="code" class="input-large" required data-error="Purchase Code is required" placeholder="Purchase Code" />
          </div>
        </div>
		<div class="bottom">
			<input type="submit" class="btn btn-primary" value="Checar"/>
		</div>
		</form>
		<?php
		}
		}else{	?>
	<p>Clique em "Checar" para continuar</p>
	<br />
		<form action="?step=0" method="POST" class="form-horizontal">
        <div class="control-group">
          <label class="control-label" for="code">Código<a href="#myModal" role="button" data-toggle="modal"><i class="icon-question-sign"></i></a></label>
          <div class="controls">
          <input id="code" type="text" value="96down.com" name="code" class="input-large" required data-error="Purchase Code is required" placeholder="Purchase Code" />
          </div>
        </div>
		
		<div class="bottom">
			<input type="submit" class="btn btn-primary" value="Checar"/>
		</div>
		</form>
	<?php }
	break;
	case "1": ?>
	<ul class="steps">
		<li class="ok"><i class="icon icon-ok"></i>Lista de Verificação</li>
		<li class="ok"><i class="icon icon-ok"></i>Registro</li>
		<li class="active">Banco de Dados</li>
		<li>Configuração do Site</li>
		<li class="last">Feito!</li>
		</ul>
	<?php if($_POST){ ?>
<h3>Configuração Banco de Dados</h3>
	<p>Se o banco de dados não existe o sistema irá tentar criá-la.</p>
		<form action="?step=2" method="POST" class="form-horizontal">
		<div class="control-group">
          <label class="control-label" for="dbhost">Host Banco de Dados </label>
          <div class="controls">
          <input id="dbhost" type="text" name="dbhost" class="input-large" required data-error="BD Host é necessário" placeholder="BD Host" value="localhost" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="dbusername">Usuário Banco de Dados</label>
          <div class="controls">
          <input id="dbusername" type="text" name="dbusername" class="input-large" required data-error="BD Usuário é necessário" placeholder="BD Usuário" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="dbpassword">Senha Banco de Dados</label>
          <div class="controls">
          <input id="dbpassword" type="password" name="dbpassword" class="input-large" required data-error="BD Senha é necessário" placeholder="BD Senha" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="dbname">Nome Banco de Dados</label>
          <div class="controls">
          <input id="dbname" type="text" name="dbname" class="input-large" required data-error="BD Nome é necessário" placeholder="BD Nome" />
          </div>
        </div>
        
		<input id="code" type="hidden" name="code" value="<?php echo $_POST['code']; ?>" />
        <input type="hidden" name="username" value="<?php echo $_POST['username']; ?>" />
		<div class="bottom">
			<input type="submit" class="btn btn-primary" value="Próximo Passo"/>
		</div>
		</form>
	<?php }
	break;
	case "2":
	?>
	<ul class="steps">
		<li class="ok"><i class="icon icon-ok"></i>Lista de Verificação</li>
		<li class="ok"><i class="icon icon-ok"></i>Registro</li>
		<li class="active">Banco de Dados</li>
		<li>Configuração do Site</li>
		<li class="last">Feito!</li>
		</ul>
	<h3>Salvando as configurações do Banco de Dados</h3>
	<?php
		if($_POST){
			$dbhost = $_POST["dbhost"];
			$dbusername = $_POST["dbusername"];
			$dbpassword = $_POST["dbpassword"];
			$dbname = $_POST["dbname"];
			$code = $_POST["code"];
			$username = $_POST["username"];
			$link = @mysql_connect($dbhost, $dbusername, $dbpassword);
		if (!$link) {
		    echo "<div class='alert alert-error'><i class='icon-remove'></i> Could not connect to MYSQL!</div>";
		}else{
			echo '<div class="alert alert-success"><i class="icon-ok"></i> Connection to MYSQL successful!</div>';
			
			$db_selected = @mysql_select_db($dbname, $link);
			if (!$db_selected) {
				if(!mysql_query("CREATE DATABASE IF NOT EXISTS `$dbname` /*!40100 CHARACTER SET utf8 COLLATE 'utf8_general_ci' */")){
					echo "<div class='alert alert-error'><i class='icon-remove'></i> Database ".$dbname." does not exist and could not be created. Please create the Database manually and retry this step.</div>";
					
					return FALSE;
				}else{ echo "<div class='alert alert-success'><i class='icon-ok'></i> Database ".$dbname." created</div>";}
			}
				mysql_select_db($dbname);
				
				require_once('includes/core_class.php');
				$core = new Core();
				$dbdata = array(
						'hostname' => $dbhost,
						'username' => $dbusername,
						'password' => $dbpassword,
						'database' => $dbname
						);
				
				if ($core->write_database($dbdata) == false) {
					echo "<div class='alert alert-error'><i class='icon-remove'></i> Failed to write database details to ".$dbFile."</div>";
				} else { 
					echo "<div class='alert alert-success'><i class='icon-ok'></i> Database config written to the database file.</div>"; 
				}
		
		}
		} else { echo "<div class='alert alert-success'><i class='icon-question-sign'></i> Nothing to do...</div>"; }
		?>
		<div class="bottom">
		  <form action="?step=1" method="POST" class="form-horizontal">
		    <input id="code" type="hidden" name="code" value="<?php echo $_POST['code']; ?>" />
            <input id="username" type="hidden" name="username" value="<?php echo $_POST['username']; ?>" />
			<input type="submit" class="btn pull-left" value="Passo Anterior"/>
			</form>
		  <form action="?step=3" method="POST" class="form-horizontal">
		    <input id="code" type="hidden" name="code" value="<?php echo $_POST['code']; ?>" />
            <input id="username" type="hidden" name="username" value="<?php echo $_POST['username']; ?>" />
			<input type="submit" class="btn btn-primary pull-right" value="Próximo Passo">
			</form>
			<br clear="all">
</div>
		<?php
	break;
	case "3":
	?>
		<ul class="steps">
		<li class="ok"><i class="icon icon-ok"></i>Lista de Verificação</li>
		<li class="ok"><i class="icon icon-ok"></i>Registro</li>
		<li class="ok"><i class="icon icon-ok"></i>Banco de Dados</li>
		<li class="active">Configuração do Site</li>
		<li class="last">Feito!</li>
		</ul>
        <h3>Configuração do Site</h3>
		<?php if($_POST){ ?>
		<form action="?step=4" method="POST" class="form-horizontal">
		<div class="control-group">
          <label class="control-label" for="domain">SMA URL</a></label>
          <div class="controls">
          <input type="text" id="domain" name="domain" class="xlarge" required data-error="SMA URL is required" value="<?php echo "http://".$_SERVER["SERVER_NAME"].substr($_SERVER["REQUEST_URI"], 0, -15); ?>" />
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="domain">Seu Fuso Horário</label>
          <div class="controls">
            <?php 
			require_once('includes/timezones_class.php');
			$tz = new Timezones();
			$timezones = $tz->get_timezones();
			echo '<select name="timezone" required="required" data-error="TimeZone is required">';
            foreach ($timezones as $key => $zone){
            echo '<option value="'.$key.'">'.$zone.'</option>';
            }
            echo '</select>'; ?>
          </div>
        </div>    
		<input type="hidden" name="code" value="<?php echo $_POST['code']; ?>" />
        <input type="hidden" name="username" value="<?php echo $_POST['username']; ?>" />
		<div class="bottom">
			<a href="?step=2" class="btn pull-left">Próximo Passo</a>
			<input type="submit" class="btn btn-primary" value="Próximo Passo"/>
		</div>
		</form>
		
	<?php }
	break;
	case "4":
	?>
	<ul class="steps">
		<li class="ok"><i class="icon icon-ok"></i>Lista de Verificação</li>
		<li class="ok"><i class="icon icon-ok"></i>Registro</li>
		<li class="ok">Banco de Dados</li>
		<li class="active">Configuração do Site</li>
		<li class="last">Feito!</li>
		</ul>
	<h3>Salvando as Configurações do Site</h3>
	<?php
		if($_POST){
			$domain = $_POST['domain'];
			$timezone = $_POST['timezone'];
			$code = $_POST["code"];
			$username = $_POST["username"];

			require_once('includes/core_class.php');
			$core = new Core();
						
			if ($core->write_config($domain) == false) {
				echo "<div class='alert alert-error'><i class='icon-remove'></i> Failed to write config details to ".$configFile."</div>";
			} elseif ($core->write_index($timezone) == false) {
				echo "<div class='alert alert-error'><i class='icon-remove'></i> Failed to write timezone details to ".$indexFile."</div>";
			} else { 
				echo "<div class='alert alert-success'><i class='icon-ok'></i> Config details written to the config file.</div>"; 
			}
		
		
		} else { echo "<div class='alert alert-success'><i class='icon-question-sign'></i> Nothing to do...</div>"; }
		?>
		<div class="bottom">
			<form action="?step=2" method="POST" class="form-horizontal">
		    <input id="code" type="hidden" name="code" value="<?php echo $_POST['code']; ?>" />
            <input id="username" type="hidden" name="username" value="<?php echo $_POST['username']; ?>" />
			<input type="submit" class="btn pull-left" value="Passo Anterior"/>
			</form>
			<form action="?step=5" method="POST" class="form-horizontal">
		    <input id="code" type="hidden" name="code" value="<?php echo $_POST['code']; ?>" />
            <input id="username" type="hidden" name="username" value="<?php echo $_POST['username']; ?>" />
			<input type="submit" class="btn btn-primary pull-right" value="Próximo Passo">
			</form>
			<br clear="all">
		</div>

	<?php
	break;
	case "5": ?>
		<ul class="steps">
		<li class="ok"><i class="icon icon-ok"></i>Lista de Verificação</li>
		<li class="ok"><i class="icon icon-ok"></i>Registro</li>
		<li class="ok"><i class="icon icon-ok"></i>Banco de Dados</li>
		<li class="ok"><i class="icon icon-ok"></i>Configuração do Site</li>
		<li  class="active">Feito!</li>
	</ul>

	<?php if($_POST){
		$code = $_POST['code'];
		define("BASEPATH", "install/");
		require("../sma/config/database.php");
		if (isset($code) && md5($code) == '603d45b9be38f30180145818a2ee8a1a') {
			$db_tables = file_get_contents('includes/sql/db.sql');
			$dbdata = array(
						'hostname' => $db['default']['hostname'],
						'username' => $db['default']['username'],
						'password' => $db['default']['password'],
						'database' => $db['default']['database'],
						'dbtables' => $db_tables
						);
			require_once('includes/database_class.php');
			$database = new Database();
			if ($database->create_tables($dbdata) == false) {
				$finished = FALSE;
				echo "<div class='alert alert-warning'><i class='icon-warning'></i> The database tables could not be created, please try again.</div>";
			} else {
				$finished = TRUE;
					if(!@unlink('../SMA2')){
					echo "<div class='alert alert-warning'><i class='icon-warning'></i> Please remove the SMA2 file from the main folder in order to lock the ipdate tool.</div>";
					}
				
			}

		}else{
			echo "<div class='alert alert-error'><i class='icon-remove'></i> Error while validating your purchase code!</div>";
		}
		
				 
		} 
		if($finished) {
?>
			
<h3><i class='icon-ok'></i> Instalação Completada!</h3>
			<div class="alert alert-info"><i class='icon-info-sign'></i> Você pode fazer login usando agora o seguinte credencial:<br /><br />
            Nome de Usuário: <span style="font-weight:bold; letter-spacing:1px;">owner@tecdiary.com</span><br />
            Senha: <span style="font-weight:bold; letter-spacing:1px;">12345678</span><br /><br /></div>
            <div class="alert alert-warning"><i class='icon-warning-sign'></i> Por favor, não se esqueça de alterar nome de usuário e senha.</div>
					<div class="bottom">
					<a href="<?php echo "http://".$_SERVER["SERVER_NAME"].substr($_SERVER["REQUEST_URI"], 0, -15); ?>" class="btn btn-primary">Ir Para Login</a>
				</div>
			
	<?php	
		}
	}

}else{
			echo "<div style='width: 100%; font-size: 10em; color: #757575; text-shadow: 0 0 2px #333, 0 0 2px #333, 0 0 2px #333; text-align: center;'><i class='icon-lock'></i></div><h3 class='alert-text text-center'>Installer is locked!<br><small style='color:#666;'>Please contact your developer/support.</small></h3>";
		}
?>